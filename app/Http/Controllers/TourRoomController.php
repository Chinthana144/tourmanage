<?php

namespace App\Http\Controllers;

use App\Models\TourRooms;
use App\Models\TourRouteItems;
use Illuminate\Http\Request;

class TourRoomController extends Controller
{
    public function store(Request $request)
    {
        $tour_route_item_id = $request->input('tour_route_item_id');
        $tour_route_item = TourRouteItems::find($tour_route_item_id);

        $hotel_id = $tour_route_item->item_id;
        $tour_package_id = $request->input('tour_package_id');
        $room_type_id = $request->input('room_type_id');
        $bed_type_id = $request->input('bed_type_id');
        $base_adults = $request->input('base_adults');
        $base_children = $request->input('base_children') ?? 0;
        $room_quantity = $request->input('room_quantity');
        $price_per_night = $request->input('price_per_night');
        $extra_bed_price = $request->input('extra_bed_price') ?? 0;

        //create tour room
        TourRooms::create([
            'tour_route_item_id' => $tour_route_item_id,
            'tour_hotel_id' => $hotel_id,
            'tour_package_id' => $tour_package_id,
            'room_type_id' => $room_type_id,
            'bed_type_id' => $bed_type_id,
            'base_adults' => $base_adults,
            'base_children' => $base_children,
            'room_quantity' => $room_quantity,
            'price_per_night' => $price_per_night,
            'extra_bed_price' => $extra_bed_price,
        ]);

        return response()->json(['success' => true, 'message' => 'Room added successfully.']);
    }//store
}//class    
