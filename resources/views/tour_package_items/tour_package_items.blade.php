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
                                @case('App\Models\Hotels')
                                    
                                    <div class="row">
                                        <div class="col-md-4 p-1">
                                            <div class="border border-success rounded p-1">
                                                <h5>Hotel</h5>
                                                <label for="">Boarding Type</label>
                                                <select name="std_boarding_type" id="std_boarding_type" class="form-select">
                                                    @foreach ($boarding_types as $boarding_type)
                                                        <option value="{{ $boarding_type->id }}">{{ $boarding_type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="border border-success rounded p-1 mt-2">
                                                <h5>
                                                    Rooms
                                                </h5>
                                                <div>
                                                    @foreach ($tour_request->tourRequestPeople as $people)
                                                    <div class="d-flex justify-content-between">
                                                        <p>
                                                            {{ $people->groupComposition->name }} <br>
                                                            Adults: {{ $people->adults }} <br>
                                                            Children: {{ $people->children }}
                                                        </p>
                                                        <p>
                                                            Extra Bed: {{ $people->extra_bed ? "Yes": "No" }} <br>
                                                            Rooms: {{ $people->quantity }}
                                                        </p>
                                                        <button type="button" class="btn btn-success btn-sm btn_add_room_price" data-route-id="{{ $item->id }}" data-package-id="1" data-tour-people-id="{{ $people->id }}">Add Price</button>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="col-md-6">
                                                    {{ $item->item->tourRooms->count() }} Rooms Added
                                                    @foreach ($item->item->tourRooms as $room)
                                                        <p>
                                                            {{ $room->roomType->name }} <br>
                                                            {{ $room->bedType->name }} <br>
                                                            Adults: {{ $room->base_adults }} <br>
                                                            Children: {{ $room->base_children }} <br>
                                                            Extra Bed Price: {{ $room->extra_bed_price }} <br>
                                                            Price per night: {{ $room->price_per_night }} <br>
                                                        </p>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4 p-1">
                                            <div class="border border-success rounded p-1">
                                                comfort
                                            </div>
                                        </div>
                                        <div class="col-md-4 p-1">
                                            <div class="border border-success rounded p-1">
                                                Premium
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
            </div>
        </div>
    </div>

    @include('tour_package_items.room_add_modal')

    <script src="{{ asset('js/tour_package_items.js') }}"></script>
@endsection
