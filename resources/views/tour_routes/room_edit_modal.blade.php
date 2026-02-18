<div class="modal" tabindex="-1" id="room_edit_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Rooms</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="post">
        @csrf
        <div class="modal-body">
            <input type="hidden" name="tour_request_id" id="tour_request_id" value="{{ $tour_request->id }}">
            <input type="hidden" name="hide_room_id" id="hide_room_id">

            <label for="">Select Room Type</label>
            <select name="cmb_room_type" id="cmb_room_type" class="form-select mb-2">
                @foreach ($room_types as $room_type)
                    <option value="{{ $room_type->id }}">{{ $room_type->name}}</option>
                @endforeach
            </select>

            <label for="">Select Bed Type</label>
            <select name="cmb_bed_type" id="cmb_bed_type" class="form-select mb-2">
                @foreach ($bed_types as $bed_type)
                    <option value="{{ $bed_type->id }}">{{ $bed_type->name}}</option>
                @endforeach
            </select>

            <label for="">Adult count</label>
            <input type="number" name="adult_count" id="adult_count" class="form-control mb-2" placeholder="Number of adults for room" required>

            <label for="">Children count</label>
            <input type="number" name="children_count" id="children_count" class="form-control mb-2" placeholder="Number of children for room">

            <label for="">Extra bed count</label>
            <input type="number" name="extra_bed_count" id="extra_bed_count" class="form-control mb-2" value="0">
            
            <label for="">Room Quantity</label>
            <input type="number" name="room_quantity" id="room_quantity" class="form-control mb-2" value="1">

        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="button" class="btn btn-primary" id="btn_update_room">Update Room</button>
        </div>
      </form>

    </div>
  </div>
</div>