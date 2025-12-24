<div class="modal" tabindex="-1" id="edit_tour_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Tour</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('tours.update') }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="hide_tour_id" id="hide_tour_id">
        <div class="modal-body">
            <div class="row">
              <div class="col-md-12 mb-2">
                  <label for="">Title</label>
                  <input type="text" name="txt_edit_title" id="txt_edit_title" class="form-control">
              </div>
              <div class="col-md-12 mb-2">
                  <label for="">Description</label>
                  <textarea name="txt_edit_description" id="txt_edit_description" cols="30" rows="2" class="form-control"></textarea>
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Start Date</label>
                  <input type="date" name="edit_start_date" id="edit_start_date" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">End Date</label>
                  <input type="date" name="edit_end_date" id="edit_end_date" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Number of Days</label>
                  <input type="number" name="edit_num_days" id="edit_num_days" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Number of Nights</label>
                  <input type="number" name="edit_num_nights" id="edit_num_nights" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Number of Adults</label>
                  <input type="number" name="edit_num_adults" id="edit_num_adults" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Number of Children</label>
                  <input type="number" name="edit_num_children" id="edit_num_children" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Select Currency Type</label>
                  <select name="edit_cmb_currencies" id="edit_cmb_currencies" class="form-select">
                    @foreach ($currencies as $currency)
                      <option value="{{ $currency->id }}">{{ $currency->name }}</option>                       
                    @endforeach
                  </select>
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Notes</label>
                  <input type="text" name="txt_edit_notes" id="txt_edit_notes" class="form-control">
              </div>
            </div>

            <p id="p_prices"></p>
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Update Tour</button>
        </div>

      </form>

    </div>
  </div>
</div>