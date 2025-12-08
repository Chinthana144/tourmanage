<?php

namespace App\Http\Controllers;

use App\Models\HotelRoomTypes;
use App\Models\Hotels;
use Illuminate\Http\Request;

class HotelPriceController extends Controller
{
    public function index(Request $request)
    {   
        $hotel_id = $request->input('hide_hotel_id');
        $hotel = Hotels::find($hotel_id);
        $rooms = HotelRoomTypes::where('hotel_id', $hotel_id)->get();
        
        return view('hotel_prices.price_view', compact('hotel', 'rooms'));
    }//index
}//class
