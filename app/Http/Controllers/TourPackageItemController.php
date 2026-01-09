<?php

namespace App\Http\Controllers;

use App\Models\BedTypes;
use App\Models\BoardingType;
use App\Models\Hotels;
use App\Models\QuotationItems;
use App\Models\Quotations;
use App\Models\RoomTypes;
use App\Models\TourHotels;
use App\Models\TourPackageItems;
use App\Models\TourPackages;
use App\Models\TourRequest;
use App\Models\TourRooms;
use App\Models\TourRouteItems;
use App\Models\Tours;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourPackageItemController extends Controller
{
    public function index(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $tour = Tours::find($tour_id);

        //boarding Type
        $boarding_types = BoardingType::all();

        //tour request
        $tour_request_id = $tour->tour_request_id;
        $tour_request = TourRequest::find($tour_request_id);

        //room types
        $room_types = RoomTypes::all();

        //bed types
        $bed_types = BedTypes::all();

        $route_items = TourRouteItems::where('tour_id', $tour_id)->get();

        return view('tour_package_items.tour_package_items', compact('route_items', 'tour', 'tour_request', 'boarding_types', 'room_types', 'bed_types'));
    }//index

    public function store(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $tour_id = $request->input('tour_id');

        $route_items = TourRouteItems::where('tour_id', $tour_id)->get();

        //create quotation
        $year = Carbon::now()->year;
        $last_quotation = Quotations::where('quotation_no', 'LIKE', '-%')
            ->orderBy('quotation_no', 'DESC')
            ->first();

        $nextNumber = 1;
        if($last_quotation){
            //extract number
            $lastNumber = intval(substr($last_quotation->quotation_no, 5));
            $nextNumber = $lastNumber + 1;
        }//has tour
        else{
            $nextNumber = 1;
        }
        $quotation_no = $year . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        //create quotation
        $quotation = Quotations::updateOrCreate(
            [
                'quotation_no' => $quotation_no,
                'tour_request_id' => $request->input('tour_request_id'),
            ],
            [
                'tour_id' => $tour_id,
                'valid_until' => $request->input('valid_date'),
                'package_prices' => json_encode([]),
                'status' => 1,
                'user_id' => Auth::user()->id,
            ],
        );

        foreach($route_items as $item)
        {
            switch ($item->item_type) {
                case 'App\Models\Locations':
                    # code...
                break;

                case 'App\Models\Hotels':
                    //tour hotels
                    $tour_hotel = TourHotels::where('tour_route_item_id', $item->id)
                        ->where('hotel_id', $item->item->id)
                        ->first();

                    // dd($tour_hotel->nights);
                    if($tour_hotel && !empty($tour_hotel->nights))
                    {
                        $nights = floatval($tour_hotel->nights);
                    }

                    // room price
                    //Akagi Essential
                    $std_price = TourRooms::where('tour_hotel_id', $item->item->id)
                        ->where('tour_package_id', 1)
                        ->sum('total_price');
                    $total_std_price = $std_price * $nights;
                    createTourPackageItem(1, $item->id, Hotels::class, $item->item->id, $total_std_price);

                    //Akagi Classic
                    $cmt_price = TourRooms::where('tour_hotel_id', $item->item->id)
                        ->where('tour_package_id', 2)
                        ->sum('total_price');
                    $total_cmt_price = $cmt_price * $nights;
                    createTourPackageItem(2, $item->id, Hotels::class, $item->item->id, $total_cmt_price);

                    //Akagi Signature
                    $prm_price = TourRooms::where('tour_hotel_id', $item->item->id)
                        ->where('tour_package_id', 3)
                        ->sum('total_price');
                    $total_prm_price = $prm_price * $nights;
                    createTourPackageItem(3, $item->id, Hotels::class, $item->item->id, $total_prm_price);

                break;

                case 'App\Models\Restaurants':
                    # code...
                break;

                case 'App\Models\Activities':
                    # code...
                break;

                case 'App\Models\TravelMedia':
                    # code...
                break;
                
                default:
                    # code...
                break;
            }//switch
        }//foreach

        $packages = TourPackages::all();

        $package_total = [];

        foreach($packages as $package)
        {   
            $package_total[] = [
                'id' => $package->id,
                'name' => $package->name,
                'amount' => QuotationItems::where('item_type', 'hotel')
                    ->where('quotation_id', $quotation->id)
                    ->where('tour_package_id', $package->id)
                    ->sum('amount'),
            ];    
        }//foreach

        $quotation->package_prices = json_encode($package_total);

        // dd($package_total);
        $quotation->save();

        //add Quotation items
        //hotels
        $hot_essential_total = $total_std_price;
        $hot_classic_total = $total_cmt_price;
        $hot_signature_total = $total_prm_price;

        createQuotationItem($quotation->id, 1, "hotel", $hot_essential_total);
        createQuotationItem($quotation->id, 2, "hotel", $hot_classic_total);
        createQuotationItem($quotation->id, 3, "hotel", $hot_signature_total);

        //redirect to quotation
        return redirect()->route('quotation.index'); 
    }//store
   
}//class

//===================== Functions =====================//
function createTourPackageItem($tour_package_id, $tour_route_item_id, $component_type, $component_id, $base_price)
{
    $tour_package_item = TourPackageItems::updateOrCreate(
        [
            'tour_package_id'=> $tour_package_id,
            'tour_route_item_id' => $tour_route_item_id,
        ],
        [
            'component_type' => $component_type,
            'component_id' => $component_id,
            'base_price' => $base_price,
        ]
    );

    return $tour_package_item ? true : false;
}//create tour package item

function createQuotationItem($quotation_id, $tour_package_id, $item_type, $amount)
{
    $quotation_item = QuotationItems::updateOrCreate(
        [
            'quotation_id' => $quotation_id,
            'tour_package_id' => $tour_package_id,
            'item_type' => $item_type,
        ],
        [
            'amount' => $amount,
        ],
    );

    return $quotation_item ? true : false;
}//create quotation 
