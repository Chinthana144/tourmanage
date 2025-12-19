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
                                @case('App\Models\TravelMedia')
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
                            <div class="d-flex gap-2 align-items-center">
                                <form action="{{ route('tour_route.order_up') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                                    <input type="hidden" name="hide_route_id" value="{{ $route->id }}">
                                    <button class="btn btn-success btn-sm"><i class="bx bx-caret-up"></i></button>
                                </form>
                                <form action="{{ route('tour_route.order_down') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                                    <input type="hidden" name="hide_route_id" value="{{ $route->id }}">
                                    <button class="btn btn-success btn-sm"><i class="bx bx-caret-down"></i></button>
                                </form>
                                <form action="{{ route('tour_route.destroy') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                                    <input type="hidden" name="hide_route_id" value="{{ $route->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></button>
                                </form>
                            </div>
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

                        {{-- div restaurants --}}
                        <div id="div_restaurants">
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                                <input type="hidden" name="res_num_adult" id="res_num_adult" value="{{ $tour->adults }}">
                                <input type="hidden" name="res_num_children" id="res_num_children" value="{{ $tour->children ?? 0 }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="mt-2">Restaurants</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Day No</label>
                                        <input type="number" name="res_day_no" id="res_day_no" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Select Restaurant</label>
                                        <select name="cmb_restaurants" id="cmb_restaurants" class="form-select"></select>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Select meal type</label>
                                        <select name="res_meal_type" id="res_meal_type" class="form-select"></select>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Meal Name</label>
                                        <input type="text" name="res_meal_name" id="res_meal_name" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Meal description</label>
                                        <input type="text" name="res_meal_description" id="res_meal_description" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Price per adult</label>
                                        <input type="number" step="0.01" name="res_price_per_adult" id="res_price_per_adult" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Price per child</label>
                                        <input type="number" step="0.01" name="res_price_per_child" id="res_price_per_child" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Total price adult</label>
                                        <input type="number" step="0.01" name="res_total_price_adult" id="res_total_price_adult" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Total price child</label>
                                        <input type="number" step="0.01" name="res_total_price_child" id="res_total_price_child" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Total price</label>
                                        <input type="number" step="0.01" name="res_total_price" id="res_total_price" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Note</label>
                                        <input type="text" name="res_note" id="res_note" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Opening time</label>
                                        <input type="time" name="res_open_time" id="res_open_time" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Closing time</label>
                                        <input type="time" name="res_close_time" id="res_close_time" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-end mt-2">Add Restaurant Meal</button>
                            </form>
                        </div>
                        {{-- div restaurants --}}

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

                        {{-- div travel --}}
                        <div id="div_travel">
                            <form action="{{ route('tour_route.travel_store') }}" method="post">
                                @csrf
                                <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="mt-2">Tour Travel</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Day No</label>
                                        <input type="number" name="tvl_day_no" id="tvl_day_no" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Select Start Type</label>
                                        <select name="tvl_start_type" id="tvl_start_type" class="form-select">
                                            <option value="0">--- Select Start Type ---</option>
                                            <option value="1">Location</option>
                                            <option value="2">Hotel</option>
                                            <option value="3">Restaurant</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Select end place</label>
                                        <select name="tvl_start_place" id="tvl_start_place" class="form-select"></select>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="">Select start type</label>
                                        <select name="tvl_end_type" id="tvl_end_type" class="form-select">
                                            <option value="0">--- Select Start Type ---</option>
                                            <option value="1">Location</option>
                                            <option value="2">Hotel</option>
                                            <option value="3">Restaurant</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Select end place</label>
                                        <select name="tvl_end_place" id="tvl_end_place" class="form-select"></select>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Select travel media</label>
                                        <select name="tvl_cmb_media" id="tvl_cmb_media" class="form-select"></select>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Price per Km</label>
                                        <input type="number" name="tvl_price_per_km" id="tvl_price_per_km" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Distance (Km)</label>
                                        <input type="number" name="tvl_distance_km" id="tvl_distance_km" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Duration (Minutes)</label>
                                        <input type="number" name="tvl_duration_minutes" id="tvl_duration_minutes" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Price</label>
                                        <input type="number" name="tvl_price" id="tvl_price" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Note</label>
                                        <input type="text" name="tvl_note" id="tvl_note" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Add Tour Travel</button>
                            </form>
                        </div>
                        {{-- div travel --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/tour_route.js') }}"></script>
@endsection
