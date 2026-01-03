@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tour Route</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Day</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
                @foreach ($route_items as $item)
                    <tr>
                        <td>{{ $item->order_no }}</td>
                        <td>{{ "Day " . $item->day_no }}</td>
                        <td>
                            @switch($item->item_type)
                                @case('App\Models\Locations')
                                    <span class="badge bg-primary">Location</span>    
                                @break
                                @case(2)
                                    
                                @break
                                @default
                                    <span class="badge bg-secondary">Unidentified</span>
                                    
                            @endswitch
                        </td>
                        <td>{{ $item->item->name }}</td>
                        <td>{{ $item->notes }}</td>
                        <td>
                            <form action="{{ route('route_items.destroy') }}" method="post">
                                @csrf
                                <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                                <input type="hidden" name="route_item_id" value="{{ $item->id }}">
                                <button class="btn btn-outline-danger btn-sm"><i class="bx bx-trash"></i></button>
                            </form>
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

                <div id="div_locations" class="container container-md">
                    <form action="{{ route('route_items.location_store') }}" method="post">
                        @csrf
                        <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                        
                        <div class="row mt-2">
                            <h5>Locations</h5>
                            <div class="col-md-6">
                                <label for="">Day No</label>
                                <input type="number" name="loc_day_no" id="loc_day_no" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Select Location</label>
                                <select name="loc_cmb_locations" id="loc_cmb_locations" class="form-select"></select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Note</label>
                                <textarea name="loc_note" id="loc_note" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary float-end mt-2">Add Location</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/tour_route_items.js') }}"></script>
@endsection
