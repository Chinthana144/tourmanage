@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                {{ $hotel->name }} Rooms
                <button class="btn btn-primary btn-sm float-end" id="btn_add_rooms_modal">Add Rooms</button>
            </h5>
        </div>
        <div class="card-body">
            <table class="table" id="tbl_rooms">
                <tr>
                    <th>Room</th>
                    <th>Description</th>
                    <th>People</th>
                    <th>Size</th>
                    <th>Amenti</th>
                    <th>Perks</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                @foreach ($hotel_rooms as $room)
                    <tr data-id="{{ $room->id }}">
                        <td>
                            {{ $room->roomType->name }} <br>
                            {{ $room->bedType->name }}
                        </td>
                        <td>{{ $room->description }}</td>
                        <td>
                            Adults: {{ $room->max_adults }} <br>
                            Children: {{ $room->max_children }} <br>
                            Guests: {{ $room->max_guests_total }}
                        </td>
                        <td>{{ $room->size_sqft }}</td>
                        <td>
                            @php
                                $amenities = json_decode($room->amenities);
                            @endphp
                            @if ($amenities->air_conditioning)
                                <span class="badge bg-primary">Air Conditioning</span><br>
                            @endif
                            @if ($amenities->wifi)
                                <span class="badge bg-primary">Wifi</span><br>
                            @endif
                            @if ($amenities->tv)
                                <span class="badge bg-primary">TV</span><br>
                            @endif
                            @if ($amenities->mini_fridge)
                                <span class="badge bg-primary">Mini Fridge</span><br>
                            @endif
                            @if ($amenities->mini_bar)
                                <span class="badge bg-primary">Mini Bar</span><br>
                            @endif
                            @if ($amenities->coffee_maker)
                                <span class="badge bg-primary">Coffee Maker</span><br>
                            @endif
                            @if ($amenities->balcony)
                                <span class="badge bg-primary">Balcony</span><br>
                            @endif
                            @if ($amenities->safety_box)
                                <span class="badge bg-primary">Safety Box</span><br>
                            @endif
                            @if ($amenities->hot_water)
                                <span class="badge bg-primary">Hot water</span><br>
                            @endif
                            @if ($amenities->bathtub)
                                <span class="badge bg-primary">Bathtub</span><br>
                            @endif
                            @if ($amenities->shower)
                                <span class="badge bg-primary">Shower</span><br>
                            @endif
                            @if ($amenities->hair_dryer)
                                <span class="badge bg-primary">Hair Dryer</span><br>
                            @endif
                            @if ($amenities->towels)
                                <span class="badge bg-primary">Towels</span><br>
                            @endif
                            @if ($amenities->toiletries)
                                <span class="badge bg-primary">Toilets</span><br>
                            @endif
                        </td>
                        <td>
                            @if ($room->smoking_allowed == 1)
                                <span class="badge bg-primary">Smorking Allowed</span><br>                               
                            @endif
                            @if ($room->has_breakfast == 1)
                                <span class="badge bg-primary">Breakfast</span><br>                                 
                            @endif
                            @if ($room->has_free_cancellation == 1)
                                <span class="badge bg-primary">Free Cancellation</span><br>                                
                            @endif
                            @if ($room->extra_bed_allowed == 1)
                                <span class="badge bg-primary">Extra Bed</span><br>                               
                            @endif
                        </td>
                        <td>
                            Extra Bed: <b>{{ number_format($room->extra_bed_price, 2)}}</b><br>
                            Price per Night: <b>{{ number_format($room->base_price_per_night, 2) }}</b>
                        </td>
                        <td>
                            <button class="btn btn-outline-warning btn_edit_room">Edit</button>
                        </td>
                    </tr>                    
                @endforeach
            </table>
        </div>
    </div>

    @include('hotel_rooms.add_rooms_modal')
    @include('hotel_rooms.edit_room_modal')

    <script src="{{ asset('js/room_view.js') }}"></script>
@endsection
