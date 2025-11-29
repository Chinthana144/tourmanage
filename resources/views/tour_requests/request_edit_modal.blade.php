<div class="modal" tabindex="-1" id="request_edit_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Tour Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('tour_request.update') }}" method="post">
        <div class="modal-body">
            <p id="p_customer_details"></p>
            @csrf
            @method('PUT')
            <input type="hidden" name="hide_request_id" id="hide_request_id">
            <input type="hidden" name="hide_request_customer_id" id="hide_request_customer_id">
            <label for="">Travel Start Date</label>
            <input type="date" class="form-control mb-2" name="travel_date" id="travel_date" required>

            <label for="">Travel Start Date</label>
            <input type="date" class="form-control mb-2" name="return_date" id="return_date">

            <label for="">Number of Adult Travelers</label>
            <input type="number" step="1" class="form-control mb-2" name="number_of_adults" id="number_of_adults" required>

            <label for="">Number of Child Travelers</label>
            <input type="number" step="1" class="form-control mb-2" name="number_of_children" id="number_of_children">

            <label for="">Tour Pourposes</label>
            <input type="text" class="form-control mb-2" name="tour_pourpose" id="tour_pourpose">

            <label for="">Budget</label>
            <input type="number" step="0.01" class="form-control mb-2" name="budget" id="budget">

            <label for="">Special Requests</label>
            <input type="text" class="form-control mb-2" name="special_requests" id="special_requests">
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Update Request</button>
        </div>
      </form>

    </div>
  </div>
</div>