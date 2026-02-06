@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Hotel Prices
                <button class="btn btn-primary btn-sm float-end" id="btn_add_hotel_price">Add Prices</button>
            </h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <table class="table" id="tbl_hotel_prices">
                    <tr>
                        <th>Season</th>
                        <th>Package</th>
                        <th>Price Mode</th>
                        <th>Boarding Type</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($hotel_prices as $price)
                        <tr>
                            <td>{{ $price->season->name }}</td>
                            <td>{{ $price->package->name }}</td>
                            <td>{{ $price->priceMode->name }}</td>
                            <td>{{ $price->boardingType->name }}</td>
                            <td>{{ $price->description }}</td>
                            <td>
                                @if ($price->status == 1)
                                    <span class="badge bg-primary">Compulsory</span>
                                @else
                                    <span class="badge bg-secondary">Optional</span>
                                @endif
                            </td>
                            <td>{{ $price->price }}</td>
                            <th>
                                <button class="btn btn-outline-warning btn-sm btn_edit_price" data-id="{{$price->id}}"><i class="bx bx-edit"></i></button>
                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @include('hotels.add_hotel_price_modal')
    @include('hotels.edit_hotel_price_modal')

    <script src="{{ asset('js/hotel_price.js') }}"></script>
@endsection
