<div class="modal" tabindex="-1" id="add_activity_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Activity</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="post">
        @csrf
        <input type="hidden" name="hide_location_id" value="{{ $location->id }}">
        <div class="modal-body">
            <label for="">Activity Name</label>
            <input type="text" name="txt_name" class="form-control">

            <label for="">Activity Name</label>
            <input type="text" name="txt_name" class="form-control">

            <label for="">Category</label>
            <select name="cmb_category" id="cmb_category">
                <option value="Adventure">Adventure</option>
                <option value="Custural">Custural</option>
                <option value="Wildlife">Wildlife</option>
                <option value="Leisure">Leisure</option>
            </select>

            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="chk_paid_activity" id="chk_paid_activity">
                <label class="form-check-label" for="chk_paid_activity">Paid Activity</label>
            </div>

            <select name="cmb_pricing_type" id="cmb_pricing_type">
                <option value="Adventure">per person</option>
                <option value="Custural">per group</option>
            </select>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>

    </div>
  </div>
</div>