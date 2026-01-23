<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Locations;
use App\Models\Packages;
use App\Models\TourBudget;
use App\Models\TourPackages;
use App\Models\TourPurposes;
use App\Models\TourRequest;
use App\Models\TravelCountries;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $countries = Countries::all();
        $destinations = Locations::where('display', 1)->limit(6)->get();

        return view('main.main', compact('destinations', 'countries'));
    }//index

    public function tempMain()
    {
        $countries = Countries::all();
        $destinations = Locations::where('display', 1)->limit(6)->get();

        return view('main.temp_main', compact('destinations', 'countries'));
    }

    public function destinationView()
    {
        $destinations = Locations::where('status', 1)->get();

        return view('main.destination', compact('destinations'));
    }

    public function tourDestination(Request $request)
    {
        $tour_request_id = $request->input('hide_tour_request_id');

        $tour_request =  TourRequest::find($tour_request_id);
        $destinations = Locations::where('status', 1)->paginate(6);
        $tour_packages = Packages::all();

        return view('main.tour_destinations', compact('tour_request', 'destinations', 'tour_packages'));
    }

    public function tourPackageView()
    {
        $packages = Packages::where('status', 1)->paginate(6);

        return view('main.tour_packages', compact('packages'));
    }

    public function showCustomerRegister()
    {
        $countries = Countries::all();
        $travel_countries = TravelCountries::all();
        $pourposes = TourPurposes::all();
        $budget_ranges = TourBudget::all();

        return view('main.customer_register', compact('countries', 'travel_countries', 'pourposes', 'budget_ranges'));
    }
}//class
