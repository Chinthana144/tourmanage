<?php

namespace App\Http\Controllers;

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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
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
                            'price_mode_id' => $price->id,
                            'price_mode' => $price->priceMode->name,
                            'description' => $price->description,
                            'price' => $price->price,
                            'is_complusory' => $price->is_complusory,
                        ];
                    }//foreach
                break;
                //============================= Travel Media ================================//
                case 'App\Models\TravelMedia':
                    # get travel price

                break;
            }//switch

            $data[] = [
                'id' => $item->id,
                'item_id' => $item->item_id,
                'item_type' => $item->item_type,
                'name' => $item->item->name,
                'day_no' => $item->day_no,
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
                        if($request->has('chk_price_'.$item->id."_".$price->id)){
                            createTourPackageItem($tour_id, $price->season_id, $price->package_id, $price->price_mode_id, Locations::class, $item->item_id, $price->description, $price->price, 1);
                        }
                    }//foreach
                break;
                case 'App\Models\Hotels':
                    # get location price
                break;
                case 'App\Models\Restaurants':
                    # get restautant price
                break;
                case 'App\Models\Activities':
                    # get activity price
                break;
                case 'App\Models\TravelMedia':
                    # get location price
                break;
            }//switch
        }//foreach 
        
    }//store Items

}//class

//===================== Functions =====================//
function createTourPackageItem($tour_id, $season_id, $package_id, $price_mode_id, $component_type, $component_id, $description, $price, $status)
{
    $tour_package_item = TourPackageItems::create(
        [
            'tour_id'=> $tour_id,
            'season_id' => $season_id,
            'package_id' => $package_id,
            'price_mode_id' => $price_mode_id,
            'component_type' => $component_type,
            'component_id' => $component_id,
            'description' => $description,
            'price' => $price,
            'status' => $status,
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
