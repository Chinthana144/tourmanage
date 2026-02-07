@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Restaurants
                <a href="/create-restaurants" class="btn btn-primary btn-sm float-end">Add Restaurant</a>
            </h5>
        </div>
        <div class="card-body">
            @foreach ($restaurants as $restaurant)
                <div class="card mt-2">
                    <div class="card-header">
                        <h5>{{ $restaurant->name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>
                                    Address: <b>{{$restaurant->address}}</b>
                                    <br>
                                    Phone: <b>{{$restaurant->phone}}</b>
                                    <br>
                                    Website: <b>{{$restaurant->website}}</b>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('images/restaurants/' . $restaurant->cover_image) }}" alt="con" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('images/restaurants/' . $restaurant->image1) }}" alt="con" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('images/restaurants/' . $restaurant->image2) }}" alt="con" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <form action="{{ route('restaurant_price.view') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                    <button type="submit" class="btn btn-outline-primary">Restaurant Price</button>
                                </form>
                            </div>
                            <div class="col-md-4 mt-3">
                                <form action="{{ route('restaurants.edit') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="hide_restaurant_id" value="{{ $restaurant->id }}">
                                    <button type="submit" class="btn btn-outline-warning">Edit Restaurant</button>
                                </form>
                            </div>
                            <div class="col-md-4 mt-3">
                                <form action="{{ route('restaurant.remove') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="hide_restaurant_id" value="{{ $restaurant->id }}">
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
