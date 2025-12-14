<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Locations;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {   
        $location_id = $request->input('hide_location_id');

        $location = Locations::find($location_id);
        $activities = Activities::where('location_id', $location_id)->get();

        return view('activities.activities_view', compact('location', 'activities'));
    }//index

    public function store(Request $request)
    {
        $location_id = $request->input('hide_location_id');

        Activities::create([
            'location_id' => $request->input('hide_location_id'),
            'name' => $request->input('txt_name'),
            'category' => $request->input('cmb_category'),
            'description' => $request->input('txt_description'),
            'is_paid' => $request->has('chk_paid_activity') ? 1 : 0,
            'pricing_type' => $request->input('cmb_pricing_type'),
            'price_adult' => $request->input('num_adult_price'),
            'price_child' => $request->input('num_child_price'),
            'group_price' => $request->input('num_group_price'),
            'duration_minutes' => $request->input('num_duration'),
            'best_time' => $request->input('cmb_best_time'),
            'is_optional' => $request->has('chk_optional') ? 1 : 0,
            'requires_guide' => $request->has('chk_requires_guide') ? 1 : 0,
            'notes' => $request->input('txt_note'),
            'status' => $request->has('chk_status') ? 1 : 0,
        ]);

        return redirect()->route('activities.index', ['hide_location_id' => $location_id])->with('success', 'Activity added successfullt!');

    }//store

    //AJAX methods
    public function getOneActivity(Request $request)
    {
        $activity_id = $request->input('activity_id');
        $activities = Activities::find($activity_id);

        return response()->json($activities);
    }//getOneActivity   
}//class
