@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                {{$travel_media->name}} Prices
                <button class="btn btn-primary btn-sm float-end" id="btn_add_price">Add Price</button>
            </h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <table class="table" id="tbl_travel_prices">
                    <tr>
                        <th>Season</th>
                        <th>Package</th>
                        <th>Mode</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($travel_prices as $price)
                        <tr>
                            <td>{{ $price->season->name }}</td>
                            <td>{{ $price->package->name }}</td>
                            <td>{{ $price->priceMode->name }}</td>
                            <td>{{ $price->description }}</td>
                            <td>
                                @if ($price->is_complusory == 1)
                                    <span class="badge bg-primary">Compulsory</span>
                                @else
                                    <span class="badge bg-secondary">Optional</span>
                                @endif
                            </td>
                            <td>{{ $price->price }}</td>
                            <td>
                                <button class="btn btn-outline-warning btn-sm btn_edit_price" data-id="{{ $price->id }}"><i class="bx bx-edit"></i></button>
                            </td>
                        </tr>                        
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @include('travel_media.add_travel_price_modal')

    <script src="{{ asset('js/travel_price.js') }}"></script>
@endsection
