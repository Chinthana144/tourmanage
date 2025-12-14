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
                    <th>Category</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Best time</th>
                    <th>Other</th>
                    <th>Actions</th>
                </tr>
                @foreach ($activities as $activity)
                    <tr data-id="{{ $activity->id }}">
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->category }}</td>
                        <td>
                            @if ($activity->pricing_type == "per_person")
                                <span class="badge bg-primary">For Person</span>
                            @else
                                <span class="badge bg-primary">For Group</span>
                            @endif
                            
                            @if ($activity->is_paid)
                                <span class="badge bg-primary">Paid Activity</span>
                            @else
                                <span class="badge bg-primary">Free Activity</span>
                            @endif
                        </td>
                        <td>{{ $activity->duration_minutes }}</td>
                        <td>{{ $activity->best_time }}</td>
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

    <script src="{{ asset('js/activities.js') }}"></script>
@endsection
