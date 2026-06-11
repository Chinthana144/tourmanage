<div class="modal" tabindex="-1" id="edit_guide_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Guide</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('guide.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <input type="hidden" name="hide_guide_id" id="hide_guide_id">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">                     
                  <label for="">Name</label>
                  <input type="text" name="edit_name" id="edit_name" class="form-control mb-2">

                  <label for="">Phone</label>
                  <input type="text" name="edit_phone" id="edit_phone" class="form-control mb-2">

                  <label for="">Email</label>
                  <input type="text" name="edit_email" id="edit_email" class="form-control mb-2" autocomplete="off">

                  <label for="">Password (Mobile app access)</label>
                  <input type="password" name="edit_password" id="edit_password" class="form-control mb-2" autocomplete="new-password">

                  <p id="p_travel_media"></p>
                  <label for="cmb_travel_media">Select Travel Media</label>
                  <select name="edit_cmb_travel_media" id="edit_cmb_travel_media" style="width: 100%;" class="form-control mb-2"></select>
                  <input type="hidden" name="hide_travel_media_id" id="hide_travel_media_id" value="0">
                </div>

                <div class="col-md-6">
                  <label for="" class="mt-2">Languages</label>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="edit_chk_language_english" id="edit_chk_language_english">
                        <label class="form-check-label" for="edit_chk_language_english">
                          English
                        </label>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="edit_chk_language_japanese" id="edit_chk_language_japanese">
                        <label class="form-check-label" for="edit_chk_language_japanese">
                          Japanese
                        </label>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="edit_chk_language_sinhala" id="edit_chk_language_sinhala">
                        <label class="form-check-label" for="edit_chk_language_sinhala">
                          Sinhala
                        </label>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="edit_chk_language_tamil" id="edit_chk_language_tamil">
                        <label class="form-check-label" for="edit_chk_language_tamil">
                          Tamil
                        </label>
                      </div>
                    </div>
                  </div>

                  {{-- rate --}}
                  <label for="" class="mt-2">Rate</label>
                  <div class="div_guide_rate">
                      <i class="bx bx-star icon_star edit_star_one" data-value="1"></i>
                      <i class="bx bx-star icon_star edit_star_two" data-value="2"></i>
                      <i class="bx bx-star icon_star edit_star_three" data-value="3"></i>
                      <i class="bx bx-star icon_star edit_star_four" data-value="4"></i>
                      <i class="bx bx-star icon_star edit_star_five" data-value="5"></i>
                      <input type="hidden" name="edit_guide_rate" id="edit_guide_rate" value="0">
                  </div>

                  <label for="profile_image">Primary Image</label>
                  <input type="file" name="edit_profile_image" id="edit_profile_image" class="form-control mb-2">
                  <span id="edit_message_warning"></span>
                  <div id="guide_img_wrapper">
                      <img src="" alt="" id="edit_profile_image_preview" class="img-fluid mb-2">
                  </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Update Guide</button>
        </div>
      </form>

    </div>
  </div>
</div>