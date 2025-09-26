@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
        <h5>{{ $hotel->name }} Facilities</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('facilities.store') }}" method="post">
                @csrf
                <input type="hidden" name="hide_hotel_id" value="{{ $hotel->id }}">
                <div class="row">
                    <div class="col-md-3">
                        <h4>General Facilities</h4>
                        @foreach ($general_facilities as $gf)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $gf->id }}" name="fcl_{{ $gf->id }}">
                                <label class="form-check-label" for="fcl_{{ $gf->id }}">{{ $gf->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        <h4>Food & Drinks</h4>
                        @foreach ($food_drink_facilities as $fd)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $fd->id }}" name="fcl_{{ $fd->id }}">
                                <label class="form-check-label" for="fcl_{{ $fd->id }}">{{ $fd->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        <h4>Wellness Recreation</h4>
                        @foreach ($wellness_recreation_facilities as $wr)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $wr->id }}" name="fcl_{{ $wr->id }}">
                                <label class="form-check-label" for="fcl_{{ $wr->id }}">{{ $wr->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        <h4>Services Facilities</h4>
                        @foreach ($services_facilities as $sf)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $sf->id }}" name="fcl_{{ $sf->id }}">
                                <label class="form-check-label" for="fcl_{{ $sf->id }}">{{ $sf->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-4 mt-3">
                        <h4>Family & Kids</h4>
                        @foreach ($family_kids_facilities as $fk)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $fk->id }}" name="fcl_{{ $fk->id }}">
                                <label class="form-check-label" for="fcl_{{ $fk->id }}">{{ $fk->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-4 mt-3">
                        <h4>Outdoors Activities</h4>
                        @foreach ($outdoors_activities_facilities as $oaf)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $oaf->id }}" name="fcl_{{ $oaf->id }}">
                                <label class="form-check-label" for="fcl_{{ $oaf->id }}">{{ $oaf->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-4 mt-3">
                        <h4>In Room</h4>
                        @foreach ($in_room_facilities as $inf)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $inf->id }}" name="fcl_{{ $inf->id }}">
                                <label class="form-check-label" for="fcl_{{ $inf->id }}">{{ $inf->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Save Facilities</button>
                </div>
            </form>
        </div>
    </div>
@endsection
