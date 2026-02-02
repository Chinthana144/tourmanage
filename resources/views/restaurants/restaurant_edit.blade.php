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
                    <div class="container container-md">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Select Country</label>
                                <select name="cmb_travel_country" id="cmb_travel_country" class="form-select mb-2">
                                    @foreach ($travel_countries as $travel_country)
                                        <option value="{{ $travel_country->id }}" @selected($travel_country->id == $restaurant->id)>{{ $travel_country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input type="text" name="txt_restaurant_name" id="txt_restaurant_name" value="{{ $restaurant->name }}" class="form-control" placeholder="Restaurant name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Address</label>
                                <input type="text" name="txt_restaurant_address" id="txt_restaurant_address" value="{{ $restaurant->address }}" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone</label>
                                <input type="text" name="txt_restaurant_phone" id="txt_restaurant_phone" value="{{ $restaurant->phone }}" class="form-control" placeholder="+9412345678">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Website</label>
                                <input type="text" name="txt_restaurant_website" id="txt_restaurant_website" value="{{ $restaurant->website }}" class="form-control" placeholder="restaurantname.com">
                            </div>
                            <div class="col-md-6">
                                <label for="">Populatiry</label>
                                <div class="div_populatiry">
                                    <i class="icon_star star_one {{ $restaurant->popularity <= 1 ? bx bxs-star : bx bx-star }}" data-value="1"></i>
                                    <i class="icon_star star_two {{ $restaurant->popularity <= 2 ? bx bxs-star : bx bx-star }}" data-value="2"></i>
                                    <i class="icon_star star_three {{ $restaurant->popularity <= 3 ? bx bxs-star : bx bx-star }}" data-value="3"></i>
                                    <i class="icon_star star_four {{ $restaurant->popularity <= 4 ? bx bxs-star : bx bx-star }}" data-value="4"></i>
                                    <i class="icon_star star_five {{ $restaurant->popularity <= 5 ? bx bxs-star : bx bx-star }}" data-value="5"></i>
                                    <input type="hidden" name="popularity" id="popularity" value="{{ $restaurant->popularity }}">
                                </div>
                            </div>

                            {{-- opening & closing time --}}
                            <div class="col-md-6 mb-3">
                                <label for="">Opening time</label>
                                <input type="time" name="txt_opening_time" id="txt_opening_time" value="{{ $restaurant->opening_time }}" class="form-control" placeholder="latitude">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Closing time</label>
                                <input type="time" name="txt_closing_time" id="txt_closing_time" value="{{ $restaurant->closing_time }}" class="form-control" placeholder="longitude">
                            </div>

                            {{-- images --}}
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

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-end mt-3">Update Restaurant</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/restaurant_create.js') }}"></script>
@endsection
