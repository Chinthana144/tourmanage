<?php

namespace App\Http\Controllers;

use App\Models\BedTypes;
use App\Models\BoardingType;
use App\Models\Countries;
use App\Models\Currency;
use App\Models\Customers;
use App\Models\RoomTypes;
use App\Models\TourBudget;
use App\Models\TourPurposes;
use App\Models\TourRequest;
use App\Models\TourRequestPeople;
use App\Models\TravelCountries;
use Illuminate\Http\Request;

class TourRequestController extends Controller
{
    public function index()
    {
        $all_requests = TourRequest::orderBy('id', 'DESC')->paginate(10);
        $tour_purposes = TourPurposes::all();
        $countries = Countries::all();
        $travel_countries = TravelCountries::all();
        $tour_budget = TourBudget::all();

        return view('tour_requests.request_view', compact('all_requests', 'tour_purposes', 'countries', 'travel_countries', 'tour_budget'));
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
        $tour_request->status = 1; //pending

        $tour_request->save();

        return redirect()->route('tour_request_people.index', ['tour_request_id' => $tour_request->id]);

    }//store

    public function requestStore(Request $request)
    {
        $tour_request = TourRequest::create([
            'travel_country_id' => $request->input('cmb_tour_country'),
            'tour_purpose_id' => $request->input('cmb_pourpose'),
            'tour_budget_id' => $request->input('cmb_budget'),
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'customer_phone' => $request->input('customer_phone'),
            'country_id' => $request->input('cmb_customer_country'),
            'travel_date' => $request->input('travel_date'),
            'return_date' => $request->input('return_date'),
            'adults' => $request->input('adults'),
            'children' => $request->input('children') ?? 0,
            'infants' => $request->input('infants') ?? 0,
            'rooms_count' => $request->input('rooms_count') ?? 1,
            'description' => $request->input('text_description') ?? '',
            'status' => 1, //pending
        ]);

        if($tour_request){
            return redirect()->route('main.show_customer_register')->with('success', 'Tour request added successfully!');
        }
        else{
            return redirect()->route('main.show_customer_register')->with('error', 'Sorry, something went wrong!');
        }
    }//request store by ajax

    public function update(Request $request)
    {
        $tour_request_id = $request->input('hide_request_id');

        $tour_request = TourRequest::find($tour_request_id);

        $tour_request->travel_country_id = $request->input('cmb_travel_country');
        $tour_request->tour_purpose_id = $request->input('cmb_tour_purpose');
        $tour_request->tour_budget_id = $request->input('cmb_tour_budget');
        $tour_request->customer_name = $request->input('customer_name');
        $tour_request->customer_email = $request->input('customer_email');
        $tour_request->customer_phone = $request->input('customer_phone');
        $tour_request->country_id = $request->input('cmb_country');
        $tour_request->travel_date = $request->input('travel_date');
        $tour_request->return_date = $request->input('return_date');
        $tour_request->adults = $request->input('number_of_adults');
        $tour_request->children = $request->input('number_of_children');
        $tour_request->infants = $request->input('number_of_infants');
        $tour_request->rooms_count = $request->input('rooms_count');
        $tour_request->description = $request->input('txt_description');

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

        return response()->json([
            'id' => $tour_request->id,
            'country_id' => $tour_request->country_id,
            'customer_country' => $tour_request->country->name,
            'customer_name' => $tour_request->customer_name,
            'customer_email' => $tour_request->customer_email,
            'customer_phone' => $tour_request->customer_phone,
            'travel_country_id' => $tour_request->travel_country_id,
            'travel_country' => $tour_request->travelCountry->name,
            'travel_date' => $tour_request->travel_date,
            'return_date' => $tour_request->return_date,
            'adults' => $tour_request->adults,
            'children' => $tour_request->children,
            'infants' => $tour_request->infants,
            'tour_pourpose_id' => $tour_request->tour_purpose_id,
            'tour_pourpose' => $tour_request->pourpose->name,
            'travel_budget_id'=> $tour_request->tour_budget_id,
            'rooms_count' => $tour_request->rooms_count,
            'description' => $tour_request->description,
            'status' => $tour_request->status,
        ]);
    }//get one request
}//class
