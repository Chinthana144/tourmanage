<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use App\Models\Locations;
use App\Models\Provinces;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Locations::paginate(10);

        return view('locations.location_view', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Provinces::all();
        return view('locations.location_create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $location = new Locations();
        $province_id = $request->input('cmb_province');
        $district_id = $request->input('cmb_district');
        $city_id = $request->input('cmb_city');

        $province = Provinces::find($province_id);
        $district = Districts::find($district_id);
        $city = Cities::find($city_id);

        $location->province_name = $province ? $province->name_en : '';
        $location->district_name = $district ? $district->name_en : '';
        $location->city_name = $city ? $city->name_en : '';
        $location->city_id = $city_id;

        $location->name = $request->input('txt_location_name');
        $location->description = $request->input('location_description');

        $location->latitude = $request->input('txt_latitude');
        $location->longitude = $request->input('txt_longitude');

        if($request->hasFile('primary_image')) {
            $file = $request->file('primary_image');
            $filename = 'L_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->primary_image = 'images/locations/' . $filename;
        }//upload primary image

        if($request->hasFile('image1')) {
            $file = $request->file('image1');
            $filename = 'L1' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image1 = 'images/locations/' . $filename;
        }

        if($request->hasFile('image2')) {
            $file = $request->file('image2');
            $filename = 'L2' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image2 = 'images/locations/' . $filename;
        }

        if($request->hasFile('image3')) {
            $file = $request->file('image3');
            $filename = 'L3' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image3 = 'images/locations/' . $filename;
        }

        if($request->hasFile('image4')) {
            $file = $request->file('image4');
            $filename = 'L4' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image4 = 'images/locations/' . $filename;
        }

        $location->save();
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

    /*
    * get district by province id
    */
    public function getDistrictByProvince(Request $request)
    {
        $province_id = $request->input('province_id');

        $districts = Districts::where('province_id', $province_id)->get();
        return response()->json($districts);
    }

    //get cities by district id
    public function getCityByDistrict(Request $request)
    {
        $district_id = $request->input('district_id');

        $cities = Cities::where('district_id', $district_id)->get();
        return response()->json($cities);
    }

    //get one city by id
    public function getOneCityById(Request $request)
    {
        $city_id = $request->input('city_id');
        $city = Cities::find($city_id);
        return response()->json($city);
    }
}
