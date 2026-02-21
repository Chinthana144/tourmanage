<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\ActivityPrices;
use App\Models\BedTypes;
use App\Models\BoardingType;
use App\Models\HotelPrices;
use App\Models\Hotels;
use App\Models\LocationPrices;
use App\Models\Locations;
use App\Models\QuotationItems;
use App\Models\Quotations;
use App\Models\RestaurantPrices;
use App\Models\Restaurants;
use App\Models\RoomTypes;
use App\Models\Seasons;
use App\Models\TourHotels;
use App\Models\TourPackageItems;
use App\Models\TourPackages;
use App\Models\TourRequest;
use App\Models\TourRooms;
use App\Models\TourRouteItems;
use App\Models\Tours;
use App\Models\TravelMedia;
use App\Models\TravelPrices;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        //necessary data
        $seasons = Seasons::all();

        $route_items = TourRouteItems::where('tour_id', $tour_id)->get();

        $data = [];

        foreach($route_items as $item)
        {
            $item_type = $item->item_type;
            $essential_price = [];
            $classic_price = [];
            $signature_price = [];

            switch ($item_type) {
                //============================= Location ================================//
                case 'App\Models\Locations':
                    # get location price
                    $standard_price = LocationPrices::where('location_id', $item->item_id)
                        ->where('package_id', 1)
                        ->get();
                    foreach ($standard_price as $price) {
                        $essential_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                                        
                    $comfort_price = LocationPrices::where('location_id', $item->item_id)
                        ->where('package_id', 2)
                        ->get();
                    foreach($comfort_price as $price){
                        $classic_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                    
                    $premium_price = LocationPrices::where('location_id', $item->item_id)
                        ->where('package_id', 3)
                        ->get();
                    foreach($premium_price as $price){
                        $signature_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                break;
                //============================= Hotels ================================//
                case 'App\Models\Hotels':
                    # get hotel price
                    $standard_price = HotelPrices::where('hotel_id', $item->item_id)
                        ->where('package_id', 1)
                        ->get();
                    foreach ($standard_price as $price) {
                        $essential_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                    $comfort_price = HotelPrices::where('hotel_id', $item->item_id)
                        ->where('package_id', 2)
                        ->get();
                    foreach($comfort_price as $price){
                        $classic_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                    
                    $premium_price = HotelPrices::where('hotel_id', $item->item_id)
                        ->where('package_id', 3)
                        ->get();
                    foreach($premium_price as $price){
                        $signature_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                break;
                //============================= Restaurants ================================//
                case 'App\Models\Restaurants':
                    # restaurant price
                    $standard_price = RestaurantPrices::where('restaurant_id', $item->item_id)
                        ->where('package_id', 1)
                        ->get();
                    foreach ($standard_price as $price) {
                        $essential_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                    $comfort_price = RestaurantPrices::where('restaurant_id', $item->item_id)
                        ->where('package_id', 2)
                        ->get();
                    foreach($comfort_price as $price){
                        $classic_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                    
                    $premium_price = RestaurantPrices::where('restaurant_id', $item->item_id)
                        ->where('package_id', 3)
                        ->get();
                    foreach($premium_price as $price){
                        $signature_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                break;
                //============================= Activities ================================//
                case 'App\Models\Activities':
                    # get activity price
                    $standard_price = ActivityPrices::where('activity_id', $item->item_id)
                        ->where('package_id', 1)
                        ->get();
                    foreach ($standard_price as $price) {
                        $essential_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                    $comfort_price = ActivityPrices::where('activity_id', $item->item_id)
                        ->where('package_id', 2)
                        ->get();
                    foreach($comfort_price as $price){
                        $classic_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach                
                    $premium_price = ActivityPrices::where('activity_id', $item->item_id)
                        ->where('package_id', 3)
                        ->get();
                    foreach($premium_price as $price){
                        $signature_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                break;
                //============================= Travel Media ================================//
                case 'App\Models\TravelMedia':
                    # get travel price
                    $standard_price = TravelPrices::where('travel_media_id', $item->item_id)
                        ->where('package_id', 1)
                        ->get();
                    foreach ($standard_price as $price) {
                        $essential_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                    $comfort_price = TravelPrices::where('travel_media_id', $item->item_id)
                        ->where('package_id', 2)
                        ->get();
                    foreach($comfort_price as $price){
                        $classic_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach                
                    $premium_price = TravelPrices::where('travel_media_id', $item->item_id)
                        ->where('package_id', 3)
                        ->get();
                    foreach($premium_price as $price){
                        $signature_price[] = [
                            'id' => $price->id,
                            'season_id' => $price->season_id,
                            'season' => $price->season->name,
                            'price_mode_id' => $price->price_mode_id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_compulsory' => $price->is_compulsory,
                        ];
                    }//foreach
                break;
            }//switch

            $data[] = [
                'id' => $item->id,
                'item_id' => $item->item_id,
                'item_type' => $item->item_type,
                'name' => $item->item->name,
                'day_no' => $item->day_no,
                'adults' => $item->tour->adults,
                'children' => $item->tour->children,
                'rooms_count' => $item->tour->rooms_per_hotel,
                'notes' => $item->notes,
                'essential_price' => $essential_price,
                'classic_price' => $classic_price,
                'signature_price' => $signature_price,
            ];
        }//foreach

        return view('tour_package_items.tour_package_items', compact('route_items', 'data', 'tour', 'tour_request', 'boarding_types', 'seasons'));
    }//index
   
    public function storePackageItems(Request $request)
    {
        $tour_id = $request->input('tour_id');
        $tour = Tours::find($tour_id);

        $route_items = TourRouteItems::where('tour_id', $tour_id)->get();

        foreach($route_items as $item)
        {
            $item_type = $item->item_type;
            switch ($item_type){
                case 'App\Models\Locations':
                    $standard_price = LocationPrices::where('location_id', $item->item_id)
                        ->where('package_id', 1)
                        ->get();

                    foreach($standard_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Locations::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach

                    $comfort_price = LocationPrices::where('location_id', $item->item_id)
                        ->where('package_id', 2)
                        ->get();

                    foreach($comfort_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Locations::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach

                    $premium_price = LocationPrices::where('location_id', $item->item_id)
                        ->where('package_id', 3)
                        ->get();

                    foreach($premium_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Locations::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach
                break;
                case 'App\Models\Hotels':
                    # get location price
                    $standard_price = HotelPrices::where('hotel_id', $item->item_id)
                        ->where('package_id', 1)
                        ->get();

                    foreach($standard_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Hotels::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach

                    $comfort_price = HotelPrices::where('hotel_id', $item->item_id)
                        ->where('package_id', 2)
                        ->get();

                    foreach($comfort_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Hotels::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach

                    $premium_price = HotelPrices::where('hotel_id', $item->item_id)
                        ->where('package_id', 3)
                        ->get();

                    foreach($premium_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Hotels::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach
                break;
                case 'App\Models\Restaurants':
                    # get restautant price
                    $standard_price = RestaurantPrices::where('restaurant_id', $item->item_id)
                        ->where('package_id', 1)
                        ->get();

                    foreach($standard_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Restaurants::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach

                    $comfort_price = RestaurantPrices::where('restaurant_id', $item->item_id)
                        ->where('package_id', 2)
                        ->get();

                    foreach($comfort_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Restaurants::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach

                    $premium_price = RestaurantPrices::where('restaurant_id', $item->item_id)
                        ->where('package_id', 3)
                        ->get();

                    foreach($premium_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Restaurants::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach
                break;
                case 'App\Models\Activities':
                    # get activity price
                    $standard_price = ActivityPrices::where('activity_id', $item->item_id)
                        ->where('package_id', 1)
                        ->get();

                    foreach($standard_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Activities::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach

                    $comfort_price = ActivityPrices::where('activity_id', $item->item_id)
                        ->where('package_id', 2)
                        ->get();

                    foreach($comfort_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Activities::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach

                    $premium_price = ActivityPrices::where('activity_id', $item->item_id)
                        ->where('package_id', 3)
                        ->get();

                    foreach($premium_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Activities::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach
                break;
                case 'App\Models\TravelMedia':
                    # get location price
                    $standard_price = TravelPrices::where('travel_media_id', $item->item_id)
                        ->where('package_id', 1)
                        ->get();

                    foreach($standard_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, TravelMedia::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach

                    $comfort_price = TravelPrices::where('travel_media_id', $item->item_id)
                        ->where('package_id', 2)
                        ->get();

                    foreach($comfort_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, TravelMedia::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach

                    $premium_price = TravelPrices::where('travel_media_id', $item->item_id)
                        ->where('package_id', 3)
                        ->get();

                    foreach($premium_price as $price){
                        if($request->has('chk_price_'.$item->id."_".$price->id))
                        {
                            $txt_price = $request->input('price_'.$item->id."_".$price->id);
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, TravelMedia::class, $item->item_id, $price->description, $txt_price, 1);
                        }
                    }//foreach
                break;
            }//switch
        }//foreach 
        
        return redirect()->route('package_summary.show', ['tour_id' => $tour_id]);

    }//store Items

    public function showPackageSummary(Request $request)
    {
        $tour_id = $request->input('tour_id');
        $tour = Tours::find($tour_id);

        //fetch package data
        $essential_packages = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 1)
            ->get();

        $classic_packages = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 2)
            ->get();

        $signature_packages = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 3)
            ->get();

        // get price groups
        $essential_prices = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 1)
            ->select(
                'component_type', 
                DB::raw('SUM(price) AS total_price'),
                DB::raw('COUNT(*) AS total_count'),
            )
            ->groupBy('component_type')
            ->get();

        $classic_prices = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 2)
            ->select(
                'component_type', 
                DB::raw('SUM(price) AS total_price'),
                DB::raw('COUNT(*) AS total_count'),
            )
            ->groupBy('component_type')
            ->get();

        $signature_prices = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 3)
            ->select(
                'component_type', 
                DB::raw('SUM(price) AS total_price'),
                DB::raw('COUNT(*) AS total_count'),
            )
            ->groupBy('component_type')
            ->get();

        // get price totals
        $essential_total = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 1)
            ->sum('price');

        $classic_total = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 2)
            ->sum('price');

        $signature_total = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 3)
            ->sum('price');

        return view('tour_package_items.tour_package_summary', 
            compact(
                'tour', 
                'essential_prices',
                'classic_prices',
                'signature_prices',
                'essential_packages', 
                'classic_packages', 
                'signature_packages', 
                'essential_total', 
                'classic_total', 
                'signature_total'
                ));
    }
}//class



//===================== Functions =====================//
function createTourPackageItem($tour_id, $season_id, $package_id, $price_mode_id, $component_type, $component_id, $description, $price, $status)
{
    $tour_package_item = TourPackageItems::updateOrCreate(
        [
            'tour_id'=> $tour_id,
            'season_id' => $season_id,
            'package_id' => $package_id,
            'component_type' => $component_type,
            'component_id' => $component_id,
        ],
        [
            'price_mode_id' => $price_mode_id,
            'description' => $description,
            'price' => $price,
            'status' => $status,
        ],
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
