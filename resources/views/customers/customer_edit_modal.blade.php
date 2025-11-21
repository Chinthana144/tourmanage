<div class="modal" tabindex="-1" id="edit_customer_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Update Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('customers.update') }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="hide_customer_id" id="hide_customer_id">
        <div class="modal-body">
          <label for="">First Name</label>
          <input type="text" name="first_name" id="edit_first_name" class="form-control mb-2" required>

          <label for="">Last Name</label>
          <input type="text" name="last_name" id="edit_last_name" class="form-control mb-2" required>

          <label for="">email</label>
          <input type="text" name="email" id="edit_email" class="form-control mb-2" required>

          <label for="">Phone</label>
          <input type="text" name="phone_number" id="edit_phone_number" class="form-control mb-2">

          <label for="">Country</label>
          <select name="country_id" id="edit_country_id" class="form-select">
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary">Update Customer</button>
        </div>
      </form>

    </div>
  </div>
</div>