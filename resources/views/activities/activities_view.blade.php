@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Activities of {{$location->name}}
                <button id="btn_add_activity" class="btn btn-primary btn-sm float-end">Add Activity</button>
            </h5>
        </div>
        <div class="card-body">
            <p>content</p>
        </div>
    </div>

    @include('activities.add_activity_modal')

    <script src="{{ asset('js/activities.js') }}"></script>
@endsection
