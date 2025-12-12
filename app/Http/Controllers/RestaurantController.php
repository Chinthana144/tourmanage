<?php

namespace App\Http\Controllers;

use App\Models\Provinces;
use App\Models\Restaurants;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurants::all();

        return view('restaurants.restaurant_view', compact('restaurants'));
    }//index

    public function create()
    {
        $provinces = Provinces::all();

        return view('restaurants.restaurant_create', compact('provinces'));
    }//create
}//class
