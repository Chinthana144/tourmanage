<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Tours;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tours::all();
        $currencies = Currency::all();

        return view('tours.tour_view', compact('tours', 'currencies'));
    }//index

    public function store(Request $request) 
    {   
        Tours::create([
            'title' => $request->input('txt_title'),
            'description' => $request->input('txt_description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'total_days' => $request->input('num_days'),
            'total_nights' => $request->input('num_nights'),
            'adults' => $request->input('num_adults'),
            'children' => $request->input('num_children'),
            'currency_id' => $request->input('cmb_currencies'),
            'sub_total' => 0,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'grand_total' => 0,
            'status' => 1,
            'note' => $request->input('txt_notes'),
        ]);

        return redirect()->route('tours.index');
    }//store
}//class
