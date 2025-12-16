@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Tours
                <button id="btn_add_tour" class="btn btn-primary btn-sm float-end">Add Tour</button>
            </h5>
        </div>
        <div class="card-body">
            <p>content</p>
        </div>
    </div>

    @include('tours.add_tour_modal')

    <script src="{{ asset('js/tour_view.js') }}"></script>
@endsection
