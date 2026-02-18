@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tour Requests</h5>
        </div>
        <div class="card-body">
            <table class="table" id="tbl_tour_requests">
                <tr>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>Pourpose</th>
                    <th>Destination</th>
                    <th>Days</th>
                    <th>People</th>
                    <th>Rooms</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($all_requests as $request)
                    <tr>
                        <td>{{$request->customer_name}} <br>{{$request->country->name}}</td>
                        <td>{{$request->customer_email}} <br>{{$request->customer_phone}}</td>
                        <td>{{$request->pourpose->name}} <br>{{$request->tourBudget->range}}</td>
                        <td>{{$request->travelCountry->name}}</td>
                        <td>
                            Start: {{$request->travel_date}}
                            <br>
                            Return: {{$request->return_date}}
                        </td>
                        <td>
                            Adults: {{$request->adults}}
                            <br>
                            Children: {{$request->children}}
                            <br>
                            Infants: {{$request->infants}}
                        </td>
                        <td>{{$request->rooms_count}}</td>
                        <td>
                            @switch($request->status)
                                @case(1)
                                    <span class="badge bg-primary">Pending</span>
                                @break
                                @case(2)
                                    <span class="badge bg-warning">Qouted</span>
                                @break
                                @case(3)
                                    <span class="badge bg-success">Accepted</span>
                                @break
                                @case(4)
                                    <span class="badge bg-danger">Rejected</span>
                                @break
                                @default
                            @endswitch
                        </td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-warning btn_edit_request" data-id="{{$request->id}}"><i class="bx bx-edit"></i></button>
                                <button class="btn btn-success ms-1 btn_add_tour" data-id="{{$request->id}}"><i class="bx bx-plus"></i>Tour</button>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </table>
            <div>
                {{ $all_requests->links() }}
            </div>
        </div>
    </div>

    @include('tour_requests.request_edit_modal')
    @include('tours.add_tour_modal')

    <script src="{{ asset('js/tour_request.js') }}"></script>
@endsection
