@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Update Location</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('location.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="hide_location_id" value="{{ $location->id }}">
                <div class="row">
                    <div class="col-md-4">
                        <label for="cmb_province">Select Province</label>
                        <select name="cmb_province" id="cmb_province" class="form-select">
                            <option value="0">-- Select Province --</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" @selected($province->id == $province_id)>
                                    {{ $province->name_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="cmb_district">Select District</label>
                        <select name="cmb_district" id="cmb_district" class="form-select">
                            <option value="0">-- Select District --</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}" @selected($district->id == $district_id)>{{ $district->name_en }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="cmb_city">Select City</label>
                        <select name="cmb_city" id="cmb_city" class="form-select">
                            <option value="0">-- Select City --</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" @selected($city->id == $city_id)>{{ $city->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <div>
                    <label for="txt_location_name">Location Name</label>
                    <input type="text" name="txt_location_name" id="txt_location_name" class="form-control mb-2" placeholder="Enter Location Name" value="{{ $location->name }}">
                    <label for="location_description">Description</label>
                    <textarea name="location_description" id="location_description" cols="30" rows="5" class="form-control">{{ $location->description }}</textarea>
                </div>
                <hr>
                <p>Geometrical Location</p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Latitude</label>
                        <input type="text" name="txt_latitude" id="txt_latitude" class="form-control mb-2" placeholder="Enter Latitude" value="{{ $location->latitude }}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Longitude</label>
                        <input type="text" name="txt_longitude" id="txt_longitude" class="form-control mb-2" placeholder="Enter Longitude" value="{{ $location->longitude }}">
                    </div>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="chk_display" name="chk_display" @checked($location->display == 1)>
                    <label class="form-check-label" for="chk_display">Display this location in website</label>
                </div>

                <hr>

                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="primary_image">Primary Image</label>
                            <input type="file" name="primary_image" id="primary_image" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ $location->primary_image }}" alt="" id="primary_image_preview" class="img-fluid mb-2" style="max-height: 200px; max-width: 200px; border-radius: 5px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="image1">Image 1</label>
                            <input type="file" name="image1" id="image1" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ $location->image1 }}" alt="" id="image1_preview" class="img-fluid mb-2" style="max-height: 200px; max-width: 200px; border-radius: 5px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="image2">Image 2</label>
                            <input type="file" name="image2" id="image2" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ $location->image2 }}" alt="" id="image2_preview" class="img-fluid mb-2" style="max-height: 200px; max-width: 200px; border-radius: 5px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="image3">Image 3</label>
                            <input type="file" name="image3" id="image3" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ $location->image3 }}" alt="" id="image3_preview" class="img-fluid mb-2" style="max-height: 200px; max-width: 200px; border-radius: 5px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="image4">Image 4</label>
                            <input type="file" name="image4" id="image4" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ $location->image4 }}" alt="" id="image4_preview" class="img-fluid mb-2" style="max-height: 200px; max-width: 200px; border-radius: 5px;">
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Update Location</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/location_create.js') }}"></script>
@endsection
