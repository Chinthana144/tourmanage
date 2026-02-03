<?php

namespace App\Http\Controllers;

use App\Models\TravelCountries;
use App\Models\TravelMedia;
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
}//class
