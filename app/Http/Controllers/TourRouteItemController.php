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

        $route_items = TourRouteItems::where('tour_id', $tour_id)
            ->orderBy('order_no', 'ASC')
            ->get();

        return view('tour_route_items.tour_route_items', compact('tour', 'route_items'));
    }//index

    //location store
    public function locationStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $item_id = $request->input('loc_cmb_locations');

        $order_no = TourRouteItems::where('tour_id', $tour_id)->count();

        //validate location ID
        if($item_id > 0)
        {
            TourRouteItems::create([
                'tour_id' => $tour_id, 
                'day_no' => $request->input('loc_day_no'),
                'order_no' => $order_no + 1,
                'item_type' => Locations::class,
                'item_id' => $request->input('loc_cmb_locations'),
                'notes' => $request->input('loc_note') ?? "no note",
                'is_optional' => 0,
            ]);
        }//has location
        else
        {
            //redirect back with error message
            return redirect()->route('tour_route_items.index', ['hide_tour_id' => $tour_id])->with('error', 'Please select a valid location.');
        }
    
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

    public function getRouteItemsByTourID(Request $request)
    {
        $tour_id = $request->input('tour_id');
        $route_items = TourRouteItems::where('tour_id', $tour_id)
            ->orderBy('order_no', 'ASC')
            ->get();

        $items = [];

        foreach($route_items as $route_item)
        {
            $item_type = "";
            switch ($route_item->item_type) {
                case 'App\Models\Locations':
                    $item_type = "location";
                break;
                case 'App\Models\Hotels':
                    $item_type = "hotel";
                break;
                case 'App\Models\Restaurants':
                    $item_type = "restaurant";
                break;
                case 'App\Models\Activities':
                    $item_type = "activity";
                break;
                case 'App\Models\TravelMedia':
                    $item_type = "travel";
                break;
                
                default:
                    $item_type = "undefined";
                break;
            }

            $items[] = [
                'id' => $route_item->id,
                'tour_id' => $tour_id,
                'day_no' => $route_item->day_no,
                'order_no' => $route_item->order_no,
                'item_type' => $item_type,
                'item_name' => $route_item->item->name,
                'notes' => $route_item->notes,
            ];
        }//foreach

        return response()->json($items);
    }//get tour items by tour id

    //AJAX methods
    public function deleteRouteItem(Request $request)
    {
        $route_item_id = $request->input('route_item_id');
        $route_item = TourRouteItems::find($route_item_id);
        $tour_id = $route_item->tour_id;

        $route_item->delete();

        //re-arrange order no
        $route_items = TourRouteItems::where('tour_id', $tour_id)->orderBy('order_no', 'ASC')->get();
        $order_no = 1;
        foreach ($route_items as $item) {
            $item->order_no = $order_no;
            $order_no += 1;
            
            $item->save();
        }

        return response()->json([
            'success' => true,
            'tour_id' => $tour_id,
            'message' => 'route item deleted successfully!',
        ]);
    }//delete rroute item

    public function routeMoveUp(Request $request)
    {
        $route_item_id = $request->input('route_item_id');
        $bottom_route_item = TourRouteItems::find($route_item_id);
        $tour_id = $bottom_route_item->tour_id;

        $current_order_no = $bottom_route_item->order_no;

        if($current_order_no > 1)
        {
            $top_order_no = intval($current_order_no) - 1;
            $bottom_route_item->order_no = $top_order_no;
            
            $top_route_item = TourRouteItems::where('order_no', $top_order_no)->first();
            if($top_route_item){
                $top_route_item->order_no = $current_order_no;
            }
            else
            {
                $bottom_route_item->order_no = $top_order_no;
            }

            $bottom_route_item->save();
            $top_route_item->save();

            return response()->json([
                'success' => true,
                'message' => 'route order changed successfully!',
                'tour_id' => $tour_id,
                'top' => $top_order_no,
                'current' => $current_order_no,
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'route order change failed!',
                'tour_id' => $tour_id,
            ]);
        }
        
    }//route move up

    public function routeMoveDown(Request $request)
    {
        $route_item_id = $request->input('route_item_id');
        $top_route_item = TourRouteItems::find($route_item_id);
        $tour_id = $top_route_item->tour_id;

        $current_order_no = $top_route_item->order_no;
        $tour_item_count = TourRouteItems::where('tour_id', $tour_id)->count();

        if($current_order_no < $tour_item_count)
        {
            $bottom_order_no = intval($current_order_no) + 1;
            $top_route_item->order_no = $bottom_order_no;

            $bottom_route_item = TourRouteItems::where('order_no', $bottom_order_no)->first();
            $bottom_route_item->order_no = $current_order_no;

            $bottom_route_item->save();
            $top_route_item->save();

            return response()->json([
                'success' => true,
                'message' => 'route order changed successfully!',
                'tour_id' => $tour_id,
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'route order change failed!',
                'tour_id' => $tour_id,
            ]);
        }//failed
        
    }//route move down
}//class
