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
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Travel Countries</label>
                            <select name="cmb_travel_country" id="cmb_travel_country" class="form-control">
                                @foreach ($travel_countries as $travel_country)
                                    <option value="{{ $travel_country->id }}">{{ $travel_country->name }}</option>
                                @endforeach
                            </select>
                        </div>
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
                            <input type="text" name="txt_hotel_website" id="txt_hotel_website" value="{{ $hotel->website }}" class="form-control" placeholder="Hotel Website">
                        </div>

                        <div class="col-md-6">
                            <label for="">Star Rating</label>
                            <div class="div_start_rating">
                                <i class="bx bx-star icon_star star_rate_one {{$hotel->star_rating >= 1 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="1"></i>
                                <i class="bx bx-star icon_star star_rate_two {{$hotel->star_rating >= 2 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="2"></i>
                                <i class="bx bx-star icon_star star_rate_three {{$hotel->star_rating >= 3 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="3"></i>
                                <i class="bx bx-star icon_star star_rate_four {{$hotel->star_rating >= 4 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="4"></i>
                                <i class="bx bx-star icon_star star_rate_five {{$hotel->star_rating >= 5 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="5"></i>
                                <input type="hidden" name="star_rating" id="star_rating" value="{{ $hotel->star_rating }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="">Popularity</label>
                            <div class="div_populatiry">
                                <i class="bx bx-star icon_star star_one {{$hotel->popularity >= 1 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="1"></i>
                                <i class="bx bx-star icon_star star_two {{$hotel->popularity >= 2 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="2"></i>
                                <i class="bx bx-star icon_star star_three {{$hotel->popularity >= 3 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="3"></i>
                                <i class="bx bx-star icon_star star_four {{$hotel->popularity >= 4 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="4"></i>
                                <i class="bx bx-star icon_star star_five {{$hotel->popularity >= 5 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="5"></i>
                                <input type="hidden" name="popularity" id="popularity" value="{{$hotel->popularity}}">
                            </div>
                        </div>

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

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-end mt-3">Update Hotel</button>
                        </div>
                    </div>
                </div>



            </form>
        </div>
    </div>

    <script src="{{ asset('js/hotel_create.js') }}"></script>
    <script src="{{ asset('js/common_script.js') }}"></script>
@endsection
