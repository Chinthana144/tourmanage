@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create Hotel</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('hotels.store') }}" method="post" enctype="multipart/form-data">
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
                        <input type="text" name="txt_hotel_name" id="txt_hotel_name" class="form-control" placeholder="Hotel Name" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Address</label>
                        <input type="text" name="txt_hotel_address" id="txt_hotel_address" class="form-control" placeholder="Hotel Address" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Phone</label>
                        <input type="text" name="txt_hotel_phone" id="txt_hotel_phone" class="form-control" placeholder="Hotel Phone" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="text" name="txt_hotel_email" id="txt_hotel_email" class="form-control" placeholder="Hotel Email" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Website</label>
                        <input type="text" name="txt_hotel_website" id="txt_hotel_website" class="form-control" placeholder="Hotel Website" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Rating</label>
                        <input type="text" name="txt_hotel_rating" id="txt_hotel_rating" class="form-control" placeholder="Hotel Rating">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Latitude</label>
                        <input type="text" name="txt_hotel_latitude" id="txt_hotel_latitude" class="form-control" placeholder="Hotel Latitude">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Longitude</label>
                        <input type="text" name="txt_hotel_longitude" id="txt_hotel_longitude" class="form-control" placeholder="Hotel Longitude">
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

                <div>
                    <button type="submit" class="btn btn-primary mt-3">Save & Continue</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/hotel_create.js') }}"></script>
@endsection
