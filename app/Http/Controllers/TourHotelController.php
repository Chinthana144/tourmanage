<?php

namespace App\Http\Controllers;

use App\Models\HotelFacilities;
use App\Models\TourHotels;
use App\Models\TourRouteItems;
use Illuminate\Http\Request;

class TourHotelController extends Controller
{
    public function store(Request $request)
    {
        $tour_route_item_id = $request->input('hot_tour_route_id');
        $tour_package_id = $request->input('hot_package_id');
        $hotel_id = $request->input('hot_hotel_id');

        $tour_route_item = TourRouteItems::find($tour_route_item_id);
        $tour_id = $tour_route_item->tour_id;

        $hotel_facilities = HotelFacilities::where('hotel_id', $hotel_id)
            ->get();

        $facilities = [];

        foreach ($hotel_facilities as $facility)
        {
            $status = $request->has('chk_facility_' . $facility->facility_id) ? 1 : 0;

            $facilities[] = [
                'facility_id' => $facility->facility_id,
                'facility_name' => $facility->facility->name,
                'status' => $status,
            ];
        }//foreach

        TourHotels::create([
            'tour_route_item_id' => $request->input('hot_tour_route_id'),
            'tour_package_id' => $request->input('hot_package_id'),
            'hotel_id' => $request->input('hot_hotel_id'),
            'boarding_type_id' => $request->input('cmb_boarding_type'),
            'check_in_date' => $request->input('check_in_date'),
            'check_out_date' => $request->input('check_out_date'),
            'nights' => $request->input('nights'),
            'facilities' => json_encode($facilities),
        ]);

        return redirect()->route('tour_package_items.index', ['hide_tour_id' => $tour_id]);
    }//store
}//class
