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
                        @foreach ($gf_data as $gf)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $gf['id'] }}" name="fcl_{{ $gf['id'] }}"  @checked($gf['status'] == true)>
                                <label class="form-check-label" for="fcl_{{ $gf['id'] }}">{{ $gf['name'] }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        <h4>Food & Drinks</h4>
                        @foreach ($fdf_data as $fdf)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $fdf['id'] }}" name="fcl_{{ $fdf['id'] }}"  @checked($fdf['status'] == true)>
                                <label class="form-check-label" for="fcl_{{ $fdf['id'] }}">{{ $fdf['name'] }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        <h4>Wellness Recreation</h4>
                        @foreach ($wrf_data as $wrf)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $wrf['id'] }}" name="fcl_{{ $wrf['id'] }}"  @checked($wrf['status']==true)>
                                <label class="form-check-label" for="fcl_{{ $wrf['id'] }}">{{ $wrf['name'] }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        <h4>Services Facilities</h4>
                        @foreach ($sf_data as $sf)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $sf['id'] }}" name="fcl_{{ $sf['id'] }}"  @checked($sf['status'] == true)>
                                <label class="form-check-label" for="fcl_{{ $sf['id'] }}">{{ $sf['name'] }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-4 mt-3">
                        <h4>Family & Kids</h4>
                        @foreach ($fkf_data as $fkf)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $fkf['id'] }}" name="fcl_{{ $fkf['id'] }}"  @checked($fkf['status'] == true)>
                                <label class="form-check-label" for="fcl_{{ $fkf['id'] }}">{{ $fkf['name'] }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-4 mt-3">
                        <h4>Outdoors Activities</h4>
                        @foreach ($oaf_data as $oaf)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $oaf['id'] }}" name="fcl_{{ $oaf['id'] }}"  @checked($oaf['status'] == true)>
                                <label class="form-check-label" for="fcl_{{ $oaf['id'] }}">{{ $oaf['name'] }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-4 mt-3">
                        <h4>In Room</h4>
                        @foreach ($irf_data as $irf)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fcl_{{ $irf['id'] }}" name="fcl_{{ $irf['id'] }}"  @checked($irf['status'] == true)>
                                <label class="form-check-label" for="fcl_{{ $irf['id'] }}">{{ $irf['name'] }}</label>
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
