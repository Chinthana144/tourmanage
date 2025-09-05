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
            @foreach ($hotels as $hotel)
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $hotel->name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <p>
                                    <strong>Province: </strong>{{ $hotel->province->name_en }} <br>
                                    <strong>District: </strong>{{ $hotel->district->name_en }} <br>
                                    <strong>City: </strong>{{ $hotel->city->name_en }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p>
                                    <strong>Address: </strong>{{ $hotel->address }} <br>
                                    <strong>Phone: </strong>{{ $hotel->phone }} <br>
                                    <strong>Email: </strong>{{ $hotel->email }}
                                </p>
                            </div>

                            <div class="col-md-3">
                                <p>
                                    <strong>Website: </strong>{{ $hotel->website }} <br>
                                    <strong>Star Rating: </strong>{{ $hotel->star_rating }}
                                </p>
                            </div>

                            <div class="col-md-3">
                                <p>
                                    <strong>Latitude: </strong>{{ $hotel->latitude }} <br>
                                    <strong>Longitude: </strong>{{ $hotel->longitude }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('images/hotels/' . $hotel->cover_image) }}" alt="" srcset="" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>

                            <div class="col-md-4">
                                <img src="{{ asset('images/hotels/' . $hotel->image1) }}" alt="" srcset="" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>

                            <div class="col-md-4">
                                <img src="{{ asset('images/hotels/' . $hotel->image2) }}" alt="" srcset="" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="hide_hotel_id" value="{{ $hotel->id }}">
                                    <button type="submit" class="btn btn-outline-warning">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
