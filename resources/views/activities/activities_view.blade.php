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
            <table class="table" id="tbl_activities">
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Best time</th>
                    <th>Other</th>
                    <th>Actions</th>
                </tr>
                @foreach ($activities as $activity)
                    <tr data-id="{{ $activity->id }}">
                        <td>
                            <b>{{ $activity->name }}</b>
                            <br>
                            Category: <b>{{ $activity->ActivityCategory->name }}</b>
                        </td>
                        <td>
                            <span class="badge bg-primary">{{ $activity->ActivityPrice->name }}</span>
                            <br>
                            @if ($activity->is_paid)
                                <span class="badge bg-primary">Paid Activity</span>
                            @else
                                <span class="badge bg-primary">Free Activity</span>
                            @endif 
                        </td>
                        <td>
                            Adult: <b>{{ $activity->price_adult ?? 0 }}</b>
                            <br>
                            Child: <b>{{ $activity->price_child ?? 0 }}</b>
                            <br>
                            Group: <b>{{ $activity->group_price ?? 0 }}</b>
                        </td>
                        <td>{{ $activity->duration_minutes }} min</td>
                        <td>{{ $activity->ActivitytTime->name }}</td>
                        <td>
                            @if ($activity->is_optional)
                                <span class="badge bg-success">Optional</span>
                            @else
                                <span class="badge bg-primary">Not Optional</span>
                            @endif
                            <br>
                            @if ($activity->requires_guide)
                                <span class="badge bg-success">Require Guide</span>
                            @else
                                <span class="badge bg-secondary">No Guide Required</span>
                            @endif
                            <br>
                            @if ($activity->status)
                                <span class="badge bg-primary">Available</span>
                            @else
                                <span class="badge bg-danger">Not Available</span>
                            @endif
                        </td>
                        <td>
                           <button class="btn btn-warning btn-sm btn_edit_activity">Edit</button> 
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('activities.add_activity_modal')
    @include('activities.edit_activity_modal')

    <script src="{{ asset('js/activities.js') }}"></script>
@endsection
