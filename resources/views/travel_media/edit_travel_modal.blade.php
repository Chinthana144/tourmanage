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
            <label for="">Select Country</label>
            <select name="cmb_travel_country" id="cmb_travel_country" class="form-select">
              @foreach ($travel_countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>                  
              @endforeach
            </select>

            <label for="">Name</label>
            <input type="text" name="edit_name" id="edit_name" class="form-control mb-2" placeholder="Car AA-1234" required>

            <label for="">Vehicle Type</label>
            <input type="text" name="edit_vehicle_no" id="edit_vehicle_no" class="form-control mb-2" placeholder="AA-1234" required>

            <label for="">Max Passengers</label>
            <input type="number" name="edit_max_passengers" id="edit_max_passengers" class="form-control mb-2" required>

            <label for="">Price per Kilometer(Km)</label>
            <input type="number" step="0.01" name="edit_price_per_km" id="edit_price_per_km" class="form-control mb-2" required>
        
            <label for="">Populatiry</label>
            <div class="div_edit_populatiry">
                <i class="bx bx-star icon_star star_edit_one" data-value="1"></i>
                <i class="bx bx-star icon_star star_edit_two" data-value="2"></i>
                <i class="bx bx-star icon_star star_edit_three" data-value="3"></i>
                <i class="bx bx-star icon_star star_edit_four" data-value="4"></i>
                <i class="bx bx-star icon_star star_edit_five" data-value="5"></i>
                <input type="hidden" name="edit_popularity" id="edit_popularity" value="0">
            </div>
          </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Update Travel Media</button>
        </div>
      </form>

    </div>
  </div>
</div>