@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Hi {{ $customer->first_name }}, please add rooms.</h5>
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

                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form action="{{ route('tour_request_rooms.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="tour_request_id" value="{{ $tour_request->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Select Room Type</label>
                                    <select name="cmb_room_type" id="cmb_room_type" class="form-select mb-2">
                                        @foreach ($room_types as $room_type)
                                            <option value="{{ $room_type->id }}">{{ $room_type->name}}</option>
                                        @endforeach
                                    </select>

                                    <label for="">Adult count</label>
                                    <input type="number" name="adult_count" id="adult_count" class="form-control mb-2" placeholder="Number of adults for room" required>

                                    <label for="">Extra bed count</label>
                                    <input type="number" name="extra_bed_count" id="extra_bed_count" class="form-control mb-2" value="0">

                                </div>
                                <div class="col-md-6">
                                    <label for="">Select Bed Type</label>
                                    <select name="cmb_bed_type" id="cmb_bed_type" class="form-select mb-2">
                                        @foreach ($bed_types as $bed_type)
                                            <option value="{{ $bed_type->id }}">{{ $bed_type->name}}</option>
                                        @endforeach
                                    </select>

                                    <label for="">Children count</label>
                                    <input type="number" name="children_count" id="children_count" class="form-control mb-2" placeholder="Number of children for room">

                                    <label for="">Room Quantity</label>
                                    <input type="number" name="room_quantity" id="room_quantity" class="form-control mb-2" value="1">

                                    <button type="submit" class="btn btn-primary float-end mt-3">Add Room</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container container-md">
                <div id="div_footer mb-0">
                    <button class="btn btn-primary m-2"><i class='bx bx-caret-left'></i> Back</button>
                    <button class="btn btn-primary float-end m-2">Continue <i class='bx bx-caret-right'></i></button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/tour_request_room.js') }}"></script>
@endsection
