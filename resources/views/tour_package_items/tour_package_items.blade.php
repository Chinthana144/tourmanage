@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tour Package Items</h5>
        </div>
        <div class="card-body">
            <p>Route Items</p>
            <div class="container container-sm" id="div_main">
                @foreach ($route_items as $item)
                    <div class="card mb-2">
                        <div class="card-header">
                            <h6>
                                {{ $item->item->name }}
                                <span class="badge bg-primary float-end">Day {{ $item->day_no }}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <p>{{ $item->notes }}</p>
                            @switch($item->item_type)
                                @case('App\Models\Locations')
                                    <div class="row">
                                        <div class="col-md-4 p-1">
                                            standard
                                        </div>
                                        <div class="col-md-4 p-1">
                                            Comfort
                                        </div>
                                        <div class="col-md-4 p-1">
                                            Premium
                                        </div>
                                    </div>
                                @break
                                {{-- --------------------------------------- HOTELS ----------------------------------- --}}
                                @case('App\Models\Hotels')

                                {{-- Hotels --}}
                                <h5>
                                    {{ $item->item->name }} Hotel Packages
                                    <button type="button" class="btn btn-success btn-sm float-end btn_open_hotel" data-route-id="{{ $item->id }}">Toggle Hotel</button>
                                </h5>
                                <div id="div_hotel_packages_{{$item->id}}" class="mb-2 d-none">
                                    <ul class="nav nav-tabs" id="packageTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active"
                                                    id="standard-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#hot_standard_{{ $item->id }}"
                                                    type="button"
                                                    role="tab">
                                                Standard
                                            </button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link"
                                                    id="comfort-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#hot_comfort_{{ $item->id }}"
                                                    type="button"
                                                    role="tab">
                                                Comfort
                                            </button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link"
                                                    id="premium-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#hot_premium_{{ $item->id }}"
                                                    type="button"
                                                    role="tab">
                                                Premium
                                            </button>
                                        </li>
                                    </ul>

                                    <div class="tab-content mt-3" id="packageTabsContent">
                                        <!-- Standard Akagi Essential -->
                                        <div class="tab-pane fade show active" id="hot_standard_{{ $item->id }}" role="tabpanel">
                                            @php
                                                $tour_hotel = \App\Models\TourHotels::where('tour_route_item_id', $item->id)
                                                    ->where('tour_package_id', 1)
                                                    ->where('hotel_id', $item->item->id)
                                                    ->first();
                                                
                                                $boarding_type_id = $tour_hotel->boarding_type_id ?? 0;
                                                    
                                                if($tour_hotel && !empty($tour_hotel->facilities))
                                                {
                                                    $tour_hote_id = $tour_hotel->id;
                                                    $check_in_date = $tour_hotel->check_in_date;
                                                    $check_out_date = $tour_hotel->check_out_date;
                                                    $nights = $tour_hotel->nights;
                                                    $hotel_facilities = json_decode($tour_hotel->facilities, true);
                                                }
                                                else
                                                {
                                                    $hotel_facilities = [];
                                                }
                                            @endphp

                                            <button class="btn btn-success btn_add_hotel_price" data-route-id="{{ $item->id }}" data-package-id="1" data-hotel-id="{{ $item->item->id }}" {{ $tour_hotel ? 'disabled' : '' }}>Add Tour Hotel</button>
                                        
                                            @if ($tour_hotel && !empty($tour_hotel->facilities))
                                                <form action="{{ route('tour_hotel.update') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="tour_hotel_id" value="{{ $item->item->id }}">
                                                    <input type="hidden" name="hot_tour_route_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="hot_package_id" value="1">
                                                    <input type="hidden" name="hot_hotel_id" value="{{ $item->item->id  }}">

                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label for="">Boarding Type</label>
                                                            <select name="cmb_boarding_type" id="cmb_boarding_type" class="form-select">
                                                                @foreach ($boarding_types as $boarding_type)
                                                                    <option value="{{ $boarding_type->id }}" @selected($boarding_type->id == $boarding_type_id)>{{ $boarding_type->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            <label for="">Nights</label>
                                                            <input type="number" name="nights" class="form-control" placeholder="Number of Nights" value="{{ $nights }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="">Check-in Date</label>
                                                            <input type="date" name="check_in_date" class="form-control" placeholder="Check-in Date">
                                                            
                                                            <label for="">Check-out Date</label>
                                                            <input type="date" name="check_out_date" class="form-control" placeholder="Check-out Date">                                
                                                        </div>
                                                    </div>

                                                    <div class="row mt-2 mb-2">
                                                        @foreach ($hotel_facilities as $facility)
                                                            <div class="col-md-4">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="chk_hotel_facility_{{$facility['facility_id']}}" name="chk_hotel_facility_{{$facility['facility_id']}}" @checked($facility['status'] == 1)>
                                                                    <label class="form-check-label" for="chk_hotel_facility_{{$facility['facility_id']}}">{{ $facility['facility_name'] }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                </form>
                                            @endif
                                            
                                        </div>

                                        <!-- Comfort Akagi classics -->
                                        <div class="tab-pane fade" id="hot_comfort_{{ $item->id }}" role="tabpanel">
                                            @php
                                                $tour_hotel = \App\Models\TourHotels::where('tour_route_item_id', $item->id)
                                                    ->where('tour_package_id', 2)
                                                    ->where('hotel_id', $item->item->id)
                                                    ->first();
                                                
                                                $boarding_type_id = $tour_hotel->boarding_type_id ?? 0;
                                                    
                                                if($tour_hotel && !empty($tour_hotel->facilities))
                                                {
                                                    $tour_hote_id = $tour_hotel->id;
                                                    $check_in_date = $tour_hotel->check_in_date;
                                                    $check_out_date = $tour_hotel->check_out_date;
                                                    $nights = $tour_hotel->nights;
                                                    $hotel_facilities = json_decode($tour_hotel->facilities, true);
                                                }
                                                else
                                                {
                                                    $hotel_facilities = [];
                                                }
                                            @endphp

                                            <button class="btn btn-success btn_add_hotel_price" data-route-id="{{ $item->id }}" data-package-id="2" data-hotel-id="{{ $item->item->id }}" {{ $tour_hotel ? 'disabled' : '' }}>Add Tour Hotel</button>
                                        
                                            @if ($tour_hotel && !empty($tour_hotel->facilities))
                                                <form action="{{ route('tour_hotel.update') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="tour_hotel_id" value="{{ $tour_hote_id }}">
                                                    <input type="hidden" name="hot_tour_route_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="hot_package_id" value="1">
                                                    <input type="hidden" name="hot_hotel_id" value="{{ $item->item->id  }}">

                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label for="">Boarding Type</label>
                                                            <select name="cmb_boarding_type" id="cmb_boarding_type" class="form-select">
                                                                @foreach ($boarding_types as $boarding_type)
                                                                    <option value="{{ $boarding_type->id }}" @selected($boarding_type->id == $boarding_type_id)>{{ $boarding_type->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            <label for="">Nights</label>
                                                            <input type="number" name="nights" class="form-control" placeholder="Number of Nights" value="{{ $nights }}" required>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="">Check-in Date</label>
                                                            <input type="date" name="check_in_date" class="form-control" placeholder="Check-in Date" value="{{ $check_in_date }}" required>
                                                            
                                                            <label for="">Check-out Date</label>
                                                            <input type="date" name="check_out_date" class="form-control" placeholder="Check-out Date" value="{{ $check_out_date }}" required>                                
                                                        </div>
                                                    </div>

                                                    <div class="row mt-2 mb-2">
                                                        @foreach ($hotel_facilities as $facility)
                                                            <div class="col-md-4">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="chk_hotel_facility_{{$facility['facility_id']}}" name="chk_hotel_facility_{{$facility['facility_id']}}" @checked($facility['status'] == 1)>
                                                                    <label class="form-check-label" for="chk_hotel_facility_{{$facility['facility_id']}}">{{ $facility['facility_name'] }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                </form>
                                            @endif
                                            
                                        </div>

                                        <!-- Premium Akagi Signature -->
                                        <div class="tab-pane fade" id="hot_premium_{{ $item->id }}" role="tabpanel">
                                            <h5>Premium Hotel Package</h5>
                                            <p>Luxury hotels, private guide, premium experiences.</p>

                                            {{-- @include('tour.packages.premium') --}}
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                {{-- ROOMS --}}
                                <h5>
                                    Room Packages
                                    <button type="button" class="btn btn-success btn-sm float-end btn_open" data-route-id="{{ $item->id }}">Toggle Rooms</button>
                                </h5>
                                <div id="div_room_packages_{{ $item->id }}" class="mb-3 d-none">
                                    <ul class="nav nav-tabs" id="packageTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active"
                                                    id="standard-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#room_standard_{{ $item->id }}"
                                                    type="button"
                                                    role="tab">
                                                Standard
                                            </button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link"
                                                    id="comfort-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#room_comfort_{{ $item->id }}"
                                                    type="button"
                                                    role="tab">
                                                Comfort
                                            </button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link"
                                                    id="premium-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#room_premium_{{ $item->id }}"
                                                    type="button"
                                                    role="tab">
                                                Premium
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-3" id="packageTabsContent">
                                        <!-- Standard -->
                                        <div class="tab-pane fade show active" id="room_standard_{{ $item->id }}" role="tabpanel">
                                            <h6>Requested Room Composition</h6>
                                            <table class="table">
                                                <tr>
                                                    <th>Composition</th>
                                                    <th>Adults</th>
                                                    <th>Children</th>
                                                    <th>Extra bed price</th>
                                                    <th>Room Qty</th>
                                                    <th>Actions</th>
                                                </tr>
                                                @foreach ($tour_request->tourRequestPeople as $people)
                                                <tr>   
                                                    <td>{{ $people->groupComposition->name }}</td>
                                                    <td>{{ $people->adults }}</td>
                                                    <td>{{ $people->children }}</td>
                                                    <td>{{ $people->extra_bed ? "Yes" : "No" }}</td>
                                                    <td>{{ $people->quantity }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm btn_add_room_price" data-route-id="{{ $item->id }}" data-package-id="1" data-tour-people-id="{{ $people->id }}">Add Price</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                            @php
                                                $cmt_rooms = \App\Models\TourRooms::where('tour_route_item_id', $item->id)
                                                    ->where('tour_hotel_id', $item->item->id)
                                                    ->where('tour_package_id', 1)
                                                    ->get();
                                            @endphp
                                            <h6>
                                                Added Rooms - {{ $cmt_rooms->count() }}
                                            </h6>
                                            <table class="table">
                                                <tr>
                                                    <th>Room type</th>
                                                    <th>Bed type</th>
                                                    <th>Adults</th>
                                                    <th>Children</th>
                                                    <th>Extra bed price</th>
                                                    <th>Price per night</th>
                                                    <th>Actions</th>
                                                </tr>
                                                @foreach ($cmt_rooms as $room)
                                                    <tr>
                                                        <td>{{ $room->roomType->name }}</td>
                                                        <td>{{ $room->bedType->name }}</td>
                                                        <td>{{ $room->base_adults }}</td>
                                                        <td>{{ $room->base_children }}</td>
                                                        <td>{{ $room->extra_bed_price }}</td>
                                                        <td>{{ $room->price_per_night }}</td>
                                                        <td>
                                                            {{-- <button type="button" class="btn btn-danger btn-sm btn_remove_room_price" data-room-id="{{ $room->id }}">Remove</button> --}}
                                                            <form action="{{ route('tour_request_room.destroy') }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                                                                <input type="hidden" name="hide_room_id" value="{{ $room->id }}">
                                                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bx bx-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>

                                        <!-- Comfort -->
                                        <div class="tab-pane fade" id="room_comfort_{{ $item->id }}" role="tabpanel">
                                            <h5>Comfort Rooms Package</h5>
                                            <table class="table">
                                                <tr>
                                                    <th>Composition</th>
                                                    <th>Adults</th>
                                                    <th>Children</th>
                                                    <th>Extra bed price</th>
                                                    <th>Room Qty</th>
                                                    <th>Actions</th>
                                                </tr>
                                                @foreach ($tour_request->tourRequestPeople as $people)
                                                <tr>   
                                                    <td>{{ $people->groupComposition->name }}</td>
                                                    <td>{{ $people->adults }}</td>
                                                    <td>{{ $people->children }}</td>
                                                    <td>{{ $people->extra_bed ? "Yes" : "No" }}</td>
                                                    <td>{{ $people->quantity }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm btn_add_room_price" data-route-id="{{ $item->id }}" data-package-id="2" data-tour-people-id="{{ $people->id }}">Add Price</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                            @php
                                                $cmt_rooms = \App\Models\TourRooms::where('tour_route_item_id', $item->id)
                                                    ->where('tour_hotel_id', $item->item->id)
                                                    ->where('tour_package_id', 2)
                                                    ->get();
                                            @endphp
                                            <h6>
                                                Added Rooms - {{ $cmt_rooms->count() }}
                                            </h6>
                                            <table class="table">
                                                <tr>
                                                    <th>Room type</th>
                                                    <th>Bed type</th>
                                                    <th>Adults</th>
                                                    <th>Children</th>
                                                    <th>Extra bed price</th>
                                                    <th>Price per night</th>
                                                    <th>Actions</th>
                                                </tr>
                                                @foreach ($cmt_rooms as $room)
                                                    <tr>
                                                        <td>{{ $room->roomType->name }}</td>
                                                        <td>{{ $room->bedType->name }}</td>
                                                        <td>{{ $room->base_adults }}</td>
                                                        <td>{{ $room->base_children }}</td>
                                                        <td>{{ $room->extra_bed_price }}</td>
                                                        <td>{{ $room->price_per_night }}</td>
                                                        <td>
                                                            {{-- <button type="button" class="btn btn-danger btn-sm btn_remove_room_price" data-room-id="{{ $room->id }}">Remove</button> --}}
                                                            <form action="" method="post">
                                                                @csrf
                                                                <input type="hidden" name="hide_room_id" value="{{ $room->id }}">
                                                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bx bx-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>

                                        <!-- Premium -->
                                        <div class="tab-pane fade" id="room_premium_{{ $item->id }}" role="tabpanel">
                                            <h5>Premium Package</h5>
                                            <table class="table">
                                                <tr>
                                                    <th>Composition</th>
                                                    <th>Adults</th>
                                                    <th>Children</th>
                                                    <th>Extra bed price</th>
                                                    <th>Room Qty</th>
                                                    <th>Actions</th>
                                                </tr>
                                                @foreach ($tour_request->tourRequestPeople as $people)
                                                <tr>   
                                                    <td>{{ $people->groupComposition->name }}</td>
                                                    <td>{{ $people->adults }}</td>
                                                    <td>{{ $people->children }}</td>
                                                    <td>{{ $people->extra_bed ? "Yes" : "No" }}</td>
                                                    <td>{{ $people->quantity }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm btn_add_room_price" data-route-id="{{ $item->id }}" data-package-id="3" data-tour-people-id="{{ $people->id }}">Add Price</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                            @php
                                                $cmt_rooms = \App\Models\TourRooms::where('tour_route_item_id', $item->id)
                                                    ->where('tour_hotel_id', $item->item->id)
                                                    ->where('tour_package_id', 3)
                                                    ->get();
                                            @endphp
                                            <h6>
                                                Added Rooms - {{ $cmt_rooms->count() }}
                                            </h6>
                                            <table class="table">
                                                <tr>
                                                    <th>Room type</th>
                                                    <th>Bed type</th>
                                                    <th>Adults</th>
                                                    <th>Children</th>
                                                    <th>Extra bed price</th>
                                                    <th>Price per night</th>
                                                    <th>Actions</th>
                                                </tr>
                                                @foreach ($cmt_rooms as $room)
                                                    <tr>
                                                        <td>{{ $room->roomType->name }}</td>
                                                        <td>{{ $room->bedType->name }}</td>
                                                        <td>{{ $room->base_adults }}</td>
                                                        <td>{{ $room->base_children }}</td>
                                                        <td>{{ $room->extra_bed_price }}</td>
                                                        <td>{{ $room->price_per_night }}</td>
                                                        <td>
                                                            {{-- <button type="button" class="btn btn-danger btn-sm btn_remove_room_price" data-room-id="{{ $room->id }}">Remove</button> --}}
                                                            <form action="" method="post">
                                                                @csrf
                                                                <input type="hidden" name="hide_room_id" value="{{ $room->id }}">
                                                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bx bx-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                @break
                                @case('App\Models\Restaurants')
                                    <span class="badge bg-warning">Restaurant</span>
                                @break
                                @case('App\Models\Activities')
                                    <ul class="nav nav-tabs" id="packageTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active"
                                                    id="standard-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#standard"
                                                    type="button"
                                                    role="tab">
                                                Standard
                                            </button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link"
                                                    id="comfort-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#comfort"
                                                    type="button"
                                                    role="tab">
                                                Comfort
                                            </button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link"
                                                    id="premium-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#premium"
                                                    type="button"
                                                    role="tab">
                                                Premium
                                            </button>
                                        </li>
                                    </ul>

                                    <div class="tab-content mt-3" id="packageTabsContent">
                                        <!-- Standard -->
                                        <div class="tab-pane fade show active" id="standard" role="tabpanel">
                                            <h5>Standard Package</h5>
                                            <p>Basic hotels, shared transport, standard meals.</p>

                                            {{-- You can load blade partial here --}}
                                            {{-- @include('tour.packages.standard') --}}
                                        </div>

                                        <!-- Comfort -->
                                        <div class="tab-pane fade" id="comfort" role="tabpanel">
                                            <h5>Comfort Package</h5>
                                            <p>3 to 4 star hotels, private transport, upgraded meals.</p>

                                            {{-- @include('tour.packages.comfort') --}}
                                        </div>

                                        <!-- Premium -->
                                        <div class="tab-pane fade" id="premium" role="tabpanel">
                                            <h5>Premium Package</h5>
                                            <p>Luxury hotels, private guide, premium experiences.</p>

                                            {{-- @include('tour.packages.premium') --}}
                                        </div>
                                    </div>

                                @break
                                @case('App\Models\TravelMedia')
                                    <span class="badge bg-secondary">Travel</span>
                                @break
                                @default
                                    <span class="badge bg-danger">Undefined</span>
                                @break
                            @endswitch
                        </div>
                    </div>
                @endforeach

                <h5>
                    Quotation Generate
                </h5>
                <form action="{{ route('tour_package_items.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="tour_request_id" value="{{ $tour_request->id }}">
                    <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Valid Date</label>
                            <input type="date" name="valid_date" id="valid_date" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary mt-4 w-100">Generate</button>
                        </div>
                        
                        
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    @include('tour_package_items.room_add_modal')
    @include('tour_package_items.hotel_add_modal')

    <script src="{{ asset('js/tour_package_items.js') }}"></script>
@endsection
