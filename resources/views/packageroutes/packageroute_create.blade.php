@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ $package->title }} - Route</h5>
        </div>
        <div class="card-body">
            
            @if ($package_route)
            <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Day</th>
                        <th>Type</th>
                        <th>Place</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </tr>
                @foreach ($package_route as $route)
                    <tr>
                        <td>{{$route->order_no}}</td>
                        <td>Day {{$route->day_no}}</td>
                        <td>{{$route->stoppable_type}}</td>
                        @if ($route->stoppable_type == 'location')
                            <td>{{$route->stoppable->name}}</td>
                        @else
                            <td>{{$route->stoppable->name}}</td>
                        @endif
                        
                        <td>{{$route->stay_duration}} days</td>
                        <td>
                            <form action="{{ route('packageroute.delete') }}" method="post">
                                @csrf
                                <input type="hidden" name="hide_package_id" value="{{ $package->id }}">
                                <input type="hidden" name="hide_route_id" value="{{ $route->id }}">
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bx bx-trash"></i></button>
                            </form>
                        </td>
                    </tr> 
                @endforeach  
            </table>
                            
            @endif

            <form action="{{ route('packageroute.store') }}" method="post">
                @csrf
                <input type="hidden" name="hide_package_id" value="{{ $package->id }}">
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Day Count</label>
                        <select name="cmb_days" id="cmb_days" class="form-select">
                            @for ($i = 1; $i <= $package->duration_days; $i++)
                                <option value="{{ $i }}">Day {{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="">Place Type</label>
                        <select name="cmb_stoppable_type" id="cmb_stoppable_type" class="form-select">
                            <option value="0">--- Select Type ---</option>
                            <option value="location">Location</option>
                            <option value="hotel">Hotel</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Place</label>
                        <select name="cmb_stoppable" id="cmb_stoppable" class="form-select">
                            <option value="0">--- select type ---</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">Stay Duration(days)</label>
                        <input type="number" name="stay_duration" class="form-control" placeholder="duration">
                    </div>
                    <div class="col-md-2">
                        <label for="">Actions</label>
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="bx bx-plus"></i> Add</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script src="{{ asset('js/package_route.js') }}"></script>
@endsection
