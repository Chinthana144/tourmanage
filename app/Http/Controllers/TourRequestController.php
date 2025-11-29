<?php

namespace App\Http\Controllers;

use App\Models\Customers;
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

    public function update(Request $request)
    {
        $tour_request_id = $request->input('hide_request_id');

        $tour_request = TourRequest::find($tour_request_id);
        
        $tour_request->travel_date = $request->input('travel_date');
        $tour_request->return_date = $request->input('return_date');
        $tour_request->number_of_adults = $request->input('number_of_adults');
        $tour_request->number_of_children = $request->input('number_of_children');
        $tour_request->tour_pourpose = $request->input('tour_pourpose');
        $tour_request->budget = $request->input('budget');
        $tour_request->special_requests = $request->input('special_requests');
        // $tour_request->status = $request->input('budget');

        $tour_request->save();

        return redirect()->route('tour_requests.index');
    }//update

    public function getOneRequest(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');

        $tour_request = TourRequest::find($tour_request_id);

        $customer_id = $tour_request->customer_id;

        $customer = Customers::find($customer_id);

        return response()->json([
            'id' => $tour_request->id,
            'customer_id' => $tour_request->customer_id,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'email' => $customer->email,
            'travel_date' => $tour_request->travel_date,
            'return_date' => $tour_request->return_date,
            'number_of_adults' => $tour_request->number_of_adults,
            'number_of_children' => $tour_request->number_of_children,
            'tour_pourpose' => $tour_request->tour_pourpose,
            'budget' => $tour_request->budget,
            'special_requests' => $tour_request->special_requests,
            'status' => $tour_request->status,
        ]);
    }//get one request
}//class
