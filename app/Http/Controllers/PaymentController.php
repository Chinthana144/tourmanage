<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Svg\Tag\Rect;

class PaymentController extends Controller
{
    public function show(Request $request)
    {
        $quotation = $request->validatedQuotation;

        
    }//show quotation
}
