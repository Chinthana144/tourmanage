<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\Hotels;
use App\Models\Provinces;
use Illuminate\Http\Request;

class Hotelcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotels::where('status', 1)->get();
        return view('hotels.hotel_view', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Provinces::all();

        return view('hotels.hotel_create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $province_id = $request->input('cmb_province');
        $district_id = $request->input('cmb_district');
        $city_id = $request->input('cmb_city');

        $hotel = new Hotels();
        $hotel->name = $request->input('txt_hotel_name');
        $hotel->address = $request->input('txt_hotel_address');
        $hotel->phone = $request->input('txt_hotel_phone');
        $hotel->email = $request->input('txt_hotel_email');
        $hotel->website = $request->input('txt_hotel_website');
        $hotel->star_rating = $request->input('txt_hotel_rating');
        $hotel->latitude = $request->input('txt_hotel_latitude');
        $hotel->longitude = $request->input('txt_hotel_longitude');
        $hotel->province_id = $province_id;
        $hotel->district_id = $district_id;
        $hotel->city_id = $city_id;

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = 'H_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->cover_image = $filename;
        }
        if ($request->hasFile('image_1')) {
            $file = $request->file('image_1');
            $filename = 'H1_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->image1 = $filename;
        }
        if ($request->hasFile('image_2')) {
            $file = $request->file('image_2');
            $filename = 'H2_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->image2 = $filename;
        }

        $hotel->save();

        //fetch facilities
        $general_facilities = Facilities::where('facilities_type_id', 1)->get();
        $food_drink_facilities = Facilities::where('facilities_type_id', 2)->get();
        $wellness_recreation_facilities = Facilities::where('facilities_type_id', 3)->get();
        $services_facilities = Facilities::where('facilities_type_id', 4)->get();
        $family_kids_facilities = Facilities::where('facilities_type_id', 5)->get();
        $outdoors_activities_facilities = Facilities::where('facilities_type_id', 6)->get();
        $in_room_facilities = Facilities::where('facilities_type_id', 7)->get();

        return view('hotels.facilities_add', compact('hotel', 'general_facilities', 'food_drink_facilities', 'wellness_recreation_facilities', 'services_facilities', 'family_kids_facilities', 'outdoors_activities_facilities', 'in_room_facilities'));

        // return redirect()->route('hotels.index')->with('success', 'Hotel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
