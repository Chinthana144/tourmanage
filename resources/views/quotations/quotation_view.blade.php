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
                    <th>Package Prices</th>
                    <th>Action</th>
                </tr> 
                @foreach ($quotations as $quotation)
                    <tr>
                        <td>{{ $quotation->quotation_no }}</td>
                        <td>
                            {{ $quotation->tourRequest->customer_name }}
                            <br>
                            {{ $quotation->tourRequest->customer_email }}
                        </td>
                        <td>{{ $quotation->valid_until }}</td>
                        {{-- <td>
                            @php
                                $prices = json_decode($quotation->package_prices);
                            @endphp
                            @foreach ($prices as $price)
                                {{ $price->component_type .": ". $price->amount }} <br>
                            @endforeach
                        </td> --}}
                        <td>
                            <form action="{{ route('quotation.generate') }}" method="post">
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
