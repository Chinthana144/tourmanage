<div class="modal" tabindex="-1" id="edit_location_price_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit {{ $activity->name }} Price</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('activity_price.update') }}" method="post">
        @csrf
        <input type="hidden" name="hide_price_id" id="hide_price_id">
        <div class="modal-body">
            
            <label for="">Select Season</label>
            <select name="cmb_edit_season" id="cmb_edit_season" class="form-control mb-3">
                @foreach ($seasons as $season)
                    <option value="{{ $season->id }}">{{ $season->name }}</option>                
                @endforeach
            </select>

            <label for="">Select Package</label>
            <select name="cmb_edit_package" id="cmb_edit_package" class="form-control mb-3">
                @foreach ($packages as $package)
                    <option value="{{ $package->id }}">{{ $package->name }}</option>                
                @endforeach
            </select>

            <label for="">Select Price Mode</label>
            <select name="cmb_edit_price_mode" id="cmb_edit_price_mode" class="form-control mb-3">
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
                <input class="form-check-input" type="checkbox" name="chk_edit_compulsory" id="chk_edit_compulsory" checked>
                <label class="form-check-label" for="chk_edit_compulsory">Compulsary Payment</label>
            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Activity Price</button>
        </div>
      </form>

    </div>
  </div>
</div>