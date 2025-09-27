<?php

namespace App\Http\Controllers;

use App\Models\PackageRoutes;
use Illuminate\Http\Request;

class PackageRouteController extends Controller
{
    public function store(Request $request){
        $package_id = $request->input('hide_package_id');
        $day_no = $request->input('cmb_days');
        $stoppable_type = $request->input('cmb_stoppable_type');
        $stoppable_id = $request->input('cmb_stoppable');
        $stay_duration = $request->input('stay_duration');

        $order_no = PackageRoutes::where('travel_package_id', $package_id)->count();

        
    }
}//class
