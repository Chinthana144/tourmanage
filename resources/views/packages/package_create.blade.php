@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create a new package</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <label for="">Package Title</label>
                    <input type="text" name="title" id="title" class="form-control">

                    <label for="" class="mt-3">Description</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="" class="mt-3">Price per person</label>
                    <input type="text" name="price_per_person" id="price_per_person" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="" class="mt-3">Duration(Days)</label>
                    <input type="text" name="duration_days" id="duration_days" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="" class="mt-3">Available Start Date</label>
                    <input type="text" name="available_startdate" id="available_startdate" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="" class="mt-3">Available End Date</label>
                    <input type="text" name="available_enddate" id="available_enddate" class="form-control">
                </div>

                 <div class="col-md-6">
                    <label for="" class="mt-3">Cover Image</label>
                    <input type="file" name="cover_image" accept=".jpg, .jpeg, .png" id="cover_image" class="form-control">
                    <span id="cover_image_error">Cover image should be less than 5MB</span>
                </div>

                <div class="col-md-6">
                    <img src="" alt="" id="cover_image_preview" style="width:100%; height:auto; border-radius:10px;">
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/package_create.js') }}"></script>
@endsection
