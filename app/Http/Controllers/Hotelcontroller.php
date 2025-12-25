<?php

namespace App\Http\Controllers;

use App\Models\BoardingType;
use App\Models\Cities;
use App\Models\Districts;
use App\Models\Facilities;
use App\Models\HotelFacilities;
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
        $hotels = Hotels::where('status', 1)
            ->paginate(5);

        $hotel_data = [];
        $facility_data = [];

        foreach($hotels as $hotel)
        {
            $facilities = HotelFacilities::join('facilities', 'hotel_facilities.facility_id', '=', 'facilities.id')
                ->where('hotel_id', $hotel->id)
                ->get();

            $facility_data[] = [
                'hotel' => $hotel,
                'facilities' => $facilities
            ];
        }//foreach

        // $hotel_data[] = [
        //     'hotel' => $hotels,
        //     'facilities' => $facility_data
        // ];


        // dd($facility_data);

        return view('hotels.hotel_view', compact('hotels', 'facility_data', 'hotel_data'));
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
    public function edit(Request $request)
    {
        $hotel_id = $request->input('hide_hotel_id');
        $hotel = Hotels::find($hotel_id);

        $province_id = $hotel->province_id;
        $district_id = $hotel->district_id;
        $city_id = $hotel->city_id;

        $provinces = Provinces::all();
        $districts = Districts::where('province_id', $province_id)->get();
        $cities = Cities::where('district_id', $district_id)->get();

        return view('hotels.hotel_edit', compact('hotel', 'provinces', 'districts', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $hotel_id = $request->input('hide_hotel_id');
        $province_id = $request->input('cmb_province');
        $district_id = $request->input('cmb_district');
        $city_id = $request->input('cmb_city');

        $hotel = Hotels::find($hotel_id);
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
            $oldImagePath = public_path('images/hotels/'. $hotel->cover_image);
            if (file_exists($oldImagePath) && !is_null($hotel->cover_image)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('cover_image');
            $filename = 'H_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->cover_image = $filename;
        }

        if ($request->hasFile('image_1')) {
            $oldImagePath = public_path('images/hotels/'. $hotel->image1);
            if (file_exists($oldImagePath) && !is_null($hotel->image1)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('image_1');
            $filename = 'H1_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->image1 = $filename;
        }
        if ($request->hasFile('image_2')) {
            $oldImagePath = public_path('images/hotels/'. $hotel->image2);
            if (file_exists($oldImagePath) && !is_null($hotel->image2)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('image_2');
            $filename = 'H2_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->image2 = $filename;
        }

        $hotel->save();

        return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /*
    * remove status
    */
    public function remove(Request $request)
    {
        $hotel_id = $request->input('hide_hotel_id');

        $hotel = Hotels::find($hotel_id);
        $hotel->status = 0;

        $hotel->save();

        return redirect()->route('hotels.index')->with('success', 'Facilities added successfully.');
    }//remove

    //get hotels
    public function getHotels(){
        $hotels = Hotels::where('status', 1)->get();

        return response()->json($hotels);
    }

    //get boarding types
    public function getBoardingTypes()
    {
        $boarding_types = BoardingType::all();

        return response()->json($boarding_types);
    }
}//class
