@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create Tour Route</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Day No</th>
                    <th>Route Type</th>
                    <th>Route Name</th>
                    <th>Adult Price</th>
                    <th>Child Price</th>
                    <th>Line Total</th>
                    <th>Action</th>
                </tr>
                @foreach ($routes as $route)
                    <tr>
                        <td>{{ $route->order_no }}</td>
                        <td>Day {{ $route->day_no }}</td>
                        <td>
                            @switch($route->routable_type)
                                @case('App\Models\Locations')
                                    Location
                                    @break
                                @case('App\Models\Hotels')
                                    Hotel
                                    @break
                                @case('App\Models\Meals')
                                    Restaurant Meal
                                    @break
                                @case('App\Models\Activities')
                                    Activity
                                    @break
                                @case('App\Models\Travel')
                                    Travel
                                    @break
                                @default
                                    
                            @endswitch
                        </td>
                        <td>{{ $route->routable->name }}</td>
                        <td>{{ $route->price_adult }}</td>
                        <td>{{ $route->price_adult }}</td>
                        <td>{{ $route->price_adult }}</td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="hide_route_id" value="{{ $route->id }}">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="border border-primary rounded p-2">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Select Type</label>
                        <select name="cmb_routeble_type" id="cmb_routeble_type" class="form-select">
                            <option value="0">--- Select Routable Type ---</option>
                            <option value="location">Location</option>
                            <option value="hotel">Hotel</option>
                            <option value="restaurants">Restaurant</option>
                            <option value="activities">Activities</option>
                            <option value="travel">Travel</option>
                        </select>
                    </div>
                    <div class="col-md-9">
                        {{-- div Locations --}}
                        <div id="div_locations">
                            <h5 class="mt-2">Locations</h5>
                            <form action="{{ route('tour_route.location_store') }}" method="post">
                                @csrf
                                <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Day No</label>
                                        <input type="number" name="loc_day_no" id="loc_day_no" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Select Location</label>
                                        <select name="loc_cmb_locations" id="loc_cmb_locations" class="form-select"></select>
                                    </div>
                                </div>
                                <button class="btn btn-primary float-end mt-2">Add Location</button>
                            </form>
                        </div>
                        {{-- div Locations --}}

                        {{-- div activities --}}
                        <div id="div_activities">
                            <form action="{{ route('tour_route.activity_store') }}" method="post">
                                @csrf
                                <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                                <input type="hidden" name="act_num_adult" id="act_num_adult" value="{{ $tour->adults }}">
                                <input type="hidden" name="act_num_children" id="act_num_children" value="{{ $tour->children ?? 0 }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="mt-2">Activities</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Day No</label>
                                        <input type="number" name="act_day_no" id="act_day_no" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Select Location</label>
                                        <select name="cmb_locations" id="cmb_locations" class="form-select"></select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Select Activity</label>
                                        <select name="cmb_activities" id="cmb_activities" class="form-select"></select>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Price per Adult</label>
                                        <input type="number" step="0.01" name="act_price_per_adult" id="act_price_per_adult" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Price per Child</label>
                                        <input type="number" step="0.01" name="act_price_per_child" id="act_price_per_child" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Total Price for Adults</label>
                                        <input type="number" step="0.01" name="act_total_price_adult" id="act_total_price_adult" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Total Price for Children</label>
                                        <input type="number" step="0.01" name="act_total_price_child" id="act_total_price_child" class="form-control" readonly>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-end mt-2">Add to Route</button>
                            </form>
                        </div>
                        
                        {{-- div activities --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/tour_route.js') }}"></script>
@endsection
