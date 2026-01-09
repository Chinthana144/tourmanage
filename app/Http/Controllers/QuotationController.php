<?php

namespace App\Http\Controllers;

use App\Models\Quotations;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotations::all();

        return view('quotations.quotation_view', compact('quotations'));
    }
}//class
