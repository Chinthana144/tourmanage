@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tour Route</h5>
        </div>
        <div class="card-body">
            <input type="hidden" name="hide_tour_id" id="hide_tour_id" value="{{ $tour->id }}">
            <table class="table table-bordered" id="tbl_route_items">
                <tr>
                    <th>No</th>
                    <th>Day</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
                @foreach ($route_items as $item)
                    <tr data-id="{{ $item->id }}">
                        <td>{{ $item->order_no }}</td>
                        <td>{{ "Day " . $item->day_no }}</td>
                        <td>
                            @switch($item->item_type)
                                @case('App\Models\Locations')
                                    <span class="badge bg-primary">Location</span>    
                                @break
                                @case('App\Models\Hotels')
                                    <span class="badge bg-success">Hotel</span> 
                                @break
                                @case('App\Models\Restaurants')
                                    <span class="badge bg-warning">Restaurant</span> 
                                @break
                                @case('App\Models\Activities')
                                    <span class="badge bg-info">Activity</span> 
                                @break
                                @case('App\Models\TravelMedia')
                                    <span class="badge bg-secondary">Travel</span>
                                @break
                                @default
                                    <span class="badge bg-secondary">Unidentified</span>

                            @endswitch
                        </td>
                        <td>{{ $item->item->name }}</td>
                        <td>{{ $item->notes }}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-outline-success btn-sm ms-1 btn_move_up"><i class="bx bx-caret-up"></i></button>
                                <button class="btn btn-outline-success btn-sm ms-1 btn_move_down"><i class="bx bx-caret-down"></i></button>
                                <button class="btn btn-outline-danger btn-sm ms-1 btn_delete_item"><i class="bx bx-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="border border-primary rounded p-2">
                
                <div class="d-flex gap-2 align-items-center">
                    <button class="btn btn-outline-primary ms-1 me-1 w-100" id="btn_locations">Locations</button>
                    <button class="btn btn-outline-primary ms-1 me-1 w-100" id="btn_hotels">Hotels</button>
                    <button class="btn btn-outline-primary ms-1 me-1 w-100" id="btn_restaurants">Restaurants</button>
                    <button class="btn btn-outline-primary ms-1 me-1 w-100" id="btn_activities">Activities</button>
                    <button class="btn btn-outline-primary ms-1 me-1 w-100" id="btn_travel">Travel</button>
                </div>

                {{-- Location --}}
                <div id="div_locations">
                    <form action="{{ route('route_items.location_store') }}" method="post">
                        @csrf
                        <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                        
                        <div class="row mt-2">
                            <h5>Locations</h5>
                            <div class="col-md-3">
                                <label for="">Day No</label>
                                <input type="number" name="loc_day_no" id="loc_day_no" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label for="">Select Location</label>
                                <select name="loc_cmb_locations" id="loc_cmb_locations" class="form-select"></select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Note</label>
                                {{-- <textarea name="loc_note" id="loc_note" cols="30" rows="3" class="form-control"></textarea> --}}
                                <input type="text" name="loc_note" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary float-end mt-4 w-100">Add Location</button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Hotels --}}
                <div id="div_hotels">
                    <form action="{{ route('route_items.hotel_store') }}" method="post">
                        @csrf
                        <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                        <div class="row mt-2">
                            <h5>Hotels</h5>
                            <div class="col-md-3">
                                <label for="">Day No</label>
                                <input type="number" name="hot_day_no" id="hot_day_no" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">Select Location</label>
                                <select name="hot_cmb_hotels" id="hot_cmb_hotels" class="form-select"></select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Note</label>
                                {{-- <textarea name="hot_note" id="hot_note" cols="30" rows="3" class="form-control"></textarea> --}}
                                <input type="text" name="hot_note" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary float-end mt-4 w-100">Add Hotel</button>
                            </div>
                        </div>
                        
                    </form>
                </div>

                {{-- Restaurants --}}
                <div id="div_restaurants">
                    <form action="{{ route('route_items.restaurant_store') }}" method="post">
                        @csrf
                        <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                        <div class="row mt-2">
                            <h5>Restaurants</h5>
                            <div class="col-md-3">
                                <label for="">Day No</label>
                                <input type="number" name="res_day_no" id="res_day_no" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">Select Location</label>
                                <select name="res_cmb_restaurants" id="res_cmb_restaurants" class="form-select"></select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Note</label>
                                {{-- <textarea name="res_note" id="res_note" cols="30" rows="3" class="form-control"></textarea> --}}
                                <input type="text" name="res_note" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary float-end mt-2 w-100">Add Restaurant</button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Activities --}}
                <div id="div_activities">
                    <form action="{{ route('route_items.activity_store') }}" method="post">
                        @csrf
                        <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                        <div class="row mt-2">
                            <h5>Activities</h5>
                            <div class="col-md-3">
                                <label for="">Day No</label>
                                <input type="number" name="act_day_no" id="act_day_no" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">Select Activity</label>
                                <select name="act_cmb_activities" id="act_cmb_activities" class="form-select"></select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Note</label>
                                {{-- <textarea name="act_note" id="act_note" cols="30" rows="3" class="form-control"></textarea> --}}
                                <input type="text" name="act_note" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary float-end mt-2 w-100">Add Activity</button>
                            </div>
                        </div>
                        
                    </form>
                </div>

                {{-- Travel --}}
                <div id="div_travel">
                    <form action="{{ route('route_items.travel_store') }}" method="post">
                        @csrf
                        <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                        <div class="row mt-2">
                            <h5>Travel Media</h5>
                            <div class="col-md-3">
                                <label for="">Day No</label>
                                <input type="number" name="tvl_day_no" id="tvl_day_no" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">Select Travel Media</label>
                                <select name="tvl_cmb_travel" id="tvl_cmb_travel" class="form-select"></select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Note</label>
                                <input type="text" name="tvl_note" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary float-end mt-2 w-100">Add Travel Media</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-2">
                <form action="{{ route('tour_package_items.index') }}" method="get">
                    @csrf
                    <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                    <button class="btn btn-primary float-end">Continue <i class="bx bx-"></i></button>
                </form>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/tour_route_items.js') }}"></script>
@endsection
