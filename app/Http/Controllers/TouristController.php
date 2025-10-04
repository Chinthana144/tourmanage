<?php

namespace App\Http\Controllers;

use App\Models\Tourists;
use Illuminate\Http\Request;

class TouristController extends Controller
{
    public function index()
    {
        $tourists = Tourists::paginate(10);

        return view('tourists.tourists_view', compact('tourists'));
    }
}//class
