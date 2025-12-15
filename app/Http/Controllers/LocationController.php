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
        $locations = Locations::where('status', 1)
            ->orderBy('id','desc')
            ->paginate(5);

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
            $filename = 'L1_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image1 = 'images/locations/' . $filename;
        }

        if($request->hasFile('image2')) {
            $file = $request->file('image2');
            $filename = 'L2_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image2 = 'images/locations/' . $filename;
        }

        if($request->hasFile('image3')) {
            $file = $request->file('image3');
            $filename = 'L3_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image3 = 'images/locations/' . $filename;
        }

        if($request->hasFile('image4')) {
            $file = $request->file('image4');
            $filename = 'L4_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image4 = 'images/locations/' . $filename;
        }

        $location->save();

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
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
        $location_id = $request->input('hide_location_id');
        $location = Locations::find($location_id);

        $provinces = Provinces::all();

        $city_id = $location->city_id;
        $city = Cities::find($city_id);
        $district = Districts::where('id',$city->district_id)->first();
        $district_id = $district->id;
        $province_id = $district->province_id;

        $districts = Districts::where('province_id', $province_id)->get();
        $cities = Cities::where('district_id', $district_id)->get();

        return view('locations.location_update', compact('location', 'provinces', 'province_id', 'districts', 'district_id', 'cities', 'city_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $location_id = $request->input('hide_location_id');

        $location = Locations::find($location_id);

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

        if($request->hasFile('primary_image')){
            $oldImagePath = public_path('images/locations/'. $location->primary_image);
            if (file_exists($oldImagePath) && !is_null($location->primary_image)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            //store new image
            $file = $request->file('primary_image');
            $filename = 'L_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->primary_image = 'images/locations/' . $filename;
        }//has primary image


        if($request->hasFile('image1')){
            $oldImagePath = public_path('images/locations/'. $location->image1);
            if (file_exists($oldImagePath) && !is_null($location->image1)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            //store new image
            $file = $request->file('image1');
            $filename = 'L1_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image1 = 'images/locations/' . $filename;
        }//has image1

        if($request->hasFile('image2')){
            $oldImagePath = public_path('images/locations/'. $location->image2);
            if (file_exists($oldImagePath) && !is_null($location->image2)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            //store new image
            $file = $request->file('image2');
            $filename = 'L2_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image2 = 'images/locations/' . $filename;
        }//has image2

        if($request->hasFile('image3')){
            $oldImagePath = public_path('images/locations/'. $location->image3);

            if (file_exists($oldImagePath) && !is_null($location->image3)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            //store new image
            $file = $request->file('image3');
            $filename = 'L3_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image3 = 'images/locations/' . $filename;
        }//has image3

        if($request->hasFile('image4')){
            $oldImagePath = public_path('images/locations/'. $location->image4);
            if (file_exists($oldImagePath) && !is_null($location->image4)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            //store new image
            $file = $request->file('image4');
            $filename = 'L4_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/locations'), $filename);
            $location->image4 = 'images/locations/' . $filename;
        }//has image4

        $location->save();

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    /*
    * remove location by status id
    */
    public function deactivate(Request $request){
        $location_id = $request->input('hide_location_id');

        $location = Locations::find($location_id);

        $location->status = 0;

        $location->save();

        return redirect()->route('locations.index')->with('success', 'Location removed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /*
    * location ajax methods
    */
    public function getLocations(Request $request){
        $locations = Locations::where('status', 1)->get();

        return response()->json($locations);
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
