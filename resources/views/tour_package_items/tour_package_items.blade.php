@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tour Package Items</h5>
        </div>
        <div class="card-body" style="padding-bottom: 70px;">
            <div class="container container-md" id="div_main">
                <form action="{{ route('package_items.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                @foreach ($data as $item)
                    <div 
                        @switch($item['item_type'])
                            @case('App\Models\Locations')
                                class="card border-primary mb-2"
                            @break
                            @case('App\Models\Hotels')
                                class="card border-success mb-2"
                            @break
                            @case('App\Models\Restaurants')
                                class="card border-warning mb-2"
                            @break
                            @case('App\Models\Activities')
                                class="card border-info mb-2"
                            @break
                            @case('App\Models\TravelMedia')
                                class="card border-secondary mb-2"
                            @break
                        @endswitch    
                    >
                        <div 
                            @switch($item['item_type'])
                                @case('App\Models\Locations')
                                    class="card-header bg-primary text-white"
                                @break
                                @case('App\Models\Hotels')
                                    class="card-header bg-success text-white"
                                @break
                                @case('App\Models\Restaurants')
                                    class="card-header bg-warning text-white"
                                @break
                                @case('App\Models\Activities')
                                    class="card-header bg-info text-white"
                                @break
                                @case('App\Models\TravelMedia')
                                    class="card-header bg-secondary text-white"
                                @break
                            @endswitch
                        >
                            <h6>
                                {{ $item['name'] }}
                                <span class="badge bg-primary float-end">Day {{ $item['day_no'] }}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <p>{{ $item['notes'] }}</p>
                            @switch($item['item_type'])
                                @case('App\Models\Locations')
                                    @include('tour_package_items.location_package')
                                @break
                                @case('App\Models\Hotels')
                                    @include('tour_package_items.hotel_package')
                                @break
                                @case('App\Models\Restaurants')
                                    @include('tour_package_items.restaurant_package')
                                @break
                                @case('App\Models\Activities')
                                    @include('tour_package_items.activity_package')
                                @break
                                @case('App\Models\TravelMedia')
                                    @include('tour_package_items.travel_package')
                                @break
                                @default
                                    <span class="badge bg-danger">Undefined</span>
                                @break
                            @endswitch
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary float-end mb-6">Submit & Continue</button>
                </form>
            </div>

            <div id="div_totals" 
                style="position:fixed; 
                    bottom:0; 
                    padding:5px;
                    z-index:100; 
                    border-radius:10px;
                    width:80%; 
                    margin-left:10%;
                    color:white;
                    background-color: rgba(43, 55, 185, 1);"
                >
                <div style="display:flex; flex-direction:row; justify-content:space-around;">
                    <div>
                        Akagi Essential
                        <h5 id="h5_essential_total"></h5>
                    </div>
                    <div>
                        Akagi Classic
                        <h5 id="h5_classic_total"></h5>
                    </div>
                    <div>
                        Akagi Signature
                        <h5 id="h5_signature_total"></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/tour_package_items.js') }}"></script>
@endsection
