@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create Hotel</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
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
            </form>
        </div>
    </div>

    <script src="{{ asset('js/hotel_create.js') }}"></script>
@endsection
