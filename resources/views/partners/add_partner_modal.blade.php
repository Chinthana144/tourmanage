<div class="modal" tabindex="-1" id="add_partner_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Partner</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('partners.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <label for="">Partner Name</label>
            <input type="text" name="partner_name" class="form-control mb-3" required>

            <label for="">Description</label>
            <input type="text" name="partner_description" class="form-control mb-3" required>

            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="chk_status" id="chk_status">
                <label class="form-check-label" for="chk_status">Display in main page</label>
            </div>

            <label for="">Partner Name</label>
            <input type="file" name="partner_logo" id="partner_logo" class="form-control mb-3" required>
            <span id="logo_error" class="text-danger">Image size must be less than 5MB</span>
            <img src="" alt="logo" id="partner_logo_preview" class="img-fluid mt-2">

        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Add Partner</button>
        </div>
      </form>

    </div>
  </div>
</div>
