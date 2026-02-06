@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                {{ $location->name}} Prices
                <button class="btn btn-primary btn-sm float-end" id="add_location_price">Add Price</button>
            </h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <table class="table" id="tbl_location_prices">
                    <tr>
                        <th>Season</th>
                        <th>Package</th>
                        <th>Mode</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($location_prices as $price)
                        <tr>
                            <td>{{ $price->season->name }}</td>
                            <td>{{ $price->package->name }}</td>
                            <td>{{ $price->priceMode->name }}</td>
                            <td>{{ $price->description }}</td>
                            <td>
                                @if ($price->status == 1)
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

                <div>
                    {{ $location_prices->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('locations.add_location_price_modal')
    @include('locations.edit_location_price_modal')

    <script src="{{ asset('js/location_price.js') }}"></script>
@endsection
