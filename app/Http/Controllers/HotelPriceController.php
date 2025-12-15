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

    //ajax methods

    public function getOneHotelPrice(Request $request)
    {
        $hotel_price_id = $request->input('hotel_price_id');
        $hotel_price = HotelPrices::find($hotel_price_id);

        return response()->json([
            'hotel_id' => $hotel_price->hotel_id,
            'hotel_room_type_id' => $hotel_price->hotel_room_type_id,
            'max_adults' => $hotel_price->hotelRoom->max_adults,
            'max_children' => $hotel_price->hotelRoom->max_children,
            'max_guests_total' => $hotel_price->hotelRoom->max_guests_total,
            'amenities' => $hotel_price->hotelRoom->amenities,
            'smoking_allowed' => $hotel_price->hotelRoom->smoking_allowed,
            'has_breakfast' => $hotel_price->hotelRoom->has_breakfast,
            'has_free_cancellation' => $hotel_price->hotelRoom->has_free_cancellation,
            'extra_bed_allowed' => $hotel_price->hotelRoom->extra_bed_allowed,
            'extra_bed_price' => $hotel_price->hotelRoom->extra_bed_price,
            'base_price_per_night' => $hotel_price->hotelRoom->base_price_per_night,
            'season_name' => $hotel_price->season_name,
            'season_start_date' => $hotel_price->season_start_date,
            'season_end_date' => $hotel_price->season_end_date,
            'price_per_night' => $hotel_price->price_per_night,
        ]);
    }//getOneHotelPrice
}//class
