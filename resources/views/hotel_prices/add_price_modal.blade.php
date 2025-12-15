<div class="modal" tabindex="-1" id="add_price_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add hotel Price</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('hotelprices.store') }}" method="post">
        @csrf
        <input type="hidden" name="hide_hotel_id" id="hide_hotel_id" value="{{ $hotel->id }}">
        <div class="modal-body">
            <label for="">Select Room Type</label>
            <select name="cmb_room_type" id="cmb_room_type" class="form-select">
                <option value="0">--- Select Room ---</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->roomType->name ." : ". $room->bedType->name }}</option>
                @endforeach
            </select>

            <p id="p_room_details" class="m-2"></p>

            <label for="">Select Season</label>
            <select name="cmb_season" id="cmb_season" class="form-select">
                <option value="Season">Season</option>
                <option value="Off Season">Off Season</option>
            </select>

            <label for="">Season Start Date</label>
            <input type="date" name="season_start_date" class="form-control" required>

            <label for="">Season End Date</label>
            <input type="date" name="season_end_date" class="form-control" required>

            <label for="">Price per night(replace base price)</label>
            <input type="number" step="0.01" name="price_per_night" id="price_per_night" class="form-control">
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Add Seasonal Price</button>
        </div>
      </form>

    </div>
  </div>
</div>