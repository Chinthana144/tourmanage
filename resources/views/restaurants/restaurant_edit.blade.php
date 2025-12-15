@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Update Restaurant</h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <form action="{{ route('restaurants.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="hide_restaurant_id" id="hide_restaurant_id" value="{{ $restaurant->id }}">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="cmb_province" id="cmb_province" class="form-select">
                                <option value="">Select Province</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}" @selected($province->id == $restaurant->province_id)>{{ $province->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="cmb_district" id="cmb_district" class="form-select">
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" @selected($district->id == $restaurant->district_id)>{{ $district->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="cmb_city" id="cmb_city" class="form-select">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" @selected($city->id == $restaurant->city_id)>{{ $city->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="txt_restaurant_name" id="txt_restaurant_name" class="form-control" placeholder="Restaurant name" value="{{$restaurant->name}}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Address</label>
                            <input type="text" name="txt_restaurant_address" id="txt_restaurant_address" class="form-control" placeholder="Address" value="{{$restaurant->address}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="txt_restaurant_phone" id="txt_restaurant_phone" class="form-control" placeholder="phone" value="{{$restaurant->phone}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Website</label>
                            <input type="text" name="txt_restaurant_website" id="txt_restaurant_website" class="form-control" placeholder="restaurant_name.com" value="{{$restaurant->website}}">
                        </div>

                        {{-- Latitude & longitude --}}
                        <div class="col-md-6 mb-3">
                            <label for="">Latitude</label>
                            <input type="text" name="txt_restaurant_latitude" id="txt_restaurant_latitude" class="form-control" placeholder="latitude" value="{{$restaurant->latitude}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Longitude</label>
                            <input type="text" name="txt_restaurant_longitude" id="txt_restaurant_longitude" class="form-control" placeholder="longitude" value="{{$restaurant->longitude}}">
                        </div>

                        {{-- opening & closing time --}}
                        <div class="col-md-6 mb-3">
                            <label for="">Opening time</label>
                            <input type="time" name="txt_opening_time" id="txt_opening_time" class="form-control" placeholder="Open time" value="{{$restaurant->opening_time}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Closing time</label>
                            <input type="time" name="txt_closing_time" id="txt_closing_time" class="form-control" placeholder="Close time" value="{{$restaurant->closing_time}}">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="">Cover Image</label>
                            <input type="file" name="cover_image" id="cover_image" class="form-control" accept=".jpg,.jpeg,.png">
                            <span id="cover_image_error" class="text-danger">Image size must be less than 5MB</span>
                            <img src="{{ asset('images/restaurants/' . $restaurant->cover_image) }}" alt="cover_image" id="cover_image_preview" class="img-fluid mt-2">
                        </div>
                        <div class="col-md-4">
                            <label for="">Image 1</label>
                            <input type="file" name="image_1" id="image_1" class="form-control" accept=".jpg,.jpeg,.png">
                            <span id="image_1_error" class="text-danger">Image size must be less than 5MB</span>
                            <img src="{{ asset('images/restaurants/' . $restaurant->image1) }}" alt="image_1" id="image_1_preview" class="img-fluid mt-2">
                        </div>
                        <div class="col-md-4">
                            <label for="">Image 2</label>
                            <input type="file" name="image_2" id="image_2" class="form-control" accept=".jpg,.jpeg,.png">
                            <span id="image_2_error" class="text-danger">Image size must be less than 5MB</span>
                            <img src="{{ asset('images/restaurants/' . $restaurant->image2) }}" alt="image_2" id="image_2_preview" class="img-fluid mt-2">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update Restaurant</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/restaurant_create.js') }}"></script>
@endsection
