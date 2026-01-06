<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\HotelFacilities;
use App\Models\Hotels;
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

    public function edit(Request $request){
        $hotel_id = $request->input('hide_hotel_id');
        $hotel = Hotels::find($hotel_id);

        //fetch facilities
        $general_facilities = Facilities::where('facilities_type_id', 1)->get();
        $food_drink_facilities = Facilities::where('facilities_type_id', 2)->get();
        $wellness_recreation_facilities = Facilities::where('facilities_type_id', 3)->get();
        $services_facilities = Facilities::where('facilities_type_id', 4)->get();
        $family_kids_facilities = Facilities::where('facilities_type_id', 5)->get();
        $outdoors_activities_facilities = Facilities::where('facilities_type_id', 6)->get();
        $in_room_facilities = Facilities::where('facilities_type_id', 7)->get();

        $hotel_facilities = HotelFacilities::where('hotel_id', $hotel_id)
            ->get();

        $gf_data = [];
        $fdf_data = [];
        $wrf_data = [];
        $sf_data = [];
        $fkf_data = [];
        $oaf_data = [];
        $irf_data = [];

        //generate general facilities data with status
        foreach($general_facilities as $gf)
        {
            $hf = HotelFacilities::where('hotel_id', $hotel_id)
                ->where('facility_id', $gf->id)
                ->exists();
            $status = $hf ? true : false;
            $gf_data[] = [
                'id' => $gf->id,
                'name' => $gf->name,
                'status' => $status
            ];
        }

        //food & drink
        foreach($food_drink_facilities as $fdf)
        {
            $hf = HotelFacilities::where('hotel_id', $hotel_id)
                ->where('facility_id', $fdf->id)
                ->exists();
            $status = $hf ? true : false;
            $fdf_data[] = [
                'id' => $fdf->id,
                'name' => $fdf->name,
                'status' => $status
            ];
        }

        //wellness & recreation
        foreach($wellness_recreation_facilities as $wrf)
        {
            $hf = HotelFacilities::where('hotel_id', $hotel_id)
                ->where('facility_id', $wrf->id)
                ->exists();
            $status = $hf ? true : false;
            $wrf_data[] = [
                'id' => $wrf->id,
                'name' => $wrf->name,
                'status' => $status
            ];
        }

        //service facilities
        foreach($services_facilities as $sf)
        {
            $hf = HotelFacilities::where('hotel_id', $hotel_id)
                ->where('facility_id', $sf->id)
                ->exists();
            $status = $hf ? true : false;
            $sf_data[] = [
                'id' => $sf->id,
                'name' => $sf->name,
                'status' => $status
            ];
        }

        //family kids
        foreach($family_kids_facilities as $fkf)
        {
            $hf = HotelFacilities::where('hotel_id', $hotel_id)
                ->where('facility_id', $fkf->id)
                ->exists();
            $status = $hf ? true : false;
            $fkf_data[] = [
                'id' => $fkf->id,
                'name' => $fkf->name,
                'status' => $status
            ];
        }

        //outdoor activities
        foreach($outdoors_activities_facilities as $oaf)
        {
            $hf = HotelFacilities::where('hotel_id', $hotel_id)
                ->where('facility_id', $oaf->id)
                ->exists();
            $status = $hf ? true : false;
            $oaf_data[] = [
                'id' => $oaf->id,
                'name' => $oaf->name,
                'status' => $status
            ];
        }

          //inroom facilities
        foreach($in_room_facilities as $irf)
        {
            $hf = HotelFacilities::where('hotel_id', $hotel_id)
                ->where('facility_id', $irf->id)
                ->exists();
            $status = $hf ? true : false;
            $irf_data[] = [
                'id' => $irf->id,
                'name' => $irf->name,
                'status' => $status
            ];
        }

        // dd($gf_data);

        return view('hotels.facilities_edit', compact('hotel', 'gf_data', 'fdf_data', 'wrf_data', 'sf_data', 'fkf_data', 'oaf_data', 'irf_data', 'hotel_facilities'));

    }//goto edit

    public function update(Request $request){
        $hotel_id = $request->input('hide_hotel_id');

        $facilities = Facilities::all();

        //delete existing facilities for the hotel
        HotelFacilities::where('hotel_id', $hotel_id)->delete();

        foreach($facilities as $facility)
        {
            $facility_id = $facility->id;
            $input_name = 'fcl_' . $facility_id;
            if($request->has($input_name)){
                $hotel_facility = new HotelFacilities();
                $hotel_facility->hotel_id = $hotel_id;
                $hotel_facility->facility_id = $facility_id;
                $hotel_facility->save();
            }
        }//foreach

        return redirect()->route('hotels.index')->with('success', 'Facilities added successfully.');

    }//update

    //ajax methods

    public function getHotelFacilities(Request $request)
    {
        $hotel_id = $request->input('hotel_id');

        $hotel_facilities = HotelFacilities::where('hotel_id', $hotel_id)
            ->with('facility')
            ->get();

        $facilities = [];

        foreach($hotel_facilities as $facility)
        {
            $facilities[] = [
                'id' => $facility->id,
                'facility_id' => $facility->facility_id,
                'name' => $facility->facility->name,
            ];
        }

        return response()->json($facilities);
    }

}//class
