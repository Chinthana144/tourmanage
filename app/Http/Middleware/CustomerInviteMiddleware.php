<?php

namespace App\Http\Middleware;

use App\Models\Customers;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerInviteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->route('token');

        if (!$token) {
            abort(403, 'Invalid access link');
        }

        $customer = Customers::where('invite_token', $token)->first();

        if (!$customer) {
            abort(403, 'This link is invalid or has expired');
        }

        // Attach customer to request for controller access
        $request->attributes->set('customer', $customer);

        return $next($request);
    }
}
