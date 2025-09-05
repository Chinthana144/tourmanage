<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\HotelFacilities;
use Illuminate\Http\Request;

class FacilitiesController extends Controller
{
    public function store(Request $request){
        $hotel_id = $request->input('hide_hotel_id');

        $facilities = Facilities::all();

        foreach($facilities as $facility){
            $facility_id = $facility->id;
            $input_name = 'fcl_' . $facility_id;
            if($request->has($input_name)){
                $hotel_facility = new HotelFacilities();
                $hotel_facility->hotel_id = $hotel_id;
                $hotel_facility->facility_id = $facility_id;
                $hotel_facility->save();
            }
        }

        return redirect()->route('hotels.index')->with('success', 'Facilities added successfully.');

    }//store
}//class
