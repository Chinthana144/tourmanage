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
            'tour_request_id' => $request->input('tour_request_id'),
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

    public function update(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $tour = Tours::find($tour_id);

        $tour->title = $request->input('txt_edit_title');
        $tour->description = $request->input('txt_edit_description');
        $tour->start_date = $request->input('edit_start_date');
        $tour->end_date = $request->input('edit_end_date');
        $tour->total_days = $request->input('edit_num_days');
        $tour->total_nights = $request->input('edit_num_nights');
        $tour->adults = $request->input('edit_num_adults');
        $tour->children = $request->input('edit_num_children');
        $tour->currency_id = $request->input('edit_cmb_currencies');
        $tour->note = $request->input('txt_edit_notes');

        $tour->save();

        return redirect()->route('tours.index');
    }//

    //AJAX methods
    public function getOneTour(Request $request)
    {
        $tour_id = $request->input('tour_id');

        $tour = Tours::find($tour_id);

        return response()->json($tour);
    }//getOneTour
}//class
