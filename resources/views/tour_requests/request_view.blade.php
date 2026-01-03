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
                    <th>Purpose</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Budget</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($all_requests as $request)
                    <tr data-id="{{ $request->id }}">
                        <td>{{ $request->customer->first_name . " " . $request->customer->last_name}}</td>
                        <td>{{ $request->travel_date }}</td>
                        <td>{{ $request->return_date }}</td>
                        <td>{{ $request->tourPurpose->name }}</td>
                        <td>{{ $request->total_adults }}</td>
                        <td>{{ $request->total_children }}</td>
                        <td>{{ $request->budget }}</td>
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
                                <form action="{{ route('tour_request_people.index') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="tour_request_id" value="{{ $request->id }}">
                                    <button type="submit" class="btn btn-success btn-sm btn_show_locations me-1">People</button>
                                </form>
                                <form action="{{ route('tour_request_location.index') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="tour_request_id" value="{{ $request->id }}">
                                    <button type="submit" class="btn btn-success btn-sm btn_show_locations me-1">Locations</button>
                                </form>
                            
                                <button class="btn btn-warning btn-sm btn_edit_request"><i class="bx bx-edit"></i></button>

                                <button class="btn btn-primary btn-sm ms-1 btn_add_tour"><i class="bx bx-plus"></i> New Tour</button>
                            </div>
                        </td>
                    </tr>                    
                @endforeach
            </table>
        </div>
    </div>

    @include('tour_requests.request_edit_modal')
    @include('tours.add_tour_modal')
    
    <script src="{{ asset('js/tour_request.js') }}"></script>
@endsection
