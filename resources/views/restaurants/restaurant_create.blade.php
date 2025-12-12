@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Add Restaurant</h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <select name="cmb_province" id="cmb_province" class="form-select">
                                <option value="">Select Province</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="cmb_district" id="cmb_district" class="form-select">
                                <option value="">Select District</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="cmb_city" id="cmb_city" class="form-select">
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
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
                            <input type="text" name="txt_restaurant_phone" id="txt_restaurant_phone" class="form-control" placeholder="Address">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Address</label>
                            <input type="text" name="txt_restaurant_website" id="txt_restaurant_website" class="form-control" placeholder="Address">
                        </div>

                        {{-- Latitude & longitude --}}
                        <div class="col-md-6 mb-3">
                            <label for="">Latitude</label>
                            <input type="text" name="txt_restaurant_latitude" id="txt_restaurant_latitude" class="form-control" placeholder="latitude">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Longitude</label>
                            <input type="text" name="txt_restaurant_longitude" id="txt_restaurant_longitude" class="form-control" placeholder="longitude">
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
                    </div>

                    <div class="row mt-3">
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
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Add Restaurant</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/restaurant_create.js') }}"></script>
@endsection
