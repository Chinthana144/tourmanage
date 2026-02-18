<div class="modal" tabindex="-1" id="room_add_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Rooms</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="post">
        @csrf
        <div class="modal-body">
            <input type="hidden" name="req_tour_request_id" id="req_tour_request_id" value="{{ $tour_request->id }}">

            <label for="">Select Room Type</label>
            <select name="req_cmb_room_type" id="req_cmb_room_type" class="form-select mb-2">
                @foreach ($room_types as $room_type)
                    <option value="{{ $room_type->id }}">{{ $room_type->name}}</option>
                @endforeach
            </select>

            <label for="">Select Bed Type</label>
            <select name="req_cmb_bed_type" id="req_cmb_bed_type" class="form-select mb-2">
                @foreach ($bed_types as $bed_type)
                    <option value="{{ $bed_type->id }}">{{ $bed_type->name}}</option>
                @endforeach
            </select>

            <label for="">Adult count</label>
            <input type="number" name="req_adult_count" id="req_adult_count" class="form-control mb-2" placeholder="Number of adults for room" required>

            <label for="">Extra bed count</label>
            <input type="number" name="req_extra_bed_count" id="req_extra_bed_count" class="form-control mb-2" value="0">

            <label for="">Children count</label>
            <input type="number" name="req_children_count" id="req_children_count" class="form-control mb-2" placeholder="Number of children for room">

            <label for="">Room Quantity</label>
            <input type="number" name="req_room_quantity" id="req_room_quantity" class="form-control mb-2" value="1">

        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="button" class="btn btn-primary" id="btn_add_room">Add Room</button>
        </div>
      </form>

    </div>
  </div>
</div>