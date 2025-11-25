@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tour Requests</h5>
        </div>
        <div class="card-body">
            <table class="table">
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
                    <tr>
                        <td>{{ $request->customer->first_name . " " . $request->customer->last_name}}</td>
                        <td>{{ $request->travel_date }}</td>
                        <td>{{ $request->return_date }}</td>
                        <td>{{ $request->number_of_adults }}</td>
                        <td>{{ $request->number_of_children }}</td>
                        <td>{{ $request->budget }}</td>
                        <td>{{ $request->tour_pourpose }}</td>
                        <td>
                            @if ($request->status == 1)
                                <label for="" class="badge bg-primary">Pending</label>
                            @elseif ($request->status == 2)
                                Approved
                            @elseif ($request->status == 3)
                                Rejected
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm">edit</button>
                        </td>
                    </tr>                    
                @endforeach
            </table>
        </div>
    </div>
@endsection
