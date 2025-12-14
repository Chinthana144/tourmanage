<div class="modal" tabindex="-1" id="edit_activity_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Activity</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('activities.store') }}" method="post">
        @csrf
        <input type="hidden" name="hide_location_id" value="{{ $location->id }}">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <label for="">Activity Name</label>
              <input type="text" name="txt_name" class="form-control mb-2" required>

              <label for="">Description</label>
              <input type="text" name="txt_description" class="form-control mb-2">

              <label for="">Category</label>
              <select name="cmb_category" id="cmb_category" class="form-select mb-2">
                  <option value="1">Adventure</option>
                  <option value="2">Custural</option>
                  <option value="3">Wildlife</option>
                  <option value="4">Leisure</option>
              </select>

              <label for="">Duration(minutes)</label>
              <input type="number" name="num_duration" class="form-control mb-2">

              <label for="">Best time for the activity</label>
              <select name="cmb_pricing_type" id="cmb_pricing_type" class="form-select mb-2">
                  <option value="1">Morning</option>
                  <option value="2">Noon</option>
                  <option value="3">Evening</option>
                  <option value="4">Night</option>
                  <option value="5">Full Day</option>
              </select>
            </div>

            <div class="col-md-6">
              <div class="form-check form-switch mb-2">
                  <input class="form-check-input" type="checkbox" name="chk_paid_activity" id="chk_paid_activity">
                  <label class="form-check-label" for="chk_paid_activity">Paid Activity</label>
              </div>

              <label for="">Select pricing type</label>
              <select name="cmb_pricing_type" id="cmb_pricing_type" class="form-select mb-2">
                  <option value="1">per person</option>
                  <option value="2">per group</option>
              </select>

              <label for="">Adult Price</label>
              <input type="number" step="0.01" name="num_adult_price" class="form-control mb-2">

              <label for="">Child Price</label>
              <input type="number" step="0.01" name="num_child_price" class="form-control mb-2">

              <label for="">Group Price</label>
              <input type="number" step="0.01" name="num_group_price" class="form-control mb-2">
            </div>
          </div>
            
          <div class="row">
            <div class="col-md-4">
              <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" name="chk_optional" id="chk_optional" checked>
                <label class="form-check-label" for="chk_optional">Optional Activity</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" name="chk_requires_guide" id="chk_requires_guide">
                <label class="form-check-label" for="chk_requires_guide">Requires Guide</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" name="chk_status" id="chk_status">
                <label class="form-check-label" for="chk_status">Available</label>
              </div>
            </div>
          </div>

          <label for="">Notes</label>
          <textarea name="txt_note" id="txt_note" cols="30" rows="2" class="form-control"></textarea>

        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Add Activity</button>
        </div>
      </form>

    </div>
  </div>
</div>