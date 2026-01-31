<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use App\Models\Locations;
use App\Models\Provinces;
use App\Models\TravelCountries;
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
        $travel_countries = TravelCountries::all();
        return view('locations.location_create', compact('travel_countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $location = new Locations();

        $location->travel_country_id = $request->input('cmb_travel_country');
        $location->name = $request->input('txt_location_name');
        $location->description = $request->input('txt_description');

        $location->display = $request->has('chk_display') ? 1 : 0;

        $location->popularity = $request->input('popularity');

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

        $travel_countries = TravelCountries::all();

        return view('locations.location_update', compact('location', 'travel_countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $location_id = $request->input('hide_location_id');

        $location = Locations::find($location_id);

        $location->travel_country_id = $request->input('cmb_travel_country');
        $location->name = $request->input('txt_location_name');
        $location->description = $request->input('txt_description');

        $location->display = $request->has('chk_display') ? 1 : 0;

        $location->popularity = $request->input('popularity');

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

}
