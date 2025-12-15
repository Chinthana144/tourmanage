<div class="modal" tabindex="-1" role="dialog" id="tourist_edit_modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Tourist</h5>
        <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close" id="btn_close_tourist_edit">
          {{-- <span aria-hidden="true">&times;</span> --}}
        </button>
      </div>

      <form action="{{ route('tourists.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="hidden_tourist_id" id="hidden_tourist_id" value="0">
        <div class="modal-body">
          <div class="row mb-3">
              <div class="col-md-6">
                  <label for="">First Name</label>
                  <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required> 
              </div>
              <div class="col-md-6">
                  <label for="">Last Name</label>
                  <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required>
              </div>
          </div>

          <div class="row mb-3">
              <div class="col-md-6">
                  <label for="">Email</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Email" required> 
              </div>
              <div class="col-md-6">
                  <label for="">Phone</label>
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="phone" required>
              </div>
          </div>

          <div class="row mb-3">
              <div class="col-md-6">
                  <label for="">Passport No</label>
                  <input type="text" name="passport_no" id="passport_no" class="form-control" placeholder="Passport No" required> 
              </div>
              <div class="col-md-6">
                  <label for="">Select Country</label>
                  <select name="cmb_country" id="cmb_country" class="form-select">
                      <option value="">--- Select Country ---</option>
                      @foreach ($countries as $country)
                          <option value="{{ $country->id }}">{{ $country->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

          <div class="row mb-3">
              <div class="col-md-6">
                  <label for="">Birthday</label>
                  <input type="date" name="dob" id="dob" class="form-control" placeholder="YYYY-MM-DD" required>
                  <span id="dob_error"></span>
              </div>
              <div class="col-md-6">
                  <label for="">Pefered Language</label>
                  <select name="cmb_language" id="cmb_language" class="form-select">
                      <option value="">--- Select Language ---</option>
                      @foreach ($languages as $language)
                          <option value="{{ $language->id }}">{{ $language->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

          <div class="row mb-3">
              <div class="col-md-6">
                  <label for="">Address</label>
                  <textarea name="address" id="address" cols="40" rows="4" class="form-control">Address</textarea>
              </div>
              <div class="col-md-6">
                  <label for="">Profile Picture</label>
                  <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                  <img src="" alt="profile picture" id="img_profile_picture" style="width:200px; height:auto; border-radius:10px; margin-top:10px;">
              </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        </div>
      </form>

    </div>
  </div>
</div>