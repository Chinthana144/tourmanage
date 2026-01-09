@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Quotations</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Quotation No</th>
                    <th>Customer</th>
                    <th>Package Prices</th>
                    <th>Action</th>
                </tr> 
                @foreach ($quotations as $quotation)
                    <tr>
                        <td>{{ $quotation->quotation_no }}</td>
                        <td>{{ $quotation->tourRequest->customer->first_name . " " . $quotation->tourRequest->customer->last_name }}</td>
                        <td>
                            @php
                                $prices = json_decode($quotation->package_prices);
                            @endphp
                            @foreach ($prices as $price)
                                {{ $price->name .": ". $price->amount }} <br>
                            @endforeach
                        </td>
                        <td>
                            <button>PDF</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
