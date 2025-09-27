@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ $package->title }} - Route</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('packageroute.store') }}" method="post">
                @csrf
                <input type="hidden" name="hide_package_id" value="{{ $package->id }}">
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Day Count</label>
                        <select name="cmb_days" id="cmb_days" class="form-select">
                            @for ($i = 1; $i <= $package->duration_days; $i++)
                                <option value="{{ $i }}">Day {{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="">Place Type</label>
                        <select name="cmb_stoppable_type" id="cmb_stoppable_type" class="form-select">
                            <option value="0">--- Select Type ---</option>
                            <option value="location">Location</option>
                            <option value="hotel">Hotel</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Place</label>
                        <select name="cmb_stoppable" id="cmb_stoppable" class="form-select">
                            <option value="0">--- select type ---</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">Stay Duration(days)</label>
                        <input type="number" name="stay_duration" class="form-control" placeholder="duration">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="bx bx-plus"></i> Add</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script src="{{ asset('js/package_route.js') }}"></script>
@endsection
