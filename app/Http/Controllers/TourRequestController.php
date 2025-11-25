<?php

namespace App\Http\Controllers;

use App\Models\TourRequest;
use Illuminate\Http\Request;

class TourRequestController extends Controller
{
    public function index()
    {
        $all_requests = TourRequest::all();
        return view('tour_requests.request_view', compact('all_requests'));
    }//index

    public function store(Request $request)
    {
        TourRequest::create([
            'customer_id' => $request->input('hide_request_customer_id'),
            'travel_date' => $request->input('travel_date'),
            'return_date' => $request->input('return_date'),
            'number_of_adults' => $request->input('number_of_adults'),
            'number_of_children' => $request->input('number_of_children'),
            'tour_pourpose' => $request->input('tour_pourpose'),
            'budget' => $request->input('budget'),
            'special_requests' => $request->input('special_requests'),
            'status' => 1, //pending
        ]);

        return redirect()->route('tour_requests.index');

    }//store
}//class
