<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {   
        $location_id = $request->input('hide_location_id');

        $location = Locations::find($location_id);

        return view('activities.activities_view', compact('location'));
    }//index

    
}//class
