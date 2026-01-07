<?php

namespace App\Http\Controllers;

use App\Models\BedTypes;
use App\Models\BoardingType;
use App\Models\RoomTypes;
use App\Models\TourHotels;
use App\Models\TourRequest;
use App\Models\TourRooms;
use App\Models\TourRouteItems;
use App\Models\Tours;
use Illuminate\Http\Request;

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
        $tour_id = $request->input('tour_id');

        $route_items = TourRouteItems::where('tour_id', $tour_id)->get();

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

                    $nights = $tour_hotel->nights;

                    // room price
                    $std_price = TourRooms::where('tour_hotel_id', $tour_hotel->hotel_id)
                        ->where('tour_package_id', 1)
                        ->sum('price_per_night');

                    dd($std_price);
                    
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
            }
        }//foreach
    }//store
}//class
