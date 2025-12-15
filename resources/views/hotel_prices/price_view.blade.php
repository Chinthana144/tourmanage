@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                {{$hotel->name}} Prices
                <button class="btn btn-primary btn-sm float-end" id="btn_add_price">Add Price</button>
            </h5>
        </div>
        <div class="card-body">
            <table class="table" id="tbl_prices">
                <tr>
                    <th>Room Type</th>
                    <th>Bed Type</th>
                    <th>Season</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Price per night</th>
                    <th>Action</th>
                </tr>
                @foreach ($hotel_rooms_with_price as $room)
                    <tr data-id="{{ $room->id}}">
                        <td>{{ $room->hotelRoom->roomType->name }}</td>
                        <td>{{ $room->hotelRoom->bedType->name }}</td>
                        <td>{{ $room->season_name }}</td>
                        <td>{{ $room->season_start_date }}</td>
                        <td>{{ $room->season_end_date }}</td>
                        <td>{{ $room->price_per_night }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm btn_edit_price">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('hotel_prices.add_price_modal')
    @include('hotel_prices.edit_price_modal')

    <script src="{{ asset('js/price_view.js') }}"></script>
@endsection
