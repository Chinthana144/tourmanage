<div class="modal" tabindex="-1" id="add_activity_price_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add {{ $activity->name }} Price</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('activity_price.store') }}" method="post">
        @csrf
        <input type="hidden" name="hide_activity_id" value="{{ $activity->id }}">
      <div class="modal-body">
        
        <label for="">Select Season</label>
        <select name="cmb_season" id="cmb_season" class="form-control mb-3">
            @foreach ($seasons as $season)
                <option value="{{ $season->id }}">{{ $season->name }}</option>                
            @endforeach
        </select>

        <label for="">Select Package</label>
        <select name="cmb_package" id="cmb_package" class="form-control mb-3">
            @foreach ($packages as $package)
                <option value="{{ $package->id }}">{{ $package->name }}</option>                
            @endforeach
        </select>

        <label for="">Select Price Mode</label>
        <select name="cmb_price_mode" id="cmb_price_mode" class="form-control mb-3">
            @foreach ($price_modes as $price_mode)
                <option value="{{ $price_mode->id }}">{{ $price_mode->name }}</option>                
            @endforeach
        </select>

        <label for="">Description</label>
        <input type="text" name="description" class="form-control mb-3" required>

        <label for="">Price</label>
        <input type="number" step="0.01" name="price" class="form-control mb-3" required>

        <label for="">Price needs to be added as Compulsary Payment?</label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="chk_compulsory" id="chk_compulsory" checked>
            <label class="form-check-label" for="chk_compulsory">Compulsary Payment</label>
        </div>

      </div>

      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn btn-primary">Add Activity Price</button>
      </div>
      </form>

    </div>
  </div>
</div>