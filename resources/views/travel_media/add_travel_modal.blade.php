<div class="modal" tabindex="-1" id="add_travel_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Travel Media</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('travel_media.store') }}" method="post">
        @csrf
        <div class="modal-body">
            <label for="">Select Country</label>
            <select name="cmb_travel_country" id="cmb_travel_country" class="form-select">
              @foreach ($travel_countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>                  
              @endforeach
            </select>

            <label for="">Vehicle</label>
            <input type="text" name="name" class="form-control mb-2" required placeholder="Car AA-1234">

            <label for="">Vehicle No</label>
            <input type="text" name="vehicle_no" class="form-control mb-2" required placeholder="AA-1234">

            <label for="">Max Passengers</label>
            <input type="number" name="max_passengers" class="form-control mb-2" required>

            <label for="">Price per Kilometer(Km)</label>
            <input type="number" step="0.01" name="price_per_km" class="form-control mb-2" required>

            <label for="">Populatiry</label>
            <div class="div_populatiry">
                <i class="bx bx-star icon_star star_one" data-value="1"></i>
                <i class="bx bx-star icon_star star_two" data-value="2"></i>
                <i class="bx bx-star icon_star star_three" data-value="3"></i>
                <i class="bx bx-star icon_star star_four" data-value="4"></i>
                <i class="bx bx-star icon_star star_five" data-value="5"></i>
                <input type="hidden" name="popularity" id="popularity" value="0">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add Travel Media</button>
        </div>
      </form>

    </div>
  </div>
</div>