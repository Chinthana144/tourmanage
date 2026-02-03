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
                    <th>Country</th>
                    <th>Vehicle</th>
                    <th>Vehicle No</th>
                    <th>Max Passengers</th>
                    <th>Price per Km</th>
                    <th>Populatiry</th>
                    <th>Action</th>
                    <th>Remove</th>
                </tr>
                @foreach ($travel_medias as $travel_media)
                    <tr data-id="{{ $travel_media->id }}">
                        <td>{{ $travel_media->travelCountry->name }}</td>
                        <td>{{ $travel_media->name }}</td>
                        <td>{{ $travel_media->vehicle_No }}</td>
                        <td>{{ $travel_media->max_passengers }}</td>
                        <td>{{ $travel_media->price_per_km }}</td>
                        <td>
                            <div class="div_populatiry">
                                <i class="bx bx-star star_one {{$travel_media->popularity >= 1 ? 'bx bxs-star':'bx bx-star' }}" data-value="1"></i>
                                <i class="bx bx-star star_two {{$travel_media->popularity >= 2 ? 'bx bxs-star':'bx bx-star' }}" data-value="2"></i>
                                <i class="bx bx-star star_three {{$travel_media->popularity >= 3? 'bx bxs-star':'bx bx-star' }}" data-value="3"></i>
                                <i class="bx bx-star star_four {{$travel_media->popularity >= 4 ? 'bx bxs-star':'bx bx-star' }}" data-value="4"></i>
                                <i class="bx bx-star star_five {{$travel_media->popularity >= 5 ? 'bx bxs-star':'bx bx-star' }}" data-value="5"></i>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-warning btn_edit_travel_media">Edit</button>
                        </td>
                        <td>
                            <form action="{{ route('travel_media.remove') }}" method="post">
                                @csrf
                                <input type="hidden" name="hide_travel_id" value="{{ $travel_media->id }}">
                                <button type="submit" class="btn btn-outline-danger btn-sm">Remove</button>
                            </form>
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
