<?php

namespace App\Http\Controllers;

use App\Models\BedTypes;
use App\Models\Hotels;
use App\Models\RoomTypes;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    public function index(Request $request)
    {
        $hotel_id = $request->input('hide_hotel_id');
        $hotel = Hotels::find($hotel_id);
        $room_types = RoomTypes::all();
        $bed_types = BedTypes::all();

        return view('hotel_rooms.room_view', compact('hotel', 'room_types', 'bed_types'));
    }//index

    
}//class
