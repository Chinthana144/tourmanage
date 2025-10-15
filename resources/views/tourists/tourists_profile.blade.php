@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Add Tourist</h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <form action="{{ route('tourists.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required> 
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email" required> 
                        </div>
                        <div class="col-md-6">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="phone" required>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">Passport No</label>
                            <input type="text" name="passport_no" class="form-control" placeholder="Passport No" required> 
                        </div>
                        <div class="col-md-6">
                            <label for="">Select Country</label>
                            <select name="cmb_country" id="cmb_country" class="form-select">
                                <option value="">--- Select Country ---</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">Birthday</label>
                            <input type="date" name="dob" id="dob" class="form-control" placeholder="YYYY-MM-DD" required>
                            <span id="dob_error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="">Pefered Language</label>
                            <select name="cmb_language" id="cmb_language" class="form-select">
                                <option value="">--- Select Language ---</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">Address</label>
                            <textarea name="address" id="address" cols="40" rows="8" class="form-control">Address</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Profile Picture</label>
                            <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                            <img src="" alt="profile picture" id="img_profile_picture" style="width:200px; height:auto; border-radius:10px; margin-top:10px;">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save & Continue</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/tourist_create.js') }}"></script>
@endsection
