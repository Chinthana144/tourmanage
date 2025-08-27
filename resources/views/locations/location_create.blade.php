@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create Location</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('locations.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="cmb_province">Select Province</label>
                        <select name="cmb_province" id="cmb_province" class="form-select">
                            <option value="0">-- Select Province --</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name_en }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="cmb_district">Select District</label>
                        <select name="cmb_district" id="cmb_district" class="form-select">
                            <option value="0">-- Select District --</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="cmb_city">Select City</label>
                        <select name="cmb_city" id="cmb_city" class="form-select">
                            <option value="0">-- Select City --</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div>
                    <label for="txt_location_name">Location Name</label>
                    <input type="text" name="txt_location_name" id="txt_location_name" class="form-control mb-2" placeholder="Enter Location Name">
                    <label for="location_description">Description</label>
                    <textarea name="location_description" id="location_description" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <hr>
                <p>Geometrical Location</p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Latitude</label>
                        <input type="text" name="txt_latitude" id="txt_latitude" class="form-control mb-2" placeholder="Enter Latitude">
                    </div>
                    <div class="col-md-6">
                        <label for="">Longitude</label>
                        <input type="text" name="txt_longitude" id="txt_longitude" class="form-control mb-2" placeholder="Enter Longitude">
                    </div>
                </div>

                <hr>

                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="primary_image">Primary Image</label>
                            <input type="file" name="primary_image" id="primary_image" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <img src="" alt="" id="primary_image_preview" class="img-fluid mb-2" style="max-height: 200px; max-width: 200px; border-radius: 5px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="image1">Image 1</label>
                            <input type="file" name="image1" id="image1" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <img src="" alt="" id="image1_preview" class="img-fluid mb-2" style="max-height: 200px; max-width: 200px; border-radius: 5px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="image2">Image 2</label>
                            <input type="file" name="image2" id="image2" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <img src="" alt="" id="image2_preview" class="img-fluid mb-2" style="max-height: 200px; max-width: 200px; border-radius: 5px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="image3">Image 3</label>
                            <input type="file" name="image3" id="image3" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <img src="" alt="" id="image3_preview" class="img-fluid mb-2" style="max-height: 200px; max-width: 200px; border-radius: 5px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="image4">Image 4</label>
                            <input type="file" name="image4" id="image4" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <img src="" alt="" id="image4_preview" class="img-fluid mb-2" style="max-height: 200px; max-width: 200px; border-radius: 5px;">
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Save Location</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/location_create.js') }}"></script>
@endsection
