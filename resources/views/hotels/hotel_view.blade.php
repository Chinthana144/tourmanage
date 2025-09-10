@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Hotels
                <a href="{{ route('hotels.create') }}" class="btn btn-primary btn-sm float-end">Create Hotel</a>
            </h5>
        </div>
        <div class="card-body">
            @foreach ($facility_data as $fd)
                <div class="card mt-2">
                    <div class="card-header">
                        <h5>{{ $fd['hotel']->name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <p>
                                    <strong>Province: </strong>{{ $fd['hotel']->province->name_en }} <br>
                                    <strong>District: </strong>{{ $fd['hotel']->district->name_en }} <br>
                                    <strong>City: </strong>{{ $fd['hotel']->city->name_en }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p>
                                    <strong>Address: </strong>{{ $fd['hotel']->address }} <br>
                                    <strong>Phone: </strong>{{ $fd['hotel']->phone }} <br>
                                    <strong>Email: </strong>{{ $fd['hotel']->email }}
                                </p>
                            </div>

                                <div class="col-md-3">
                                <p>
                                    <strong>Website: </strong>{{ $fd['hotel']->website }} <br>
                                    <strong>Star Rating: </strong>{{ $fd['hotel']->star_rating }}
                                </p>
                            </div>

                            <div class="col-md-3">
                                <p>
                                    <strong>Latitude: </strong>{{ $fd['hotel']->latitude }} <br>
                                    <strong>Longitude: </strong>{{ $fd['hotel']->longitude }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('images/hotels/' . $fd['hotel']->cover_image) }}" alt="" srcset="" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>

                            <div class="col-md-4">
                                <img src="{{ asset('images/hotels/' . $fd['hotel']->image1) }}" alt="" srcset="" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>

                            <div class="col-md-4">
                                <img src="{{ asset('images/hotels/' . $fd['hotel']->image2) }}" alt="" srcset="" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>
                        </div>

                        <div>
                            <p>
                                <strong>Facilities: </strong>
                                @foreach ($fd['facilities'] as $flt)
                                    {{ $flt->name . ' | ' }}
                                @endforeach
                            </p>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <form action="{{ route('hotels.edit') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="hide_hotel_id" value="{{ $fd['hotel']->id }}">
                                    <button type="submit" class="btn btn-success">Edit Hotel</button>
                                </form>
                            </div>

                            <div class="col-md-4">
                                <form action="{{ route('facilities.edit') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="hide_hotel_id" value="{{ $fd['hotel']->id }}">
                                    <button type="submit" class="btn btn-warning">Facilities</button>
                                </form>
                            </div>

                            <div class="col-md-4">
                                <form action="{{ route('hotel.remove') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="hide_hotel_id" value="{{ $fd['hotel']->id }}">
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
