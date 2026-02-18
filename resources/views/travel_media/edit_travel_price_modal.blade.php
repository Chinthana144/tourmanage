<div class="modal" tabindex="-1" id="edit_travel_price_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add {{ $travel_media->name }} Price</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('travel_price.update') }}" method="post">
        @csrf
        <input type="hidden" name="travel_price_id" id="travel_price_id">
      <div class="modal-body">
        
        <label for="">Select Season</label>
        <select name="edit_cmb_season" id="edit_cmb_season" class="form-control mb-3">
            @foreach ($seasons as $season)
                <option value="{{ $season->id }}">{{ $season->name }}</option>                
            @endforeach
        </select>

        <label for="">Select Package</label>
        <select name="edit_cmb_package" id="edit_cmb_package" class="form-control mb-3">
            @foreach ($packages as $package)
                <option value="{{ $package->id }}">{{ $package->name }}</option>                
            @endforeach
        </select>

        <label for="">Select Price Mode</label>
        <select name="edit_cmb_price_mode" id="edit_cmb_price_mode" class="form-control mb-3">
            @foreach ($price_modes as $price_mode)
                <option value="{{ $price_mode->id }}">{{ $price_mode->name }}</option>                
            @endforeach
        </select>

        <label for="">Description</label>
        <input type="text" name="edit_description" id="edit_description" class="form-control mb-3">

        <label for="">Price</label>
        <input type="number" step="0.01" name="edit_price" id="edit_price" class="form-control mb-3">

        <label for="">Price needs to be added as Compulsary Payment?</label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="edit_chk_compulsory" id="edit_chk_compulsory" checked>
            <label class="form-check-label" for="edit_chk_compulsory">Compulsary Payment</label>
        </div>

      </div>

      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn btn-primary">Update Price</button>
      </div>
      </form>

    </div>
  </div>
</div>