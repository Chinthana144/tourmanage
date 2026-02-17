@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tour Package Items</h5>
        </div>
        <div class="card-body">
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

                <button type="submit" class="btn btn-primary float-end">Submit & Continue</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/tour_package_items.js') }}"></script>
@endsection
