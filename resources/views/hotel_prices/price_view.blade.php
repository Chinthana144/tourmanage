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
            <table class="table">
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
                    <tr>
                        <td>{{ $room->roomType->name }}</td>
                        <td>{{ $room->bedType->name }}</td>
                        <td>{{ $room->season_name }}</td>
                        <td>{{ $room->season_start_date }}</td>
                        <td>{{ $room->season_end_date }}</td>
                        <td>{{ $room->price_per_night }}</td>
                        <td>
                            <!-- Actions like Edit/Delete can be added here -->
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('hotel_prices.add_price_modal')

    <script src="{{ asset('js/price_view.js') }}"></script>
@endsection
