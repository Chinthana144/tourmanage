<?php

namespace App\Http\Controllers;

use App\Models\QuotationItems;
use App\Models\Quotations;
use App\Models\TourPackageItems;
use App\Models\Tours;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotations::all();

        return view('quotations.quotation_view', compact('quotations'));
    }

    public function store(Request $request)
    {
        $quotation_no = generateQuotationNo();

        $tour_id = $request->input('tour_id');
        $tour = Tours::find($tour_id);
        $tour_request_id = $tour->tour_request_id;

        $user_id = Auth::user()->id;

        //create quotatuion
        $quotation = Quotations::create([
            'quotation_no' => $quotation_no,
            'tour_request_id' => $tour_request_id,
            'tour_id' => $tour_id,
            'valid_until' => $request->input('valid_date'),
            'package_prices' => null,
            'status' => 1,
            'user_id' => $user_id,
        ]);

        // add quotation Items
        $essential_prices = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 1)
            ->select(
                'component_type', 
                DB::raw('SUM(price) AS total_price'),
                DB::raw('COUNT(*) AS total_count'),
            )
            ->groupBy('component_type')
            ->get();
        foreach($essential_prices as $price){
            createQuotationItems($quotation->id, 1, $price->component_type, $price->total_price);
        }//foreach


        $classic_prices = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 2)
            ->select(
                'component_type', 
                DB::raw('SUM(price) AS total_price'),
                DB::raw('COUNT(*) AS total_count'),
            )
            ->groupBy('component_type')
            ->get();
        foreach($classic_prices as $price){
            createQuotationItems($quotation->id, 2, $price->component_type, $price->total_price);
        }//foreach

        $signature_prices = TourPackageItems::where('tour_id', $tour_id)
            ->where('package_id', 3)
            ->select(
                'component_type', 
                DB::raw('SUM(price) AS total_price'),
                DB::raw('COUNT(*) AS total_count'),
            )
            ->groupBy('component_type')
            ->get();
        foreach($signature_prices as $price){
            createQuotationItems($quotation->id, 2, $price->component_type, $price->total_price);
        }//foreach

        $package_prices = [
            'essential_prices' => $essential_prices,
            'classic_prices' => $classic_prices,
            'signature_prices' => $signature_prices,
        ];

        $quotation->package_prices = json_encode($package_prices);
        $quotation->save();

        return redirect()->route('quotation.generate', ['hide_quotation_id' => $quotation->id ]);
    }

    public function generatePdf(Request $request)
    {
        $quotation_id = $request->input('hide_quotation_id');
        $quotation = Quotations::find($quotation_id);

        // $tour_request_id = $quotation->tour_request_id;
        $tour_id = $quotation->tour_id;

        // change tour status
        $tour = Tours::find($tour_id);
        if($tour->status < 2){
            $tour->status = 2;
            $tour->save();
        }

        //generate QR code
        $payment_url = url('https://akagiexp.com/payment-demo/' . $quotation->id);

        //generate qr code
        $qr_code = base64_encode(
            QrCode::size(100)
                ->generate($payment_url)
        );

        $pdf = Pdf::loadView('pdf.quotation_1', compact('quotation', 'qr_code'));

        return $pdf->stream('Quotation-' . $quotation->quotation_no);
    }//generate pdf
}//class

function generateQuotationNo()
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

    return $quotation_no;
}

function createQuotationItems($quotation_id, $package_id, $component_type, $amount){
    $quotation_item = QuotationItems::created([
        'quotation_id' => $quotation_id,
        'tour_package_id' => $package_id,
        'item_type' => $component_type,
        'amount' => $amount,
    ]);

    return $quotation_item;
}
