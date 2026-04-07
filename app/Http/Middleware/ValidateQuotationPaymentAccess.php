<?php

namespace App\Http\Middleware;

use App\Models\Quotations;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateQuotationPaymentAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $quotation_no = $request->route('quotation_no');
        $token = $request->query('token');

        $quotation = Quotations::where('quotation_no', $quotation_no)
            ->where('payment_token', $token)
            ->where('payment_token_expite_at', '>', now())
            ->first();

        if(!$quotation){
            abort(403, 'Unauthorized or expired payment link.');
        }

        // Attach quotation to request for controller use
        $request->merge(['validatedQuotation' => $quotation]);

        return $next($request);
    }
}
