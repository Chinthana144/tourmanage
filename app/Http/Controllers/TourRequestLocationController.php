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

        return view('tour_requests.request_locations', compact('tour_request', 'customer', 'locations'));
    }//index

    /*
    * storing tour request location using AJAX
    */
    public function storeTourRequestLocation(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $location_id = $request->input('location_id');

        TourRequestLocations::create([
            'tour_request_id' => $tour_request_id,
            'location_id' => $location_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Visit location added successfully!',
        ]);
    }//store
}
