<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Tours;
use Carbon\Carbon;
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
        $year = Carbon::now()->year;

        $last_tour = Tours::where("tour_number", 'LIKE', '-%')
            ->orderBy('tour_number', 'desc')
            ->first();

        $nextNumber = 1;

        if($last_tour){
            //extract number
            $lastNumber = intval(substr($last_tour->tour_number, 5));
            $nextNumber = $lastNumber + 1;
        }//has tour
        else{
            $nextNumber = 1;
        }

        $tour_number = $year . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        Tours::create([
            'tour_number' => $tour_number,
            'tour_request_id' => $request->input('tour_request_id'),
            'title' => $request->input('txt_title'),
            'description' => $request->input('txt_description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'total_days' => $request->input('num_days'),
            'total_nights' => $request->input('num_nights'),
            'adults' => $request->input('num_adults'),
            'children' => $request->input('num_children') ?? 0,
            'infants' => $request->input('num_infants') ?? 0,
            'rooms_per_hotel' => $request->input('rooms_per_hotel'),
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
        $tour->infants = $request->input('edit_num_infants');
        $tour->rooms_per_hotel = $request->input('edit_rooms_per_hotel');
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
