@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Dashboard</h5>
        </div>
        <div class="card-body">
            
            <div class="row">
                <div class="col-md-6">
                    <div id="div_tour_requests">
                        <p>Pending tour requests</p>
                        <table class="table">
                            <tr>
                                <th>Submit Date</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Destination</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($pending_requests as $request)
                                <tr>
                                    <td>{{ substr($request->created_at, 0,10) }}</td>
                                    <td>{{ $request->customer_email }}</td>
                                    <td>{{ $request->customer_phone }}</td>
                                    <td>{{ $request->travelCountry->name }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm">View</button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
@endsection
