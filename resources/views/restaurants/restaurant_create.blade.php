@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Add Restaurant</h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container container-md">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Select Country</label>
                                <select name="cmb_travel_country" id="cmb_travel_country" class="form-select mb-2">
                                    @foreach ($travel_countries as $travel_country)
                                        <option value="{{ $travel_country->id }}">{{ $travel_country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input type="text" name="txt_restaurant_name" id="txt_restaurant_name" class="form-control" placeholder="Restaurant name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Address</label>
                                <input type="text" name="txt_restaurant_address" id="txt_restaurant_address" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone</label>
                                <input type="text" name="txt_restaurant_phone" id="txt_restaurant_phone" class="form-control" placeholder="+9412345678">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Website</label>
                                <input type="text" name="txt_restaurant_website" id="txt_restaurant_website" class="form-control" placeholder="restaurantname.com">
                            </div>
                            <div class="col-md-6">
                                <label for="">Populatiry</label>
                                <div class="div_populatiry">
                                    <i class="bx bx-star icon_star star_one" data-value="1"></i>
                                    <i class="bx bx-star icon_star star_two" data-value="2"></i>
                                    <i class="bx bx-star icon_star star_three" data-value="3"></i>
                                    <i class="bx bx-star icon_star star_four" data-value="4"></i>
                                    <i class="bx bx-star icon_star star_five" data-value="5"></i>
                                    <input type="hidden" name="popularity" id="popularity" value="0">
                                </div>
                            </div>

                            {{-- opening & closing time --}}
                            <div class="col-md-6 mb-3">
                                <label for="">Opening time</label>
                                <input type="time" name="txt_opening_time" id="txt_opening_time" class="form-control" placeholder="latitude">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Closing time</label>
                                <input type="time" name="txt_closing_time" id="txt_closing_time" class="form-control" placeholder="longitude">
                            </div>

                            {{-- images --}}
                            <div class="col-md-4">
                                <label for="">Cover Image</label>
                                <input type="file" name="cover_image" id="cover_image" class="form-control" accept=".jpg,.jpeg,.png" required>
                                <span id="cover_image_error" class="text-danger">Image size must be less than 5MB</span>
                                <img src="" alt="cover_image" id="cover_image_preview" class="img-fluid mt-2">
                            </div>
                            <div class="col-md-4">
                                <label for="">Image 1</label>
                                <input type="file" name="image_1" id="image_1" class="form-control" accept=".jpg,.jpeg,.png">
                                <span id="image_1_error" class="text-danger">Image size must be less than 5MB</span>
                                <img src="" alt="image_1" id="image_1_preview" class="img-fluid mt-2">
                            </div>
                            <div class="col-md-4">
                                <label for="">Image 2</label>
                                <input type="file" name="image_2" id="image_2" class="form-control" accept=".jpg,.jpeg,.png">
                                <span id="image_2_error" class="text-danger">Image size must be less than 5MB</span>
                                <img src="" alt="image_2" id="image_2_preview" class="img-fluid mt-2">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-end mt-3">Add Restaurant</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/restaurant_create.js') }}"></script>
    <script src="{{ asset('js/common_script.js') }}"></script>
@endsection
