<?php

namespace App\Http\Controllers;

use App\Models\BedTypes;
use App\Models\BoardingType;
use App\Models\Currency;
use App\Models\Customers;
use App\Models\RoomTypes;
use App\Models\TourPurposes;
use App\Models\TourRequest;
use App\Models\TourRequestPeople;
use Illuminate\Http\Request;

class TourRequestController extends Controller
{
    public function index()
    {
        $all_requests = TourRequest::all();
        $currencies = Currency::all();
        $tour_purposes = TourPurposes::all();

        return view('tour_requests.request_view', compact('all_requests', 'currencies', 'tour_purposes'));
    }//index

    public function create(Request $request)
    {
        $customer_id = $request->input('hide_customer_id');
        $customer = Customers::find($customer_id);
        $tour_purposes = TourPurposes::all();

        return view('tour_requests.request_create', compact('customer', 'tour_purposes'));
    }//create

    public function createRequest(Request $request)
    {
        $customer = $request->attributes->get('customer');

        return view('main.tour_request', compact('customer'));
    }//create request

    public function store(Request $request)
    {
        $tour_request = new TourRequest();

        $tour_request->customer_id = $request->input('hide_customer_id');
        $tour_request->travel_date = $request->input('travel_date');
        $tour_request->return_date = $request->input('return_date');
        $tour_request->total_adults = $request->input('num_total_adults');
        $tour_request->total_children = $request->input('num_total_children') ?? 0;
        $tour_request->tour_purpose_id = $request->input('cmb_tour_purpose');
        $tour_request->budget = $request->input('budget') ?? 0;
        $tour_request->special_requests = $request->input('txt_special_requests') ?? "";
        $tour_request->status = 1; //pening

        $tour_request->save();

        return redirect()->route('tour_request_people.index', ['tour_request_id' => $tour_request->id]);

    }//store

    public function update(Request $request)
    {
        $tour_request_id = $request->input('hide_request_id');

        $tour_request = TourRequest::find($tour_request_id);
        
        $tour_request->travel_date = $request->input('travel_date');
        $tour_request->return_date = $request->input('return_date');
        $tour_request->adults = $request->input('number_of_adults');
        $tour_request->children = $request->input('number_of_children');
        $tour_request->tour_pourpose = $request->input('tour_pourpose');
        $tour_request->budget = $request->input('budget');
        $tour_request->special_requests = $request->input('special_requests');
        // $tour_request->status = $request->input('budget');

        $tour_request->save();

        return redirect()->route('tour_requests.index');
    }//update

    public function destroy(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $tour_request = TourRequest::find($tour_request_id);

        $tour_request->delete();

        return redirect()->route('tour_request_rooms.index');
    }//destroy

    public function getOneRequest(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $tour_request = TourRequest::find($tour_request_id);

        $customer_id = $tour_request->customer_id;
        $customer = Customers::find($customer_id);

        $request_peoples = TourRequestPeople::where('tour_request_id', $tour_request_id)->get();

        $total_adults = 0;
        $total_children = 0;

        foreach ($request_peoples as $people) {
            $total_adults += intval($people->adults);
            $total_children += intval($people->children);
        }

        $tour_request->total_adults = $total_adults;
        $tour_request->total_children = $total_children;
        $tour_request->save();

        return response()->json([
            'id' => $tour_request->id,
            'customer_id' => $tour_request->customer_id,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'email' => $customer->email,
            'travel_date' => $tour_request->travel_date,
            'return_date' => $tour_request->return_date,
            'adults' => $total_adults,
            'children' => $total_children,
            'tour_pourpose' => $tour_request->tour_pourpose,
            'budget' => $tour_request->budget,
            'special_requests' => $tour_request->special_requests,
            'status' => $tour_request->status,
        ]);
    }//get one request
}//class
