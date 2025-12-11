<div class="modal" tabindex="-1" id="edit_travel_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Travel Media</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('travel_media.update') }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="hide_travel_media_id" id="hide_travel_media_id">
        <div class="modal-body">
            <label for="">Vehicle Type</label>
            <input type="text" name="edit_vehicle_type" id="edit_vehicle_type" class="form-control mb-2" required placeholder="Car AA-1234">

            <label for="">Max Passengers</label>
            <input type="number" name="edit_max_passengers" id="edit_max_passengers" class="form-control mb-2" required>

            <label for="">Price per Kilometer(Km)</label>
            <input type="number" step="0.01" name="edit_price_per_km" id="edit_price_per_km" class="form-control mb-2" required>
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Update Travel Media</button>
        </div>
      </form>

    </div>
  </div>
</div>