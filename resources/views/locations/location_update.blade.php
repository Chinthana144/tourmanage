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
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Select Country</label>
                            <select name="cmb_travel_country" id="cmb_travel_country" class="form-select mb-2">
                                @foreach ($travel_countries as $travel_country)
                                    <option value="{{ $travel_country->id }}" @selected($location->travel_country_id == $travel_country->id)>{{ $travel_country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="txt_location_name">Location Name</label>
                            <input type="text" name="txt_location_name" id="txt_location_name" class="form-control mb-2" placeholder="Enter Location Name" value="{{$location->name}}">
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea name="txt_description" id="txt_description" class="form-control mb-2" cols="30" rows="3">
                                {{$location->description}}
                            </textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Display in website</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="chk_display" name="chk_display" @checked($location->display == 1)>
                                <label class="form-check-label" for="chk_display">Display this location in website</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Populatiry</label>
                            <div id="div_populatiry">
                                <i class="icon_star star_one {{$location->popularity >= 1 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="1"></i>
                                <i class="icon_star star_two {{$location->popularity >= 2 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="2"></i>
                                <i class="icon_star star_three {{$location->popularity >= 3 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="3"></i>
                                <i class="icon_star star_four {{$location->popularity >= 4 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="4"></i>
                                <i class="icon_star star_five {{$location->popularity >= 5 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="5"></i>
                                <input type="hidden" name="popularity" id="popularity" value="{{$location->popularity}}">
                            </div>
                        </div>

                        {{-- Images --}}
                        <div class="col-md-6 mt-3">
                            <label for="primary_image">Primary Image</label>
                            <input type="file" name="primary_image" id="primary_image" class="form-control mb-2">
                            <div class="loc_img_wrapper">
                                <img src="{{ $location->primary_image }}" alt="" id="primary_image_preview" class="img-fluid mb-2">
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="image1">Image 1</label>
                            <input type="file" name="image1" id="image1" class="form-control mb-2">
                            <div class="loc_img_wrapper">
                                <img src="{{ $location->image1 }}" alt="" id="image1_preview" class="img-fluid mb-2">
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="image2">Image 2</label>
                            <input type="file" name="image2" id="image2" class="form-control mb-2">
                            <div class="loc_img_wrapper">
                                <img src="{{ $location->image2 }}" alt="" id="image2_preview" class="img-fluid mb-2">
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="image2">Image 3</label>
                            <input type="file" name="image3" id="image3" class="form-control mb-2">
                            <div class="loc_img_wrapper">
                                <img src="{{ $location->image3 }}" alt="" id="image3_preview" class="img-fluid mb-2">
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="image2">Image 4</label>
                            <input type="file" name="image4" id="image4" class="form-control mb-2">
                            <div class="loc_img_wrapper">
                                <img src="{{ $location->image4 }}" alt="" id="image4_preview" class="img-fluid mb-2">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-end">Update Location</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/location_create.js') }}"></script>
    <script src="{{ asset('js/common_script.js') }}"></script>
@endsection
