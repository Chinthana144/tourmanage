<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Hotels;
use App\Models\Locations;
use App\Models\Restaurants;
use App\Models\TourRouteItems;
use App\Models\Tours;
use App\Models\TravelMedia;
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

    public function hotelStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $item_id = $request->input('hot_cmb_hotels');

        $order_no = TourRouteItems::where('tour_id', $tour_id)->count();

        TourRouteItems::create([
            'tour_id' => $tour_id, 
            'day_no' => $request->input('hot_day_no'),
            'order_no' => $order_no + 1,
            'item_type' => Hotels::class,
            'item_id' => $request->input('hot_cmb_hotels'),
            'notes' => $request->input('hot_note'),
            'is_optional' => 0,
        ]);

        return redirect()->route('tour_route_items.index', ['hide_tour_id' => $tour_id]);
    }//hotel store

    public function restaurantStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $item_id = $request->input('res_cmb_restaurants');

        $order_no = TourRouteItems::where('tour_id', $tour_id)->count();

        TourRouteItems::create([
            'tour_id' => $tour_id, 
            'day_no' => $request->input('res_day_no'),
            'order_no' => $order_no + 1,
            'item_type' => Restaurants::class,
            'item_id' => $request->input('res_cmb_restaurants'),
            'notes' => $request->input('res_note'),
            'is_optional' => 0,
        ]);

        return redirect()->route('tour_route_items.index', ['hide_tour_id' => $tour_id]);
    }//restaurant store

    public function activityStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $item_id = $request->input('act_cmb_activities');

        $order_no = TourRouteItems::where('tour_id', $tour_id)->count();

        TourRouteItems::create([
            'tour_id' => $tour_id, 
            'day_no' => $request->input('act_day_no'),
            'order_no' => $order_no + 1,
            'item_type' => Activities::class,
            'item_id' => $request->input('act_cmb_activities'),
            'notes' => $request->input('act_note'),
            'is_optional' => 0,
        ]);

        return redirect()->route('tour_route_items.index', ['hide_tour_id' => $tour_id]);
    }//activity store

    public function travelStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');

        $order_no = TourRouteItems::where('tour_id', $tour_id)->count();

        TourRouteItems::create([
            'tour_id' => $tour_id, 
            'day_no' => $request->input('tvl_day_no'),
            'order_no' => $order_no + 1,
            'item_type' => TravelMedia::class,
            'item_id' => $request->input('tvl_cmb_travel'),
            'notes' => $request->input('tvl_note'),
            'is_optional' => 0,
        ]);

        return redirect()->route('tour_route_items.index', ['hide_tour_id' => $tour_id]);
    }//travel store

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
