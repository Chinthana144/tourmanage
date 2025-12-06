<?php

namespace App\Http\Controllers;

use App\Models\BedTypes;
use App\Models\HotelRoomTypes;
use App\Models\Hotels;
use App\Models\RoomTypes;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    public function index(Request $request)
    {
        $hotel_id = $request->input('hide_hotel_id');
        $hotel_rooms = HotelRoomTypes::where('hotel_id', $hotel_id)->get();
        $hotel = Hotels::find($hotel_id);
        $room_types = RoomTypes::all();
        $bed_types = BedTypes::all();

        return view('hotel_rooms.room_view', compact('hotel_rooms', 'hotel', 'room_types', 'bed_types'));
    }//index

    public function store(Request $request)
    {
        $hotel_id = $request->input('hide_hotel_id');
        
        $room_type_id = $request->input('cmb_room_type');
        $description= $request->input('txt_description');
        $bed_type_id = $request->input('cmb_bed_type');
        $max_adults = $request->input('txt_max_adults');
        $max_children = $request->input('txt_max_children');
        $max_guests_total = $request->input('txt_max_guests');
        $size_sqft = $request->input('txt_square_feet');

        //amenities
        $air_conditioning = $request->has('chk_air_conditioning') ? 1 : 0;
        $wifi = $request->has('chk_wifi') ? 1 : 0;
        $tv = $request->has('chk_wifi') ? 1 : 0;
        $mini_fridge = $request->has('chk_mini_fridge') ? 1 : 0;
        $mini_bar = $request->has('chk_mini_bar') ? 1 : 0;
        $coffee_maker = $request->has('chk_coffee_maker') ? 1 : 0;
        $balcony = $request->has('chk_balcony') ? 1 : 0;
        $safety_box = $request->has('chk_safety_box') ? 1 : 0;
        $hot_water = $request->has('chk_hot_water') ? 1 : 0;
        $bathtub = $request->has('chk_bathtub') ? 1 : 0;
        $shower = $request->has('chk_shower') ? 1 : 0;
        $hair_dryer = $request->has('chk_hair_dryer') ? 1 : 0;
        $towels = $request->has('chk_towels') ? 1 : 0;
        $toiletries = $request->has('chk_toiletries') ? 1 : 0;

        $amenities = [
            'air_conditioning' => $air_conditioning,
            'wifi' => $wifi,
            'tv' => $tv,
            'mini_fridge' => $mini_fridge,
            'mini_bar' => $mini_bar,
            'coffee_maker' => $coffee_maker,
            'balcony' => $balcony,
            'safety_box' => $safety_box,
            'hot_water' => $hot_water,
            'bathtub' => $bathtub,
            'shower' => $shower,
            'hair_dryer' => $hair_dryer,
            'towels' => $towels,
            'toiletries' => $toiletries
        ];

        $shoking = $request->has('chk_shoking') ? 1 : 0;
        $breakfast = $request->has('chk_breakfast') ? 1 : 0;
        $free_cancellation = $request->has('chk_free_cancellation') ? 1 : 0;
        $extra_bed = $request->has('chk_extra_bed') ? 1 : 0;

        $extra_bed_price = $request->input('txt_extra_bed_price');
        $base_price = $request->input('txt_base_price');

        HotelRoomTypes::create([
            'hotel_id' => $hotel_id,
            'room_type_id' => $room_type_id,
            'description' => $description,
            'bed_type_id' => $bed_type_id,
            'max_adults' => $max_adults,
            'max_children' => $max_children,
            'max_guests_total' => $max_guests_total,
            'size_sqft' => $size_sqft,
            'amenities' => json_encode($amenities),
            'smoking_allowed' => $shoking,
            'has_breakfast' => $breakfast,
            'has_free_cancellation' => $free_cancellation,
            'extra_bed_allowed' => $extra_bed,
            'extra_bed_price' => $extra_bed_price,
            'base_price_per_night' => $base_price
        ]);

        return redirect()->route('hotelrooms.index', ['hide_hotel_id' => $hotel_id])->with('success', 'Hotel room type added successfully.');
    }//store
    
}//class
