<div class="modal" tabindex="-1" id="request_edit_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Tour Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('tour_request.update') }}" method="post">
        <div class="modal-body">
            @csrf
            @method('PUT')
            <input type="hidden" name="hide_request_id" id="hide_request_id">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Customer Name</label>
                    <input type="text" class="form-control mb-2" name="customer_name" id="customer_name">

                    <label for="">Customer Email</label>
                    <input type="text" class="form-control mb-2" name="customer_email" id="customer_email">

                    <label for="">Travel Start Date</label>
                    <input type="date" class="form-control mb-2" name="travel_date" id="travel_date" required>
                </div>
                <div class="col-md-6">
                    <label for="">Customer Phone</label>
                    <input type="text" class="form-control mb-2" name="customer_phone" id="customer_phone">

                    <label for="">Country</label>
                    <select name="cmb_country" id="cmb_country" class="form-select mb-2">
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>

                    <label for="">Travel Start Date</label>
                    <input type="date" class="form-control mb-2" name="return_date" id="return_date">
                </div>

                <div class="col-md-4">
                    <label for="">Adults</label>
                    <input type="number" step="1" class="form-control mb-2" name="number_of_adults" id="number_of_adults" required>
                </div>
                <div class="col-md-4">
                    <label for="">Children</label>
                    <input type="number" step="1" class="form-control mb-2" name="number_of_children" id="number_of_children">
                </div>
                <div class="col-md-4">
                    <label for="">Infants</label>
                    <input type="number" step="1" class="form-control mb-2" name="number_of_infants" id="number_of_infants">
                </div>

                <div class="col-md-6">
                    <label for="">Tour Purposes</label>
                    <select name="cmb_tour_purpose" id="cmb_tour_purpose" class="form-select mb-2">
                        @foreach ($tour_purposes as $purpose)
                            <option value="{{$purpose->id}}">{{ $purpose->name }}</option>
                        @endforeach
                    </select>

                    <label for="">Travel Country</label>
                    <select name="cmb_travel_country" id="cmb_travel_country" class="form-select mb-2">
                        @foreach ($travel_countries as $travel_country)
                            <option value="{{$travel_country->id}}">{{ $travel_country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Tour Budget</label>
                    <select name="cmb_tour_budget" id="cmb_tour_budget" class="form-select mb-2">
                        @foreach ($tour_budget as $budget)
                            <option value="{{$budget->id}}">{{ $budget->range }}</option>
                        @endforeach
                    </select>

                    <label for="">Rooms</label>
                    <input type="number" step="1" class="form-control mb-2" name="rooms_count" id="rooms_count">
                </div>

                <div class="col-md-12">
                    <textarea name="txt_description" id="txt_description" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Update Request</button>
        </div>
      </form>

    </div>
  </div>
</div>
