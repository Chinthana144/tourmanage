@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Update Hotel: {{ $hotel->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('hotels.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="hide_hotel_id" value = "{{ $hotel->id }}">
                <div class="row">
                    <div class="col-md-4">
                        <select name="cmb_province" id="cmb_province" class="form-select">
                            <option value="">Select Province</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}" @selected($province->id == $hotel->province_id)>{{ $province->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="cmb_district" id="cmb_district" class="form-select">
                            <option value="">Select District</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}" @selected($district->id == $hotel->district_id)>{{ $district->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="cmb_city" id="cmb_city" class="form-select">
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" @selected($city->id == $hotel->city_id)>{{ $city->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" name="txt_hotel_name" id="txt_hotel_name" value="{{ $hotel->name }}" class="form-control" placeholder="Hotel Name" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Address</label>
                        <input type="text" name="txt_hotel_address" id="txt_hotel_address" value="{{ $hotel->address }}" class="form-control" placeholder="Hotel Address" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Phone</label>
                        <input type="text" name="txt_hotel_phone" id="txt_hotel_phone" value="{{ $hotel->phone }}" class="form-control" placeholder="Hotel Phone" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="text" name="txt_hotel_email" id="txt_hotel_email" value="{{ $hotel->email }}" class="form-control" placeholder="Hotel Email" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Website</label>
                        <input type="text" name="txt_hotel_website" id="txt_hotel_website" value="{{ $hotel->website }}" class="form-control" placeholder="Hotel Website" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Rating</label>
                        <input type="text" name="txt_hotel_rating" id="txt_hotel_rating" value="{{ $hotel->star_rating }}" class="form-control" placeholder="Hotel Rating">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Latitude</label>
                        <input type="text" name="txt_hotel_latitude" id="txt_hotel_latitude" class="form-control" value="{{ $hotel->latitude }}" placeholder="Hotel Latitude">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Longitude</label>
                        <input type="text" name="txt_hotel_longitude" id="txt_hotel_longitude" class="form-control" value="{{ $hotel->longitude }}" placeholder="Hotel Longitude">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="">Cover Image</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control" accept=".jpg,.jpeg,.png">
                        <span id="cover_image_error" class="text-danger">Image size must be less than 5MB</span>
                        <img src="{{ asset('images/hotels/' . $hotel->cover_image) }}" alt="cover_image" id="cover_image_preview" class="img-fluid mt-2">
                    </div>
                    <div class="col-md-4">
                        <label for="">Image 1</label>
                        <input type="file" name="image_1" id="image_1" class="form-control" accept=".jpg,.jpeg,.png">
                        <span id="image_1_error" class="text-danger">Image size must be less than 5MB</span>
                        <img src="{{ asset('images/hotels/' . $hotel->image1) }}" alt="image_1" id="image_1_preview" class="img-fluid mt-2">
                    </div>
                    <div class="col-md-4">
                        <label for="">Image 2</label>
                        <input type="file" name="image_2" id="image_2" class="form-control" accept=".jpg,.jpeg,.png">
                        <span id="image_2_error" class="text-danger">Image size must be less than 5MB</span>
                        <img src="{{ asset('images/hotels/' . $hotel->image2) }}" alt="image_2" id="image_2_preview" class="img-fluid mt-2">
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary mt-3">Update Hotel</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/hotel_create.js') }}"></script>
@endsection
