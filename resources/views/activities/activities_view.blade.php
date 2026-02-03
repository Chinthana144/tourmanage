@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Activities
                <a href="{{ route('activities.create') }}" class="btn btn-primary btn-sm float-end">Add Activity</a>
            </h5>
        </div>
        <div class="card-body">
            @foreach ($activities as $activity)
                
                <div class="card">
                    <div class="card-header">
                        <h5>
                            {{ $activity->travelCountry->name ." - ". $activity->name }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>
                                    Category: <b>{{ $activity->activityCategory->name }}</b> <br>
                                    Duration: <b>{{ $activity->duration_minutes}} min</b> <br>
                                    Best Time: <b>{{ $activity->activitytTime->name }}</b>
                                </p>
                            </div>
                            <div class="col-md-4">
                                @if ($activity->is_paid == 1)
                                    <span class="badge bg-primary">Paid Activity</span>
                                @else
                                    <span class="badge bg-success">Free Activity</span>
                                @endif
                                <br>
                                @if ($activity->is_optional == 1)
                                    <span class="badge bg-primary">Optional Activity</span>
                                @else
                                    <span class="badge bg-success">Compulsary Activity</span>
                                @endif
                                <br>
                                @if ($activity->requires_guide == 1)
                                    <span class="badge bg-primary">Guide Required</span>
                                @else
                                    <span class="badge bg-success">Guide Not Required</span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="">Populatiry</label>
                                <div class="div_populatiry">
                                    <i class="icon_star star_one {{$activity->popularity >= 1 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="1"></i>
                                    <i class="icon_star star_two {{$activity->popularity >= 2 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="2"></i>
                                    <i class="icon_star star_three {{$activity->popularity >= 3 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="3"></i>
                                    <i class="icon_star star_four {{$activity->popularity >= 4 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="4"></i>
                                    <i class="icon_star star_five {{$activity->popularity >= 5 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="5"></i>
                                    <input type="hidden" name="popularity" id="popularity" value="{{$activity->popularity}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p>
                                   <b>Description:</b> {{ $activity->description }} 
                                </p>
                            </div>

                            <div class="col-md-4 mt-3">
                                <img src="{{ asset('images/activities/' . $activity->cover_image) }}" alt="con" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>
                            <div class="col-md-4 mt-3">
                                <img src="{{ asset('images/activities/' . $activity->image1) }}" alt="con" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>
                            <div class="col-md-4 mt-3">
                                <img src="{{ asset('images/activities/' . $activity->image2) }}" alt="con" style="width: 100%; height:auto; border-radius: 8px;">
                            </div>

                            <div class="col-md-4 mt-3">
                                <form action="{{ route('activities.edit') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="hide_activity_id" value="{{ $activity->id }}">
                                    <button type="submit" class="btn btn-outline-warning">Edit Activity</button>
                                </form>
                            </div>

                            <div class="col-md-4 mt-3">
                                <form action="{{ route('activities.remove') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="hide_activity_id" value="{{ $activity->id }}">
                                    <button type="submit" class="btn btn-outline-danger">Remove Activity</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('js/activities.js') }}"></script>
@endsection
