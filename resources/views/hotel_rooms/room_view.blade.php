@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Hotel Rooms {{ $hotel->name }}
                <button class="btn btn-primary btn-sm float-end" id="btn_add_rooms_modal">Add Rooms</button>
            </h5>
        </div>
        <div class="card-body">
            <p>content</p>
        </div>
    </div>

    @include('hotel_rooms.add_rooms_modal')

    <script src="{{ asset('js/room_view.js') }}"></script>
@endsection
