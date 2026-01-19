<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Locations;
use App\Models\Packages;
use App\Models\TourPurposes;
use App\Models\TourRequest;
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
        $destinations = Locations::where('status', 1)->get();

        return view('msin.tour_destinations', compact('tour_request', 'destinations'));
    }

    public function tourPackageView()
    {
        $packages = Packages::where('status', 1)->paginate(6);

        return view('main.tour_packages', compact('packages'));
    }

    public function showCustomerRegister()
    {
        $countries = Countries::all();
        $pourposes = TourPurposes::all();

        return view('main.customer_register', compact('countries', 'pourposes'));
    }
}//class
