@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create Tour Route</h5>
        </div>
        <div class="card-body">
            <table class="table" id="tbl_tour_route">
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
                    <tr data-id='{{ $route->id }}'>
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
                                @case('App\Models\Restaurants')
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
                        <td>{{ $route->total_price_adult }}</td>
                        <td>{{ $route->total_price_child }}</td>
                        <td>{{ $route->line_total }}</td>
                        <td>
                            <div class="d-flex gap-2 align-items-center">
                                <button class="btn btn-info btn-sm btn_open_info"><i class="bx bx-tab"></i></button>
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
                        <button class="btn btn-outline-primary mt-2 mb-2 w-100" id="btn_show_location">Location</button>
                        <button class="btn btn-outline-primary mt-2 mb-2 w-100" id="btn_show_hotel">Hotel</button>
                        <button class="btn btn-outline-primary mt-2 mb-2 w-100" id="btn_show_restaurant">Restaurant</button>
                        <button class="btn btn-outline-primary mt-2 mb-2 w-100" id="btn_show_activities">Activities</button>
                        <button class="btn btn-outline-primary mt-2 mb-2 w-100" id="btn_show_travel">Travel</button>

                        <p>
                            Arrival: <b>{{ $tour->start_date }}</b><br>
                            Return: <b>{{ $tour->end_date }}</b>
                        </p>
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
                                    <div class="col-md-12">
                                        <label for="">Select Location</label>
                                        <textarea name="loc_note" id="loc_note" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary float-end mt-2">Add Location</button>
                            </form>
                        </div>
                        {{-- div Locations --}}

                        {{-- div Hotels --}}
                        <div id="div_hotels">
                            <form action="{{ route('tour_route.hotel_store') }}" method="post">
                                @csrf
                                <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                                <input type="hidden" name="hot_tour_request_id" id="hot_tour_request_id" value="{{ $tour_request->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="mt-2">Hotels & Rooms</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Day No</label>
                                        <input type="number" name="hot_day_no" id="hot_day_no" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="">Hotels</label>
                                        <select name="cmb_hotels" id="cmb_hotels" class="form-select"></select>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="">Boarding type</label>
                                        <select name="hot_boarding_type" id="hot_boarding_type" class="form-select"></select>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="">Check in date</label>
                                        <input type="date" name="hot_checkin_date" id="hot_checkin_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="">Check out date</label>
                                        <input type="date" name="hot_checkout_date" id="hot_checkout_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="">Number of Nights</label>
                                        <input type="number" name="hot_num_nights" id="hot_num_nights" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="">Notes</label>
                                        <input type="text" name="hot_note" id="hot_note" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-12 mt-2">
                                        <h6>
                                            Customer Requested Rooms
                                            <button type="button" class="btn btn-primary float-end btn-sm" id="btn_open_add_room">Add Room</button>
                                        </h6>
                                    </div>
                                    {{-- rooms loaded by jQuery,  --}}
                                    <div class="col-md-12 mt-2" id="hot_div_rooms"></div>

                                </div>
                                <button class="btn btn-primary float-end mt-3">Add Hotel & Rooms</button>
                            </form>
                        </div>
                        {{-- div Hotels --}}

                        {{-- div restaurants --}}
                        <div id="div_restaurants">
                            <form action="{{ route('tour_route.restaurant_store') }}" method="post">
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
                                    <div class="col-md-12 mt-2">
                                        <label for="">Note</label>
                                        <textarea name="act_note" id="act_note" cols="30" rows="3" class="form-control"></textarea>
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
                                        <label for="">Select End Type</label>
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

    @include('tour_routes.room_add_modal')
    @include('tour_routes.room_edit_modal')
    @include('tour_routes.route_info_modal')
@endsection
