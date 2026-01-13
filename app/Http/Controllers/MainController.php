<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $destinations = Locations::where('display', 1)->limit(6)->get();

        return view('main.main', compact('destinations'));
    }//index
}//class
