<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use App\Models\LocationPrices;
use App\Models\Locations;
use App\Models\Packages;
use App\Models\PriceModes;
use App\Models\Provinces;
use App\Models\Seasons;
use App\Models\TourPackages;
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

//===================================== Price ==================================//
    public function showLocationPrices(Request $request)
    {
        $location_id = $request->input('hide_location_id');
        $location = Locations::find($location_id);

        $location_prices = LocationPrices::where('location_id', $location_id)->paginate(10);
        
        //get necessary data
        $seasons = Seasons::all();
        $packages = TourPackages::all();
        $price_modes = PriceModes::all();

        return view('locations.location_price_view', compact('location', 'location_prices', 'seasons', 'packages', 'price_modes'));
    }

    public function storeLocationPrice(Request $request)
    {
        $location_id = $request->input('hide_location_id');
        LocationPrices::create([
            'location_id' => $location_id,
            'season_id' => $request->input('cmb_season'),
            'package_id' => $request->input('cmb_package'),
            'price_mode_id' => $request->input('cmb_price_mode'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'is_compulsory' => $request->has('chk_compulsory') ? 1 : 0,
            'status' => 1,
        ]);

        return redirect()
            ->route('location_prices.view', ['hide_location_id' => $location_id])
            ->with('success', 'Price added successfully!');
    }//store location price

    public function updateLocationPrice(Request $request)
    {
        $price_id = $request->input('hide_price_id');

        $location_price = LocationPrices::find($price_id);
        $location_id = $location_price->location_id;

        $location_price->season_id = $request->input('cmb_edit_season');
        $location_price->package_id = $request->input('cmb_edit_package');
        $location_price->price_mode_id = $request->input('cmb_edit_price_mode');
        $location_price->description = $request->input('edit_description');
        $location_price->price = $request->input('edit_price');
        $location_price->is_compulsory = $request->has('chk_edit_compulsory') ? 1 : 0;

        $location_price->save();

        return redirect()
            ->route('location_prices.view', ['hide_location_id' => $location_id])
            ->with('success', 'Price added successfully!');

    }//update location price

    public function getOneLocationPrice(Request $request)
    {
        $price_id = $request->input('price_id');
        $location_price = LocationPrices::find($price_id);

        return response()->json([
            'id' => $price_id,
            'season_id' => $location_price->season_id,
            'season' => $location_price->season->name,
            'package_id' => $location_price->package_id,
            'package' => $location_price->package->name,
            'price_mode_id' => $location_price->price_mode_id,
            'price_mode' => $location_price->priceMode->name,
            'description' => $location_price->description,
            'price' => $location_price->price,
            'is_compulsory' => $location_price->is_compulsory,
            'status' => $location_price->status,
        ]);

    }//get one location price ajax

    /*
    * location ajax methods
    */
    public function getLocations(Request $request){
        $locations = Locations::where('status', 1)->get();

        return response()->json($locations);
    }

}
