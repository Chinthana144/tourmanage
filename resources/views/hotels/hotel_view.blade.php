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
                <div class="card mt-2">
                    <div class="card-header">
                        <h5>{{ $hotel->name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <p>
                                    <strong>Address: </strong>{{ $hotel->address }} <br>
                                    <strong>Phone: </strong>{{ $hotel->phone }} <br>

                                </p>
                            </div>

                            <div class="col-md-3">
                                <p>
                                    <strong>Email: </strong>{{ $hotel->email }} <br>
                                    <strong>Website: </strong>{{ $hotel->website }} <br>
                                    <strong>Star Rating: </strong>{{ $hotel->star_rating }}
                                </p>
                            </div>

                            <div class="col-md-3">
                                <label for="">Populatiry</label>
                                <div class="div_populatiry">
                                    <i class="icon_star star_one {{$hotel->star_rating >= 1 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="1"></i>
                                    <i class="icon_star star_two {{$hotel->star_rating >= 2 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="2"></i>
                                    <i class="icon_star star_three {{$hotel->star_rating >= 3 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="3"></i>
                                    <i class="icon_star star_four {{$hotel->star_rating >= 4 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="4"></i>
                                    <i class="icon_star star_five {{$hotel->star_rating >= 5 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="5"></i>
                                    <input type="hidden" name="star_rating" id="star_rating" value="{{$hotel->star_rating}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="">Populatiry</label>
                                <div class="div_populatiry">
                                    <i class="icon_star star_one {{$hotel->popularity >= 1 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="1"></i>
                                    <i class="icon_star star_two {{$hotel->popularity >= 2 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="2"></i>
                                    <i class="icon_star star_three {{$hotel->popularity >= 3 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="3"></i>
                                    <i class="icon_star star_four {{$hotel->popularity >= 4 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="4"></i>
                                    <i class="icon_star star_five {{$hotel->popularity >= 5 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="5"></i>
                                    <input type="hidden" name="popularity" id="popularity" value="{{$hotel->popularity}}">
                                </div>
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

                        <div class="row mt-2">
                            <div class="col-md-2">
                                <form action="{{ route('hotels.edit') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="hide_hotel_id" value="{{ $hotel->id }}">
                                    <button type="submit" class="btn btn-outline-warning">Edit Hotel</button>
                                </form>
                            </div>

                            <div class="col-md-2">
                                <form action="{{ route('hotel.remove') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="hide_hotel_id" value="{{ $hotel->id }}">
                                    <button type="submit" class="btn btn-outline-danger">Remove</button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
