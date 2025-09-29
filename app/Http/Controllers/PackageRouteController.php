<?php

namespace App\Http\Controllers;

use App\Models\PackageRoutes;
use App\Models\Packages;
use Illuminate\Http\Request;

class PackageRouteController extends Controller
{
    // public function index(Request $request){
    //     $package_id = $request->input('hide_package_id');
    //     $package = Packages::find($package_id);
    //     $package_route = PackageRoutes::where('travel_package_id', $package_id)->get();

    //     return view('packageroutes.packageroute_create', compact('package', 'package_route'));
    // }

    public function store(Request $request){
        $package_id = $request->input('hide_package_id');
        $day_no = $request->input('cmb_days');
        $stoppable_type = $request->input('cmb_stoppable_type');
        $stoppable_id = $request->input('cmb_stoppable');
        $stay_duration = $request->input('stay_duration');

        $order_no = PackageRoutes::where('travel_package_id', $package_id)->count();
        $order_no = intval($order_no) + 1;
        
        // dd($order_no);
        $package_route  = new PackageRoutes();

        $package_route->travel_package_id = $package_id;
        $package_route->stoppable_type = $stoppable_type;
        $package_route->stoppable_id = $stoppable_id;
        $package_route->day_no = $day_no;
        $package_route->order_no = $order_no;
        $package_route->stay_duration = $stay_duration;
        $package_route->note = "";

        $package_route->save();

        $package = Packages::find($package_id);

        $package_route = PackageRoutes::with('stoppable')
            ->where('travel_package_id', $package_id)
            ->get();

        return view('packageroutes.packageroute_create', compact('package', 'package_route'));
    }

    public function edit(Request $request){
        $package_id = $request->input('hide_package_id');

        $package = Packages::find($package_id);

        $package_route = PackageRoutes::with('stoppable')
            ->where('travel_package_id', $package_id)
            ->get();

        // dd($package_route);

        return view('packageroutes.packageroute_create', compact('package', 'package_route'));
    }

    public function destroy(Request $request){
        $package_id = $request->input('hide_package_id');
        $route_id = $request->input('hide_route_id');

        $route = PackageRoutes::find($route_id);
        $route->delete();

        $package = Packages::find($package_id);

        $package_route = PackageRoutes::with('stoppable')
        ->where('travel_package_id', $package_id)
        ->get();

        // dd($package_route);

        return view('packageroutes.packageroute_create', compact('package', 'package_route'));
    }
}//class
