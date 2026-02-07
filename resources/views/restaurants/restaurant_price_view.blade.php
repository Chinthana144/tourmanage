@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Restaurant Prices
                <button class="btn btn-primary btn-sm float-end" id="btn_add_restaurant_price">Add Restaurant Price</button>
            </h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                table here ...
            </div>
        </div>
    </div>

    @include('restaurants.add_restaurant_price_modal')

    <script src="{{ asset('js/restaurant_price.js') }}"></script>
@endsection
