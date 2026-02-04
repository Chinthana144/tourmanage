<?php

namespace App\Http\Controllers;

use App\Models\TourRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pending_requests = TourRequest::where('status', 1)->get();

        return view('dashboard', compact('pending_requests'));
    }//index
}//class
