<?php

namespace App\Http\Controllers;

use App\Models\TourRouteItems;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class PaymentController extends Controller
{
    public function show(Request $request)
    {
        $quotation = $request->validatedQuotation;

        $tour_id = $quotation->tour_id;

        $tour_route = TourRouteItems::where('tour_id', $tour_id)
            ->get();

        return view("main.quotation_payment", compact('quotation', 'tour_route'));
    }//show quotation
}
