<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\ActivityCategories;
use App\Models\ActivityPrices;
use App\Models\ActivityTimes;
use App\Models\Locations;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {   
        $location_id = $request->input('hide_location_id');

        $location = Locations::find($location_id);

        $categories = ActivityCategories::all();
        $times = ActivityTimes::all();
        $price_types = ActivityPrices::all();

        $activities = Activities::where('location_id', $location_id)->get();

        return view('activities.activities_view', compact('location', 'activities', 'categories', 'times', 'price_types'));
    }//index

    public function store(Request $request)
    {
        $location_id = $request->input('hide_location_id');

        Activities::create([
            'location_id' => $request->input('hide_location_id'),
            'name' => $request->input('txt_name'),
            'category_id' => $request->input('cmb_category'),
            'description' => $request->input('txt_description'),
            'is_paid' => $request->has('chk_paid_activity') ? 1 : 0,
            'pricing_type_id' => $request->input('cmb_pricing_type'),
            'price_adult' => $request->input('num_adult_price'),
            'price_child' => $request->input('num_child_price'),
            'group_price' => $request->input('num_group_price'),
            'duration_minutes' => $request->input('num_duration'),
            'best_time_id' => $request->input('cmb_best_time'),
            'is_optional' => $request->has('chk_optional') ? 1 : 0,
            'requires_guide' => $request->has('chk_requires_guide') ? 1 : 0,
            'notes' => $request->input('txt_note'),
            'status' => $request->has('chk_status') ? 1 : 0,
        ]);

        return redirect()->route('activities.index', ['hide_location_id' => $location_id])->with('success', 'Activity added successfullt!');

    }//store

    public function update(Request $request)
    {
        $location_id = $request->input('hide_location_id');
        $activity_id = $request->input('hide_activity_id');

        $activity = Activities::find($activity_id);

        $activity->name = $request->input('txt_edit_name');
        $activity->category_id = $request->input('cmb_edit_category');
        $activity->description = $request->input('txt_edit_description');
        $activity->is_paid = $request->has('chk_edit_paid_activity') ? 1 : 0;
        $activity->pricing_type_id = $request->input('cmb_edit_pricing_type');
        $activity->price_adult = $request->input('num_edit_adult_price');
        $activity->price_child = $request->input('num_edit_child_price');
        $activity->group_price = $request->input('num_edit_group_price');
        $activity->duration_minutes = $request->input('num_edit_duration');
        $activity->best_time_id = $request->input('cmb_edit_best_time');
        $activity->is_optional = $request->has('chk_edit_optional') ? 1 : 0;
        $activity->requires_guide = $request->has('chk_edit_requires_guide') ? 1 : 0;
        $activity->notes = $request->input('txt_edit_note');
        $activity->status = $request->has('chk_edit_status') ? 1 : 0;

        $activity->save();

        return redirect()->route('activities.index', ['hide_location_id' => $location_id])->with('success', 'Activity updated successfullt!');

    }//update

    //AJAX methods
    public function getOneActivity(Request $request)
    {
        $activity_id = $request->input('activity_id');
        $activities = Activities::find($activity_id);

        return response()->json($activities);
    }//getOneActivity   
}//class
