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
        $tour_id = $tour_route_item->tour_id;
        $hotel_id = $tour_route_item->item_id;
        $price_per_night = $request->input('req_price_per_night');
        $extra_bed_price = $request->input('req_extra_bed_price') ?? 0;

        //create tour room
        TourRooms::create([
            'tour_route_item_id' => $tour_route_item_id,
            'tour_hotel_id' => $hotel_id,
            'tour_package_id' => $request->input('tour_package_id'),
            'room_type_id' => $request->input('cmb_room_type'),
            'bed_type_id' => $request->input('cmb_bed_type'),
            'base_adults' => $request->input('req_adult_count'),
            'base_children' => $request->input('req_children_count') ?? 0,
            'room_quantity' => $request->input('req_room_quantity'),
            'price_per_night' => $request->input('req_price_per_night'),
            'extra_bed_price' => $request->input('req_extra_bed_price') ?? 0,
            'total_price' => floatval($price_per_night) + floatval($extra_bed_price),
        ]);

        return redirect()->route('tour_package_items.index', ['hide_tour_id' => $tour_id]);
    }//store

    public function destroy(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $tour_room_id = $request->input('hide_room_id');

        $tour_room = TourRooms::find($tour_room_id);
        $tour_room->delete();

        return redirect()->route('tour_package_items.index', ['hide_tour_id' => $tour_id]);
    }//destroy
}//class    
