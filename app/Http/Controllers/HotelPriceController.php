<?php

namespace App\Http\Controllers;

use App\Models\HotelPrices;
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
        $hotel_rooms_with_price = HotelPrices::where('hotel_id', $hotel_id)->get();
        
        return view('hotel_prices.price_view', compact('hotel', 'rooms', 'hotel_rooms_with_price'));
    }//index

    public function store(Request $request)
    {
        $hotel_id = $request->input('hide_hotel_id');

        // dd($request->input('cmb_room_type'));

        HotelPrices::create([
            'hotel_id' => $hotel_id,
            'hotel_room_type_id' => $request->input('cmb_room_type'),
            'season_name' => $request->input('cmb_season'),
            'season_start_date' => $request->input('season_start_date'),
            'season_end_date' => $request->input('season_end_date'),
            'price_per_night' => $request->input('price_per_night'),
        ]);

        return redirect()->route('hotelprices.index', ['hide_hotel_id' => $hotel_id])->with('success', 'Hotel price added successfully.');
    }//store
}//class
