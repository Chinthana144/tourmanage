<?php

namespace App\Http\Controllers;

use App\Models\PriceModes;
use App\Models\Seasons;
use App\Models\TourPackages;
use App\Models\TravelCountries;
use App\Models\TravelMedia;
use App\Models\TravelPrices;
use Illuminate\Http\Request;

class TravelMediaController extends Controller
{
    public function index()
    {
        $travel_countries = TravelCountries::all();
        $travel_medias = TravelMedia::where('status', 1)
            ->paginate(10);        

        return view('travel_media.travel_view', compact('travel_medias', 'travel_countries'));
    }//index
    
    public function store(Request $request)
    {   
        TravelMedia::create([
            'travel_country_id' =>$request->input('cmb_travel_country'),
            'name' => $request->input('name'),
            'vehicle_no' => $request->input('vehicle_no'),
            'max_passengers' => $request->input('max_passengers'),
            'price_per_km' => $request->input('price_per_km'),
            'popularity' => $request->input('popularity'),
            'status' => 1, //active
        ]);

        return redirect()->route('travel_media.index');
    }//store

    public function update(Request $request)
    {
        $travel_media_id = $request->input('hide_travel_media_id');

        $travel_media = TravelMedia::find($travel_media_id);

        $travel_media->travel_country_id = $request->input('cmb_travel_country');
        $travel_media->name = $request->input('edit_name');
        $travel_media->vehicle_no = $request->input('edit_vehicle_no');
        $travel_media->max_passengers = $request->input('edit_max_passengers');
        $travel_media->price_per_km = $request->input('edit_price_per_km');
        $travel_media->popularity = $request->input('edit_popularity');
        $travel_media->status = 1; //active

        $travel_media->save();

        return redirect()->route('travel_media.index')->with('success', 'Travel media updated successfully!');
    }//update

    public function remove(Request $request)
    {
        $travel_media_id = $request->input('hide_travel_id');
        $travel_media = TravelMedia::find($travel_media_id);

        $travel_media->status = 0;

        $travel_media->save();

        return redirect()->route('travel_media.index')->with('success', 'Travel media removed successfully!');
    }//remove

    //AJAX 
    public function getOneTravelMedia(Request $request)
    {
        $travel_media = TravelMedia::find($request->input('travel_media_id'));
        return response()->json($travel_media);
    }

    public function getTravelMedia()
    {
        $travel_media = TravelMedia::all();

        return response()->json($travel_media);
    }

    //============================= Travel Price ================================//
    public function showTravelPrice(Request $request)
    {
        $travel_media_id = $request->input('travel_media_id');
        $travel_media = TravelMedia::find($travel_media_id);

        $travel_prices = TravelPrices::where('travel_media_id', $travel_media_id)->paginate(10);

        //get necessary data
        $seasons = Seasons::all();
        $packages = TourPackages::all();
        $price_modes = PriceModes::all();

        return view('travel_media.travel_price_view', compact('travel_media', 'travel_prices', 'seasons', 'packages', 'price_modes'));
    }//show travel price

    public function storeTravelPrice(Request $request)
    {
        $travel_media_id = $request->input('travel_media_id');

        $travel_price = TravelPrices::create([
            'travel_media_id'=> $request->input('travel_media_id'),
            'season_id'=> $request->input('cmb_season'),
            'package_id'=> $request->input('cmb_package'),
            'price_mode_id'=> $request->input('cmb_price_mode'),
            'description'=> $request->input('description'),
            'price'=> $request->input('price'),
            'is_complusory'=> $request->has('chk_compulsory') ? 1 : 0,
            'status'=> 1, //active
        ]);

        return redirect()->route('travel_price.view', ['travel_media_id' => $travel_media_id])
            ->with('success', 'Travel Price added successfully!');

    }//store travel price
}//class
