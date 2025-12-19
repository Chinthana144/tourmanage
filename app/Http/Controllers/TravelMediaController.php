<?php

namespace App\Http\Controllers;

use App\Models\TravelMedia;
use Illuminate\Http\Request;

class TravelMediaController extends Controller
{
    public function index()
    {
        $travel_medias = TravelMedia::all();

        return view('travel_media.travel_view', compact('travel_medias'));
    }//index
    
    public function store(Request $request)
    {   
        TravelMedia::create([
            'name' => $request->input('name'),
            'vehicle_no' => $request->input('vehicle_no'),
            'max_passengers' => $request->input('max_passengers'),
            'price_per_km' => $request->input('price_per_km'),
        ]);

        return redirect()->route('travel_media.index');
    }//store

    public function update(Request $request)
    {
        $travel_media_id = $request->input('hide_travel_media_id');

        $travel_media = TravelMedia::find($travel_media_id);
        $travel_media->name = $request->input('edit_name');
        $travel_media->vehicle_no = $request->input('edit_vehicle_no');
        $travel_media->max_passengers = $request->input('edit_max_passengers');
        $travel_media->price_per_km = $request->input('edit_price_per_km');

        $travel_media->save();

        return redirect()->route('travel_media.index');
    }//update

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
