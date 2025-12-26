@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Hi {{ $customer->first_name }}, please add rooms.
                <button class="btn btn-primary btn-sm float-end" id="btn_add_rooms">Add Room</button>
            </h5>
        </div>
        <div class="card-body">
            <div class="container container-md">
                <table class="table" id="tbl_rooms">
                    <tr>
                        <th>Room Type</th>
                        <th>Bed Type</th>
                        <th>Adults</th>
                        <th>Children</th>
                        <th>Extra Bed</th>
                        <th>Count</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($tour_rooms as $tour_room)
                        <tr data-id="{{ $tour_room->id }}">
                            <td>{{ $tour_room->roomType->name }}</td>
                            <td>{{ $tour_room->bedType->name }}</td>
                            <td>{{ $tour_room->adult_count }}</td>
                            <td>{{ $tour_room->children_count }}</td>
                            <td>
                                @if ($tour_room->extra_bed_count > 0)
                                    {{ $tour_room->extra_bed_count }}
                                @else
                                    <span class="badge bg-primary">No Extra Bed</span>
                                @endif
                            </td>
                            <td>{{ $tour_room->room_quantity }}</td>
                            <td>
                                <form action="{{ route('tour_request_rooms.destroy') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="tour_request_id" value="{{ $tour_request->id }}">
                                    <input type="hidden" name="hide_room_id" value="{{ $tour_room->id }}">
                                    <button class="btn btn-danger btn-sm"><i class="bx bx-x"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="container container-md">
                <div id="div_footer mb-0" class="d-flex">
                    <button class="btn btn-primary m-2"><i class='bx bx-caret-left'></i> Back</button>

                    <form action="{{ route('tour_request_location.index') }}" method="get">
                        @csrf
                        <input type="hidden" name="tour_request_id" value="{{ $tour_request->id }}">
                        <button type="submit" class="btn btn-primary float-end m-2">Continue <i class='bx bx-caret-right'></i></button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/tour_request_room.js') }}"></script>

    @include('tour_requests.room_add_modal')

@endsection
