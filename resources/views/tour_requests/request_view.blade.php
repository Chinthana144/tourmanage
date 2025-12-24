@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tour Requests</h5>
        </div>
        <div class="card-body">
            <table class="table" id="tbl_requests">
                <tr>
                    <th>Customer</th>
                    <th>Start Date</th>
                    <th>Return Date</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Budget</th>
                    <th>Pourpose</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($all_requests as $request)
                    <tr data-id="{{ $request->id }}">
                        <td>{{ $request->customer->first_name . " " . $request->customer->last_name}}</td>
                        <td>{{ $request->travel_date }}</td>
                        <td>{{ $request->return_date }}</td>
                        <td>{{ $request->adults }}</td>
                        <td>{{ $request->children }}</td>
                        <td>{{ $request->budget }}</td>
                        <td>{{ $request->tour_pourpose }}</td>
                        <td>
                            @if ($request->status == 1)
                                <label for="" class="badge bg-primary">Pending</label>
                            @elseif ($request->status == 2)
                                <label for="" class="badge bg-success">Approved</label>
                            @elseif ($request->status == 3)
                                <label for="" class="badge bg-danger">Rejected</label>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <form action="{{ route('tour_request_rooms.index') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="tour_request_id" value="{{ $request->id }}">
                                    <button type="submit" class="btn btn-success btn-sm me-1">Rooms</button>
                                </form>
                                
                                <button class="btn btn-success btn-sm btn_show_locations me-1">Locations</button>
                                <button class="btn btn-warning btn-sm btn_edit_request"><i class="bx bx-edit"></i></button>

                                <form action="" method="get">
                                    @csrf
                                    <input type="hidden" name="tour_request_id" value="{{ $request->id }}">
                                    <button class="btn btn-primary btn-sm ms-1"><i class="bx bx-plus"></i> Tours</button>
                                </form>
                            </div>
                        </td>
                    </tr>                    
                @endforeach
            </table>
        </div>
    </div>

    @include('tour_requests.request_edit_modal')
    

    <script src="{{ asset('js/tour_request.js') }}"></script>
@endsection
