<div class="modal" tabindex="-1" id="add_customer_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Add Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('customers.store') }}" method="post">
        @csrf
        <div class="modal-body">
          <label for="">First Name</label>
          <input type="text" name="first_name" class="form-control mb-2" required>

          <label for="">Last Name</label>
          <input type="text" name="last_name" class="form-control mb-2" required>

          <label for="">email</label>
          <input type="text" name="email" class="form-control mb-2" required>

          <label for="">Phone</label>
          <input type="text" name="phone_number" class="form-control mb-2">

          <label for="">Country</label>
          <select name="country_id" id="country_id" class="form-select">
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary">Add Customer</button>
        </div>
      </form>

    </div>
  </div>
</div>