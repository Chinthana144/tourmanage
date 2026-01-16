<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Locations;
use App\Models\TourPurposes;
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
}//class
