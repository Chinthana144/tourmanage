<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Locations;
use App\Models\TourRoutes;
use App\Models\Tours;
use Illuminate\Http\Request;

class TourRouteController extends Controller
{
    public function index(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $tour = Tours::find($tour_id);
        $routes = TourRoutes::where('tour_id', $tour_id)
            ->orderBy('order_no', 'ASC')
            ->get();

        return view('tour_routes.tour_route_create', compact('tour', 'routes'));
    }//index

    public function activityStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $routable_id = $request->input('cmb_activities');

        $order_no = TourRoutes::where('tour_id', $tour_id)->count();

        $quantity = TourRoutes::where('tour_id', $tour_id)
            ->where('routable_id', $routable_id)
            ->count();

        TourRoutes::create([
            'tour_id' => $request->input('hide_tour_id'),
            'order_no' => $order_no + 1,
            'routable_type' => Activities::class,
            'routable_id' => $request->input('cmb_activities'),
            'day_no' => $request->input('act_day_no'),
            'quantity' => $quantity + 1,
            'price_adult' => $request->input('act_price_per_adult'),
            'price_child' => $request->input('act_price_per_child'),
            'total_price_adult' => $request->input('act_total_price_adult'),
            'total_price_child' => $request->input('act_total_price_child'),
            'line_total' => floatval($request->input('act_total_price_adult')) + floatval($request->input('act_total_price_child')),
            'notes' => "",
        ]);

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route added successfully!');
    }//activity store

    public function locationStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $routable_id = $request->input('loc_cmb_locations');

        $order_no = TourRoutes::where('tour_id', $tour_id)->count();

        $quantity = TourRoutes::where('tour_id', $tour_id)
            ->where('routable_id', $routable_id)
            ->count();

        TourRoutes::create([
            'tour_id' => $tour_id,
            'order_no' => $order_no + 1,
            'routable_type' => Locations::class,
            'routable_id' => $routable_id,
            'day_no' => $request->input('loc_day_no'),
            'quantity' => $quantity + 1,
            'price_adult' => 0,
            'price_child' => 0,
            'total_price_adult' => 0,
            'total_price_child' => 0,
            'line_total' => 0,
            'notes' => "",
        ]);

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route added successfully!');
    }//location store

    //destroy
    public function destroy(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $route_id = $request->input('hide_route_id');

        $route = TourRoutes::find($route_id);
        $route->delete();

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route deleted successfully!');
    }//destroy

    //order up
    public function orderUp(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $route_id = $request->input('hide_route_id');
        $route = TourRoutes::find($route_id);
        $current_order_no = $route->order_no;

        if($current_order_no > 1)
        {
            $new_order_no = $current_order_no - 1;
            $old_route = TourRoutes::where("tour_id", $tour_id)
                ->where('order_no', $new_order_no)
                ->first();

            $old_route->order_no = $current_order_no;
            $old_route->save();

            $route->order_no = $new_order_no;
            $route->save();
        }//less than one

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route order changed successfully!');
    }//order up

    public function orderDown(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $route_id = $request->input('hide_route_id');
        $route = TourRoutes::find($route_id);
        $current_order_no = $route->order_no;

        $rount_count = TourRoutes::where('tour_id', $tour_id)->count();

        $new_order_no = $current_order_no + 1;
        if($rount_count >= $new_order_no)
        {
            $old_route = TourRoutes::where("tour_id", $tour_id)
                    ->where('order_no', $new_order_no)
                    ->first();
            $old_route->order_no = $current_order_no;
            $old_route->save();

            $route->order_no = $new_order_no;
            $route->save();
        }

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route order changed successfully!');
    }//order down
}//class
