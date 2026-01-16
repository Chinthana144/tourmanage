<?php

namespace App\Http\Controllers;

use App\Mail\CustomerInviteMail;
use App\Models\Countries;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customers::all();
        $countries = Countries::all();

        return view('customers.customers_view', compact('customers', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => 'required|string|max:20',
            'country_id' => 'required|exists:countries,id',
        ]);

        Customers::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'country_id' => $request->input('country_id'),
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    public function register(Request $request)
    {
        // Customers::create([
        //     'first_name' => $request->input('first_name'),
        //     'last_name' => $request->input('last_name'),
        //     'email' => $request->input('email'),
        //     'phone_number' => $request->input('phone_number'),
        //     'country_id' => $request->input('country_id'),
        // ]);

        Mail::to($request->input('email'))->send(
            new CustomerInviteMail()
        );

        return redirect()->route('main.show_customer_register')->with('success', 'Email sent successfully, please check your Email!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $customer_id = $request->input('hide_customer_id');
        $customer = Customers::find($customer_id);

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->phone_number = $request->input('phone_number');
        $customer->country_id = $request->input('country_id');
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //ajax
    public function getOneCustomer(Request $request)
    {
        $customer_id = $request->input('customer_id');

        $customer = Customers::find($customer_id);

        return response()->json($customer);
    }
}
