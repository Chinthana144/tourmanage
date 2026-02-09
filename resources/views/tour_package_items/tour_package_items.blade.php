@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tour Package Items</h5>
        </div>
        <div class="card-body">
            <div class="container container-md" id="div_main">
                @foreach ($data as $item)
                    <div class="card mb-2">
                        <div class="card-header">
                            <h6>
                                {{ $item['name'] }}
                                <span class="badge bg-primary float-end">Day {{ $item['day_no'] }}</span>
                            </h6>
                        </div>
                        <div class="card-body" id="card_route_items">
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

    <script src="{{ asset('js/tour_package_items.js') }}"></script>
@endsection
