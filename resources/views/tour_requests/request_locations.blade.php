@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Hi {{ $customer->first_name }}, please add locations you want to visit.</h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <form action="{{ route('tour_request_location.store') }}" method="post"> 
                    @csrf
                    <input type="hidden" name="tour_request_id" value="{{ $tour_request->id }}">               
                    @foreach ($locations as $location)
                        <div class="card mb-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset($location->primary_image) }}" alt="" style="width: 100%; height:auto; border-radius:0.5rem;">
                                    </div>
                                    <div class="col-md-8">
                                        <h5>{{ $location->name }}</h5>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <p>{{ $location->description }}</p>

                                                {{-- has activities --}}
                                                @if ($location->activities->count() > 0)
                                                    <div class="border border-primary rounded p-1">
                                                        <h6>Activities</h6>
                                                        <ul>
                                                            @foreach ($location->activities as $activity)
                                                            <li>{{ $activity->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <p>Visit Location</p>
                                                <div class="form-check form-switch">
                                                    <input 
                                                        name="chk_location_{{ $location->id }}"
                                                        class="form-check-input chk_location" 
                                                        type="checkbox" 
                                                        id="Loc_{{ $location->id }}"
                                                        style="width:4rem; height:2rem;"
                                                        {{ in_array($location->id, $selected_locations) ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label m-2" for="Loc_{{ $location->id }}">
                                                        Select
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button class="btn btn-primary float-end mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/request_location.js') }}"></script>
@endsection
