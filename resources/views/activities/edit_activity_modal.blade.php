<div class="modal" tabindex="-1" id="edit_activity_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Activity</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('activities.update') }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="hide_location_id" id="hide_location_id" value="{{ $location->id }}">
        <input type="hidden" name="hide_activity_id" id="hide_activity_id">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <label for="">Activity Name</label>
              <input type="text" name="txt_edit_name" id="txt_edit_name" class="form-control mb-2" required>

              <label for="">Description</label>
              <input type="text" name="txt_edit_description" id="txt_edit_description" class="form-control mb-2">

              <label for="">Category</label>
              <select name="cmb_edit_category" id="cmb_edit_category" class="form-select mb-2">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>                      
                  @endforeach
              </select>

              <label for="">Duration(minutes)</label>
              <input type="number" name="num_edit_duration" id="num_edit_duration" class="form-control mb-2">

              <label for="">Best time for the activity</label>
              <select name="cmb_edit_best_time" id="cmb_edit_best_time" class="form-select mb-2">
                  @foreach ($times as $time)
                      <option value="{{ $time->id }}">{{ $time->name }}</option>
                  @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <div class="form-check form-switch mb-2">
                  <input class="form-check-input" type="checkbox" name="chk_edit_paid_activity" id="chk_edit_paid_activity">
                  <label class="form-check-label" for="chk_edit_paid_activity">Paid Activity</label>
              </div>

              <label for="">Select pricing type</label>
              <select name="cmb_edit_pricing_type" id="cmb_edit_pricing_type" class="form-select mb-2">
                   @foreach ($price_types as $price_type)
                      <option value="{{ $price_type->id }}">{{ $price_type->name }}</option>
                  @endforeach
              </select>

              <label for="">Adult Price</label>
              <input type="number" step="0.01" name="num_edit_adult_price" id="num_edit_adult_price" class="form-control mb-2">

              <label for="">Child Price</label>
              <input type="number" step="0.01" name="num_edit_child_price" id="num_edit_child_price" class="form-control mb-2">

              <label for="">Group Price</label>
              <input type="number" step="0.01" name="num_edit_group_price" id="num_edit_group_price" class="form-control mb-2">
            </div>
          </div>
            
          <div class="row">
            <div class="col-md-4">
              <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" name="chk_edit_optional" id="chk_edit_optional" checked>
                <label class="form-check-label" for="chk_edit_optional">Optional Activity</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" name="chk_edit_requires_guide" id="chk_edit_requires_guide">
                <label class="form-check-label" for="chk_edit_requires_guide">Requires Guide</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" name="chk_edit_status" id="chk_edit_status">
                <label class="form-check-label" for="chk_edit_status">Available</label>
              </div>
            </div>
          </div>

          <label for="">Notes</label>
          <textarea name="txt_edit_note" id="txt_edit_note" cols="30" rows="2" class="form-control"></textarea>

        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Update Activity</button>
        </div>
      </form>

    </div>
  </div>
</div>