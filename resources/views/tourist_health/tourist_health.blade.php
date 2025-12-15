@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tourist Details</h5>
        </div>
        <div class="card-body">
            <div class="container container-md mb-3">
                <h3>{{ $tourist->firstname ." ". $tourist->lastname}}</h3>
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset($tourist->profile_picture) }}" alt="" style="width: 150px; height:auto; object-fit:cover; border-radius:10px;">
                    </div>
                    <div class="col-md-8">
                        <p>
                            <strong>Phone:</strong> {{ $tourist->phone }} <br>
                            <strong>Passport No:</strong> {{ $tourist->passport_no }} <br>
                            <strong>Country:</strong> {{ $tourist->country->name }} <img src="{{ asset('images/countries/'.$tourist->country->flag) }}" alt="flag"><br>
                            <strong>Language:</strong> {{ $tourist->language->name }}<br>
                            <strong>Address:</strong> {{ $tourist->address }}<br>
                            <strong>Date of Birth:</strong> {{ $tourist->dob }}<br>
                        </p>
                    </div>
                </div>
            </div>
            

            <div class="container container-md mt-3">
                <form action="{{ route('tourist_health.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tourist_id" value="{{ $tourist->id }}">
                    <div class="col-md-12">
                        <h4>Health Information</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="">Select Blood Group</label>
                            <select name="cmb_bood_group" id="cmb_bood_group" class="form-select">
                                <option value="">--- Select Blood Group ---</option>
                                @foreach ($blood_groups as $blood_group)
                                    <option value="{{ $blood_group->id }}">{{ $blood_group->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Dietary Preference</label>
                            <select name="cmb_dietary_type" id="cmb_dietary_type" class="form-select">
                                <option value="">--- Select Dietary Preference ---</option>
                                @foreach ($dietary_types as $dietary_type)
                                    <option value="{{ $dietary_type->id }}"><strong>{{ $dietary_type->name}}</strong>: {{ $dietary_type->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="">Allergies (Optional)</label>
                            <textarea name="allergies" id="allergies" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Medical Condition (Optional)</label>
                            <textarea name="medical_condition" id="medical_condition" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="">Emergency Contact Person Name</label>
                            <input type="text" name="emergency_contact_name" id="emergency_contact_name" class="form-control" placeholder="Emergency Contact Name">
                        </div>

                        <div class="col-md-6">
                            <label for="">Emergency Contact Phone No</label>
                            <input type="text" name="emergency_contact_phone" id="emergency_contact_phone" class="form-control" placeholder="Emergency Contact Phone">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save Tourist</button>
                </form>
            </div>
        </div>
    </div>
@endsection