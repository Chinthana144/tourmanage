<?php

namespace App\Http\Controllers;

use App\Models\Quotations;
use App\Models\Tours;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotations::all();

        return view('quotations.quotation_view', compact('quotations'));
    }

    public function store(Request $request)
    {
        $year = Carbon::now()->year;

        $last_quotation = Quotations::where("quotation_no", 'LIKE', '-%')
            ->orderBy('quotation_no', 'desc')
            ->first();

        $nextNumber = 1;

        if($last_quotation){
            //extract number
            $lastNumber = intval(substr($last_quotation->quotation_no, 5));
            $nextNumber = $lastNumber + 1;
        }//has tour
        else{
            $nextNumber = 1;
        }

        $quotation_no = $year . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }

    public function generatePdf(Request $request)
    {
        $quotation_id = $request->input('hide_quotation_id');
        $quotation = Quotations::find($quotation_id);

        $tour_request_id = $quotation->tour_request_id;
        $tour_id = $quotation->tour_id;

        $pdf = Pdf::loadView('pdf.quotation_1', compact('quotation'));

        return $pdf->stream('Quotation-' . $quotation->quotation_no);
    }//generate pdf
}//class
