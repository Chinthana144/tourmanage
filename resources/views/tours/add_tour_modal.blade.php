<div class="modal" tabindex="-1" id="add_tour_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Tour</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('tours.store') }}" method="post">
        @csrf
        <input type="hidden" name="tour_request_id" id="tour_request_id">
        <div class="modal-body">
            <div class="row">
              <div class="col-md-12 mb-2">
                  <label for="">Title</label>
                  <input type="text" name="txt_title" class="form-control">
              </div>
              <div class="col-md-12 mb-2">
                  <label for="">Description</label>
                  <textarea name="txt_description" id="txt_description" cols="30" rows="2" class="form-control"></textarea>
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Start Date</label>
                  <input type="date" name="start_date" id="tour_start_date" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">End Date</label>
                  <input type="date" name="end_date" id="tour_end_date" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Number of Days</label>
                  <input type="number" name="num_days" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Number of Nights</label>
                  <input type="number" name="num_nights" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Number of Adults</label>
                  <input type="number" name="num_adults" id="tour_num_adults" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Number of Children</label>
                  <input type="number" name="num_children" id="tour_num_children" class="form-control">
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Select Currency Type</label>
                  <select name="cmb_currencies" id="cmb_currencies" class="form-select">
                    @foreach ($currencies as $currency)
                      <option value="{{ $currency->id }}">{{ $currency->name }}</option>                       
                    @endforeach
                  </select>
              </div>
              <div class="col-md-6 mb-2">
                  <label for="">Notes</label>
                  <input type="text" name="txt_notes" class="form-control">
              </div>
            </div>
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Create Tour</button>
        </div>

      </form>

    </div>
  </div>
</div>