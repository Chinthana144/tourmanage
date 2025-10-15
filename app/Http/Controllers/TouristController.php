<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use App\Models\Countries;
use App\Models\DietaryPreference;
use App\Models\Languages;
use App\Models\Tourists;
use Illuminate\Http\Request;

class TouristController extends Controller
{
    public function index()
    {
        $tourists = Tourists::paginate(10);
        //gether necessary data
        $blood_groups = BloodGroup::all();
        $dietary_types = DietaryPreference::all();

        return view('tourists.tourists_view', compact('tourists', 'blood_groups', 'dietary_types'));
    }

    public function create()
    {
        $countries = Countries::all();
        $languages = Languages::all();

        return view('tourists.tourists_profile', compact('countries', 'languages'));
    }//create

    public function store(Request $request){
        $tourist = new Tourists();

        $tourist->firstname = $request->input('first_name');
        $tourist->lastname = $request->input('last_name');
        $tourist->email = $request->input('email');
        $tourist->phone = $request->input('phone');
        $tourist->passport_no = $request->input('passport_no');
        $tourist->country_id  = $request->input('cmb_country');
        $tourist->address = $request->input('address');
        $tourist->dob = $request->input('dob');
        $tourist->language_id  = $request->input('cmb_language');
        $tourist->status = 1;

        if($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = 'T_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/tourists'), $filename);
            $tourist->profile_picture = 'images/tourists/' . $filename;
        }//upload primary image

        $tourist->save();

        //gether necessary data
        $blood_groups = BloodGroup::all();
        $dietary_types = DietaryPreference::all();

        return view('tourist_health.tourist_health', compact('tourist', 'blood_groups', 'dietary_types'));
    }

    
}//class
