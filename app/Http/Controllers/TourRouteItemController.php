<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use App\Models\TourRouteItems;
use App\Models\Tours;
use Illuminate\Http\Request;

class TourRouteItemController extends Controller
{
    public function index(Request $request)
    {   
        $tour_id = $request->input('hide_tour_id');
        $tour = Tours::find($tour_id);

        $route_items = TourRouteItems::where('tour_id', $tour_id)->get();

        return view('tour_route_items.tour_route_items', compact('tour', 'route_items'));
    }//index

    //location store
    public function locationStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $item_id = $request->input('loc_cmb_locations');

        $order_no = TourRouteItems::where('tour_id', $tour_id)->count();

        TourRouteItems::create([
            'tour_id' => $tour_id, 
            'day_no' => $request->input('loc_day_no'),
            'order_no' => $order_no + 1,
            'item_type' => Locations::class,
            'item_id' => $request->input('loc_cmb_locations'),
            'notes' => $request->input('loc_note'),
            'is_optional' => 0,
        ]);

        return redirect()->route('tour_route_items.index', ['hide_tour_id' => $tour_id]);
    }//location store

    //remove tour route item
    public function destroy(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $route_item_id = $request->input('route_item_id');

        $route_item = TourRouteItems::find($route_item_id);

        $route_item->delete();

        return redirect()->route('tour_route_items.index', ['hide_tour_id' => $tour_id]);
    }//destroy
}//class
