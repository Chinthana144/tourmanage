<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Locations;
use App\Models\TourRequest;
use App\Models\TourRequestLocations;
use Illuminate\Http\Request;

class TourRequestLocationController extends Controller
{
    public function index(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $tour_request = TourRequest::find($tour_request_id);

        //customer
        $customer_id = $tour_request->customer_id;
        $customer = Customers::find($customer_id);

        //locations
        $locations = Locations::where('status', 1)
            ->with('activities')
            ->paginate(5);

        $request_locations = TourRequestLocations::where('tour_request_id', $tour_request_id)->get();

        $selected_locations = [];
        foreach($request_locations as $location)
        {
            $selected_locations[] = $location->location_id;
        }

        // dd($selected_locations);

        return view('tour_requests.request_locations', compact('tour_request', 'customer', 'locations', 'selected_locations'));
    }//index

    public function store(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');

        $locations = Locations::where('status', 1)->get();

        foreach ($locations as $location)
        {
            if($request->has('chk_location_' . $location->id))
            {
                TourRequestLocations::create([
                    'tour_request_id' => $tour_request_id,
                    'location_id' => $location->id,
                ]);
            }//has selected
            else
            {
                //delete if exist
                $remove_location = TourRequestLocations::where('tour_request_id', $tour_request_id)
                    ->where('location_id', $location->id)
                    ->orderBy('id', 'desc')
                    ->first();

                if($remove_location)
                {
                    $remove_location->delete();
                }

                continue;
            }
        }

        return redirect()->route('tour_requests.index');
    }//store

    /*
    * storing tour request location using AJAX
    */
    public function storeTourRequestLocation(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $location_id = $request->input('location_id');

        TourRequestLocations::firstOrCreate([
            'tour_request_id' => $tour_request_id,
            'location_id' => $location_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Visit destination added successfully!',
        ]);
    }//store

    public function toggleTourDestinations(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $location_id = $request->input('location_id');
        $value = $request->input('value');
        if($value)
        {
            TourRequestLocations::firstOrCreate([
                'tour_request_id' => $tour_request_id,
                'location_id' => $location_id,
            ]);
        }//create
        else
        {
            $tour_location = TourRequestLocations::where('tour_request_id', $tour_request_id)
                ->where('location_id', $location_id)
                ->first();
            if($tour_location)
            {
                $tour_location->delete();
            }
        }//delete
    }

    public function getRequestLocations(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');

        $request_locations = TourRequestLocations::where('tour_request_id', $tour_request_id)->get();

        $locations = [];

        foreach ($request_locations as $location)
        {
            $locations[] = [
                'id' => $location->id,
                'tour_request_id' => $location->tour_request_id,
                'location_id' => $location->location_id,
                'name' => $location->locations->name,
            ];

        }//foreach

        return response()->json($locations);
    }//get request location
}
