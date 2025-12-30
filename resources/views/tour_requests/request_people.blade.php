@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tour people composition</h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <div class="d-flex">
                    <input type="hidden" name="tour_request_id" id="tour_request_id" value="{{ $tour_request->id }}">
                    <div id="div_group_composition">
                        <label for="">Select Compisition</label>
                        <select name="cmb_group_composition" id="cmb_group_composition" class="form-select">
                            <option value="0">--- Select Composition ---</option>
                            @foreach ($group_compusitions as $composition)
                                <option value="{{ $composition->id }}">{{ $composition->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="div_adult_count" class="ms-1">
                        <label for="">Adults</label>
                        <input type="number" name="num_adult_count" id="num_adult_count" class="form-control">
                    </div>
                    <div id="div_children_count" class="ms-1">
                        <label for="">Children</label>
                        <input type="number" name="num_children_count" id="num_children_count" class="form-control">
                    </div>

                    <div class="form-check form-switch ms-1 mt-4" id="div_extra_bed">
                        <input class="form-check-input" type="checkbox" name="chk_extra_bed" id="chk_extra_bed">
                        <label class="form-check-label" for="chk_extra_bed">Extra Bed</label>
                    </div>

                    <div id="div_quantity" class="ms-1">
                        <label for="">Number of Rooms</label>
                        <input type="number" name="num_quantity" id="num_quantity" class="form-control" required>
                    </div>
                    
                    <div id="div_button" class="ms-1">
                        <button type="button" class="btn btn-primary mt-4" id="btn_add_people"><i class="bx bx-plus"></i> Add</button>
                    </div>
                </div>

                {{-- div table --}}
                <div id="div_request_people"></div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/request_people.js') }}"></script>
@endsection
