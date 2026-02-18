<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\ActivityCategories;
use App\Models\ActivityPrices;
use App\Models\ActivityTimes;
use App\Models\Locations;
use App\Models\PriceModes;
use App\Models\Seasons;
use App\Models\TourPackages;
use App\Models\TravelCountries;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {  
        $categories = ActivityCategories::all();
        $times = ActivityTimes::all();

        $activities = Activities::where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(5);

        return view('activities.activities_view', compact('activities', 'categories', 'times'));
    }//index

    public function create(Request $request)
    {
        $travel_countries = TravelCountries::all();
        $categories = ActivityCategories::all();
        $activity_times = ActivityTimes::all();

        return view('activities.activity_create', compact('travel_countries', 'categories', 'activity_times'));
    }

    public function store(Request $request)
    {
        $activity = new Activities();

        $activity->travel_country_id = $request->input('cmb_travel_country');
        $activity->name = $request->input('activity_name');
        $activity->category_id = $request->input('cmb_category');
        $activity->description = $request->input('txt_description');
        $activity->is_paid = $request->has('chk_paid') ? 1 : 0;
        $activity->duration_minutes = $request->input('duration_minutes');
        $activity->best_time_id = $request->input('cmb_best_time');
        $activity->is_optional = $request->has('chk_optional_activity') ? 1 : 0;
        $activity->requires_guide = $request->has('chk_require_guide') ? 1 : 0;
        $activity->popularity = $request->input('popularity');
        $activity->status = 1; //active

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = 'A_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/activities'), $filename);
            $activity->cover_image = $filename;
        }
        if ($request->hasFile('image_1')) {
            $file = $request->file('image_1');
            $filename = 'A1_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/activities'), $filename);
            $activity->image1 = $filename;
        }
        if ($request->hasFile('image_2')) {
            $file = $request->file('image_2');
            $filename = 'A2_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/activities'), $filename);
            $activity->image2 = $filename;
        }

        $activity->save();

        return redirect()->route('activities.index')->with('success', 'Activity added successfullt!');

    }//store

    public function edit(Request $request)
    {
        $travel_countries = TravelCountries::all();
        $categories = ActivityCategories::all();
        $activity_times = ActivityTimes::all();

        $activity_id = $request->input('hide_activity_id');
        $activity = Activities::find($activity_id);

        return view('activities.activity_edit', compact('activity', 'travel_countries', 'categories', 'activity_times'));
    }

    public function update(Request $request)
    {
        $activity_id = $request->input('hide_activity_id');

        $activity = Activities::find($activity_id);

        $activity->travel_country_id = $request->input('cmb_travel_country');
        $activity->name = $request->input('activity_name');
        $activity->category_id = $request->input('cmb_category');
        $activity->description = $request->input('txt_description');
        $activity->is_paid = $request->has('chk_paid') ? 1 : 0;
        $activity->duration_minutes = $request->input('duration_minutes');
        $activity->best_time_id = $request->input('cmb_best_time');
        $activity->is_optional = $request->has('chk_optional_activity') ? 1 : 0;
        $activity->requires_guide = $request->has('chk_require_guide') ? 1 : 0;
        $activity->popularity = $request->input('popularity');
        $activity->status = 1; //active

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $oldImagePath = public_path('images/activities/'. $activity->cover_image);
            if (file_exists($oldImagePath) && !is_null($activity->cover_image)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('cover_image');
            $filename = 'A_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/activities'), $filename);
            $activity->cover_image = $filename;
        }

        if ($request->hasFile('image_1')) {
            $oldImagePath = public_path('images/activities/'. $activity->image1);
            if (file_exists($oldImagePath) && !is_null($activity->image1)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('image_1');
            $filename = 'A1_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/activities'), $filename);
            $activity->image1 = $filename;
        }

        if ($request->hasFile('image_2')) {
            $oldImagePath = public_path('images/activities/'. $activity->image2);
            if (file_exists($oldImagePath) && !is_null($activity->image2)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('image_1');
            $filename = 'A2_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/activities'), $filename);
            $activity->image2 = $filename;
        }

        $activity->save();

        return redirect()->route('activities.index')->with('success', 'Activity updated successfully!');

    }//update

    public function remove(Request $request)
    {
        $activity_id = $request->input('hide_activity_id');
        $activity = Activities::find($activity_id);

        $activity->status = 0;

        $activity->save();

        return redirect()->route('activities.index')->with('success', 'Activity removed successfully!');
    }//remove

//================================ Activity Price ====================================//
    public function showActivityPrice(Request $request)
    {
        $activity_id = $request->input('activity_id');
        $activity = Activities::find($activity_id);

        $activity_prices = ActivityPrices::where('activity_id', $activity_id)->paginate(10);

        //get necessary data
        $seasons = Seasons::all();
        $packages = TourPackages::all();
        $price_modes = PriceModes::all();

        return view('activities.activity_price_view', compact('activity', 'activity_prices', 'seasons', 'packages', 'price_modes'));
    }//show activity Price

    public function storeActivityPrice(Request $request)
    {
        $activity_id = $request->input('hide_activity_id');

        $activity_price = ActivityPrices::create([
            'activity_id' => $activity_id,
            'season_id' => $request->input('cmb_season'),
            'package_id' => $request->input('cmb_package'), 
            'price_mode_id' => $request->input('cmb_price_mode'), 
            'description' => $request->input('description'), 
            'price' => $request->input('price'), 
            'is_compulsory' => $request->has('chk_compulsory') ? 1 : 0,
            'status' => 1, //active
        ]);

        if($activity_price){
            return redirect()->route('activity_price.view', ['activity_id' => $activity_id])
                ->with('success', 'Activity price added successfully!');
        }
        else{
            return redirect()->route('activity_price.view', ['activity_id' => $activity_id])
                ->with('error', 'Activity price add failed!');
        }
    }//store activity price

    public function updateActivityPrice(Request $request)
    {
        $price_id = $request->input('hide_price_id');
        $activity_price = ActivityPrices::find($price_id);
        $activity_id = $activity_price->activity_id;

        $activity_price->season_id = $request->input('cmb_edit_season');
        $activity_price->package_id = $request->input('cmb_edit_package');
        $activity_price->price_mode_id = $request->input('cmb_edit_price_mode');
        $activity_price->description = $request->input('edit_description');
        $activity_price->price = $request->input('edit_price');
        $activity_price->is_compulsory = $request->has('chk_edit_compulsory') ? 1 : 0;

        $activity_price->save();

        return redirect()->route('activity_price.view', ['activity_id' => $activity_id])
                ->with('success', 'Activity price added successfully!');
    }

    public function getOneActivityPrice(Request $request)
    {
        $price_id = $request->input('price_id');
        $activity_price = ActivityPrices::find($price_id);

        return response()->json([
            'id' => $activity_price->id,
            'season_id' => $activity_price->season_id,
            'package_id' => $activity_price->package_id,
            'price_mode_id' => $activity_price->price_mode_id,
            'description' => $activity_price->description,
            'price' => $activity_price->price,
            'is_compulsory' => $activity_price->is_compulsory,
            'status' => $activity_price->status,
        ]);
    }//get one activity price

    //AJAX methods
    public function getOneActivity(Request $request)
    {
        $activity_id = $request->input('activity_id');
        $activities = Activities::find($activity_id);

        return response()->json($activities);
    }//getOneActivity   

    public function getActivities()
    {
        $activities = Activities::all();

        return response()->json($activities);
    }//getActivities

    public function getActivitybyLocation(Request $request)
    {
        $location_id = $request->input('location_id');

        $activities = Activities::where('location_id', $location_id)->get();

        return response()->json($activities);
    }//getActivitybyLocation
}//class
