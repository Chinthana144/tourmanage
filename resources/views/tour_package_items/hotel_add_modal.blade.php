<div class="modal" tabindex="-1" id="hotel_add_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Hotel Price</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="post">
        @csrf
        <input type="hidden" name="hot_tour_route_id" id="hot_tour_route_id" value="{{ $item->id }}">
        <input type="hidden" name="hot_package_id" id="hot_package_id">
        <input type="hidden" name="hot_hotel_id" id="hot_hotel_id" value="{{ $item->item->id }}">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Boarding Type</label>
                    <select name="cmb_boarding_type" id="cmb_boarding_type" class="form-select">
                        @foreach ($boarding_types as $boarding_type)
                            <option value="{{ $boarding_type->id }}">{{ $boarding_type->name }}</option>
                        @endforeach
                    </select>

                    <label for="">Check-in Date</label>
                    <input type="date" name="check_in_date" class="form-control" placeholder="Check-in Date">

                </div>
                <div class="col-md-6">
                    <label for="">Check-out Date</label>
                    <input type="date" name="check_out_date" class="form-control" placeholder="Check-out Date">

                    <label for="">Check-out Date</label>
                    <input type="number" name="nights" class="form-control" placeholder="Number of Nights">
                </div>

                <div id="div_hotel_facilities"></div>
            </div>
            
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>

    </div>
  </div>
</div>