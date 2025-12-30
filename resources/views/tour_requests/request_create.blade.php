@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Hi {{ $customer->first_name }}, welcome to Akagi eXperience tours.</h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <form action="{{ route('tour_request.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="hide_customer_id" value="{{ $customer->id }}">
                    <div class="row mt-2">
                        {{-- dates --}}
                        <div class="col-md-6 mt-2">
                            <label for="">Travel Date</label>
                            <input type="date" name="travel_date" class="form-control" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="">Return Date</label>
                            <input type="date" name="return_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-2 border border-primary rounded p-2">
                        <h6>People</h6>
                        {{-- people --}}
                        <div class="col-md-6 mt-2">
                            <label for="">Number of Adults</label>
                            <input type="number" name="num_total_adults" id="num_total_adults" class="form-control" required placeholder="Total adults">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="">Number of Children</label>
                            <input type="number" name="num_total_children" id="num_total_children" class="form-control" placeholder="Total children">
                        </div>
                    </div>
                    
                    <div class="row mt-2">
                        {{-- tour --}}
                        <div class="col-md-6 mt-2">
                            <label for="">Tour Pourpose</label>
                            <select name="cmb_tour_purpose" id="cmb_tour_purpose" class="form-select">
                                @foreach ($tour_purposes as $tour_purpose)
                                    <option value="{{ $tour_purpose->id }}">{{ $tour_purpose->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="">Budget ($)</label>
                            <input type="number" step="0.01" name="budget" class="form-control">
                        </div>
                        {{-- text request --}}
                        <div class="col-md-12 mt-2">
                            <label for="">Special Requests</label>
                            <textarea name="txt_special_requests" id="txt_special_requests" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-2">Save & Continue</button>
                </form>
            </div>
        </div>
    </div>
@endsection
