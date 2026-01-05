<?php

namespace App\Http\Controllers;

use App\Models\BedTypes;
use App\Models\BoardingType;
use App\Models\RoomTypes;
use App\Models\TourRequest;
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
}//class
