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
                    <th>Valid Date</th>
                    <th>Essential</th>
                    <th>Classic</th>
                    <th>Signature</th>
                    <th>User</th>
                    <th>Action</th>
                </tr> 
                @foreach ($quotations as $quotation)
                    <tr>
                        @php
                            $prices = json_decode($quotation->package_prices);
                        @endphp
                        <td>{{ $quotation->quotation_no }}</td>
                        <td>
                            {{ $quotation->tourRequest->customer_name }}
                            <br>
                            {{ $quotation->tourRequest->customer_email }}
                        </td>
                        <td>{{ $quotation->valid_until }}</td>
                        <td>
                            @foreach ($prices->essential_prices as $price)
                                {{ Str::substr($price->component_type, 11) .": ". $price->total_price }} <br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($prices->classic_prices as $price)
                                {{ Str::substr($price->component_type, 11)  .": ". $price->total_price }} <br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($prices->signature_prices as $price)
                                {{ Str::substr($price->component_type, 11)  .": ". $price->total_price }} <br>
                            @endforeach
                        </td>
                        <td>{{ $quotation->user->first_name ." ". $quotation->user->last_name }}</td>
                        <td>
                            <form action="{{ route('quotation.generate') }}" method="get">
                                @csrf
                                <input type="hidden" name="hide_quotation_id" value="{{ $quotation->id }}">
                                <button class="btn btn-outline-danger btn-sm w-100">Generate PDF</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
