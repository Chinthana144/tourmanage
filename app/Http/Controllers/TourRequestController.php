<?php

namespace App\Http\Controllers;

use App\Models\BoardingType;
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

    public function create(Request $request)
    {
        $customer_id = $request->input('hide_customer_id');
        $customer = Customers::find($customer_id);
        $boarding_types = BoardingType::all();

        return view('tour_requests.request_create', compact('customer', 'boarding_types'));
    }//create

    public function store(Request $request)
    {
        $tour_request = new TourRequest();

        $tour_request->customer_id = $request->input('hide_customer_id');
        $tour_request->boarding_type_id = $request->input('cmb_boarding_type');
        $tour_request->travel_date = $request->input('travel_date');
        $tour_request->return_date = $request->input('return_date');
        $tour_request->adults = $request->input('num_adults');
        $tour_request->children = $request->input('num_children');
        $tour_request->infants = $request->input('num_infants');
        $tour_request->budget = $request->input('hide_customer_id');
        $tour_request->special_requests = $request->input('txt_special_requests');
        $tour_request->status = 1; //pening

        $tour_request->save();

        //get customer
        $customer = Customers::find($request->input('hide_customer_id'));

        return view('tour_requests.request_rooms', compact('customer', 'tour_request'));

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
