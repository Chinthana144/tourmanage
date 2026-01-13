<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use App\Models\TourPurposes;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $tour_pourposes = TourPurposes::all();
        $destinations = Locations::where('display', 1)->limit(6)->get();

        return view('main.main', compact('tour_pourposes', 'destinations'));
    }//index
}//class
