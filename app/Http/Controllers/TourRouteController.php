<?php

namespace App\Http\Controllers;

use App\Models\TourRoutes;
use App\Models\Tours;
use Illuminate\Http\Request;

class TourRouteController extends Controller
{
    public function index(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $tour = Tours::find($tour_id);
        $routes = TourRoutes::where('tour_id', $tour_id)->get();

        return view('tour_routes.tour_route_create', compact('tour', 'routes'));
    }//index

    public function activityStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $routable_id = $request->input('cmb_locations');

        $quantity = TourRoutes::where('tour_id', $tour_id)
            ->where('routable_id', $routable_id)
            ->count();

        TourRoutes::create([
            'tour_id' => $request->input('hide_tour_id'),
            'routable_type' => $request->input('act_routable_type'),
            'routable_id' => $request->input('cmb_locations'),
            'quantity' => $quantity + 1,
            'price_adult' => $request->input('act_price_per_adult'),
            'price_child' => $request->input('act_price_per_child'),
            'total_price_adult' => $request->input('act_total_price_adult'),
            'total_price_child' => $request->input('act_total_price_child'),
            'line_total' => floatval($request->input('act_total_price_adult')) + floatval($request->input('act_total_price_child')),
            'notes' => "",
        ]);

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route added successfully!');
    }//store
}//class
