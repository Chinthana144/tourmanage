@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Travel Media
                <button class="btn btn-primary btn-sm float-end" id="btn_add_travel_media">Add Travel Media</button>
            </h5>
        </div>
        <div class="card-body">
            <table class="table" id="tbl_travel_medias">
                <tr>
                    <th>Vehicle</th>
                    <th>Vehicle No</th>
                    <th>Max Passengers</th>
                    <th>Price per Km</th>
                    <th>Action</th>
                </tr>
                @foreach ($travel_medias as $travel_media)
                    <tr data-id="{{ $travel_media->id }}">
                        <td>{{ $travel_media->name }}</td>
                        <td>{{ $travel_media->vehicle_No }}</td>
                        <td>{{ $travel_media->max_passengers }}</td>
                        <td>{{ $travel_media->price_per_km }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning btn_edit_travel_media">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('travel_media.add_travel_modal')
    @include('travel_media.edit_travel_modal')

    <script src="{{ asset('js/travel_view.js') }}"></script>
@endsection
