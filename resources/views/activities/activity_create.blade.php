@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create Activity</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('activities.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container container-md">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Select Country</label>
                            <select name="cmb_travel_country" id="cmb_travel_country" class="form-select mb-2">
                                @foreach ($travel_countries as $travel_country)
                                    <option value="{{ $travel_country->id }}">{{ $travel_country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="activity_name" class="form-control" required>
                        </div>

                        <div class="col-md-12">
                            <label for="">Description</label>
                            <input type="text" name="txt_description" id="txt_description" class="form-control">
                            {{-- <textarea name="txt_description" id="txt_description" cols="30" rows="2" class="form-control"></textarea> --}}
                        </div>

                        <div class="col-md-6 mt-2">
                            <label for="">Select Category</label>
                            <select name="cmb_category" id="cmb_category" class="form-select mb-2">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mt-2">
                            <label for="">Activity Duration(minutes)</label>
                            <input type="number" step="1" name="duration_minutes" class="form-control" required>
                        </div>

                        <div class="col-md-6 mt-2">
                            <label for="">Best Times</label>
                            <select name="cmb_best_time" id="cmb_best_time" class="form-select mb-2">
                                @foreach ($activity_times as $time)
                                    <option value="{{ $time->id }}">{{ $time->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mt-2">
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

                        <div class="col-md-4 mt-2">
                            <label for="">Paid Activity?</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="chk_paid" id="chk_paid">
                                <label class="form-check-label" for="chk_paid">Paid Activity</label>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <label for="">Optional Activity?</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="chk_optional_activity" id="chk_optional_activity">
                                <label class="form-check-label" for="chk_optional_activity">Optional Activity</label>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <label for="">Require Guide?</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="chk_require_guide" id="chk_require_guide">
                                <label class="form-check-label" for="chk_require_guide">Require Guide</label>
                            </div>
                        </div>

                        {{-- images --}}
                        <div class="col-md-4 mt-2">
                            <label for="">Cover Image</label>
                            <input type="file" name="cover_image" id="cover_image" class="form-control" accept=".jpg,.jpeg,.png" required>
                            <span id="cover_image_error" class="text-danger">Image size must be less than 5MB</span>
                            <img src="" alt="cover_image" id="cover_image_preview" class="img-fluid mt-2">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="">Image 1</label>
                            <input type="file" name="image_1" id="image_1" class="form-control" accept=".jpg,.jpeg,.png">
                            <span id="image_1_error" class="text-danger">Image size must be less than 5MB</span>
                            <img src="" alt="image_1" id="image_1_preview" class="img-fluid mt-2">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="">Image 2</label>
                            <input type="file" name="image_2" id="image_2" class="form-control" accept=".jpg,.jpeg,.png">
                            <span id="image_2_error" class="text-danger">Image size must be less than 5MB</span>
                            <img src="" alt="image_2" id="image_2_preview" class="img-fluid mt-2">
                        </div>

                        <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-primary float-end">Add Activity</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/activity_create.js') }}"></script>
    <script src="{{ asset('js/common_script.js') }}"></script>
@endsection
