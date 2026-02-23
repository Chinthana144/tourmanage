<div class="modal" tabindex="-1" id="add_guide_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Guide</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="post">
        @csrf
        <div class="modal-body">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control mb-2">
            <label for="">Phone</label>
            <input type="text" name="name" class="form-control mb-2">
            <label for="">Email</label>
            <input type="text" name="name" class="form-control mb-2">
            <label for="">Password (Mobile app access)</label>
            <input type="password" name="name" class="form-control mb-2">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>

    </div>
  </div>
</div>