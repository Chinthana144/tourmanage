<div class="modal" tabindex="-1" id="edit_room_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Hotel Room</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('hotelrooms.update') }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="hide_edit_hotel_id" id="hide_edit_hotel_id" value="{{ $hotel->id }}">
        <input type="hidden" name="hide_room_id" id="hide_room_id">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <label for="">Room Type</label>
              <select name="cmb_edit_room_type" id="cmb_edit_room_type" class="form-select">
                @foreach ($room_types as $room_type)
                    <option value="{{ $room_type->id }}">{{ $room_type->name }}</option>
                @endforeach
              </select>

              <label for="" class="mt-2">Bed Type</label>
              <select name="cmb_edit_bed_type" id="cmb_edit_bed_type" class="form-select">
                @foreach ($bed_types as $bed_type)
                    <option value="{{ $bed_type->id }}">{{ $bed_type->name }}</option>
                @endforeach
              </select>

              <label for="" class="mt-2">Description</label>
              <textarea name="txt_edit_description" id="txt_edit_description" class="form-control" rows="3"></textarea>

            </div>

            <div class="col-md-6">
              <label for="">Max Adults</label>
              <input type="number" name="txt_edit_max_adults" id="txt_edit_max_adults" class="form-control" required>

              <label for="">Max Children</label>
              <input type="number" name="txt_edit_max_children" id="txt_edit_max_children" class="form-control" required>

              <label for="">Max Guest Total</label>
              <input type="number" name="txt_edit_max_guests" id="txt_edit_max_guests" class="form-control">

              <label for="">Size Squarefeet</label>
              <input type="number" name="txt_edit_square_feet" id="txt_edit_square_feet" class="form-control">
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-md-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_air_conditioning" name="chk_edit_air_conditioning">
                <label class="form-check-label" for="chk_edit_air_conditioning">Air Conditioning</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_wifi" name="chk_edit_wifi">
                <label class="form-check-label" for="chk_edit_wifi">Free Wi-Fi</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_tv" name="chk_edit_tv">
                <label class="form-check-label" for="chk_edit_tv">TV</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_mini_fridge" name="chk_edit_mini_fridge">
                <label class="form-check-label" for="chk_edit_mini_fridge">Mini Fridge</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_mini_bar" name="chk_edit_mini_bar">
                <label class="form-check-label" for="chk_edit_mini_bar">Mini Bar</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_coffee_maker" name="chk_edit_coffee_maker">
                <label class="form-check-label" for="chk_edit_coffee_maker">Tea / Coffee Maker</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_balcony" name="chk_edit_balcony">
                <label class="form-check-label" for="chk_edit_balcony">Balcony / Terrace</label>
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_safety_box" name="chk_edit_safety_box">
                <label class="form-check-label" for="chk_edit_safety_box">Safety Deposit Box</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_hot_water" name="chk_edit_hot_water">
                <label class="form-check-label" for="chk_edit_hot_water">Hot Water</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_bathtub" name="chk_edit_bathtub">
                <label class="form-check-label" for="chk_edit_bathtub">Bathtub</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_shower" name="chk_edit_shower">
                <label class="form-check-label" for="chk_edit_shower">Shower</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_hair_dryer" name="chk_edit_hair_dryer">
                <label class="form-check-label" for="chk_edit_hair_dryer">Hair Dryer</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_towels" name="chk_edit_towels">
                <label class="form-check-label" for="chk_edit_towels">Towels Provided</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="chk_edit_toiletries" name="chk_edit_toiletries">
                <label class="form-check-label" for="chk_edit_toiletries">Toiletries Provided</label>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-6">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="chk_edit_smorking" name="chk_edit_smorking">
                <label class="form-check-label" for="chk_edit_smorking">Smoking Allowed</label>
              </div>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="chk_edit_breakfast" name="chk_edit_breakfast">
                <label class="form-check-label" for="chk_edit_breakfast">Has Breakfast</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="chk_edit_free_cancellation" name="chk_edit_free_cancellation">
                <label class="form-check-label" for="chk_edit_free_cancellation">Has Free Cancellation</label>
              </div>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="chk_edit_extra_bed" name="chk_edit_extra_bed">
                <label class="form-check-label" for="chk_edit_extra_bed">Extra Bed Allowed</label>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-6">
              <label for="">Extra Bed Price($)</label>
              <input type="number" step="0.01" name="txt_edit_extra_bed_price" id="txt_edit_extra_bed_price" class="form-control">
            </div>

            <div class="col-md-6">
              <label for="">Base price per night($)</label>
              <input type="number" step="0.01" name="txt_edit_base_price" id="txt_edit_base_price" class="form-control">
            </div>
          </div>
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Update Room Type</button>
        </div>
      </form>

    </div>
  </div>
</div>