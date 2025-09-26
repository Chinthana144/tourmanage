<div class="modal" tabindex="-1" role="dialog" id="registerModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New User</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" id="btn_close_register_modal">
          {{-- <span aria-hidden="true">&times;</span> --}}
        </button>
      </div>

    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">

            <div class="row">
                <div class="col-md-6">
                    <label for="">Select Role</label>
                    <select name="cmb_roles" id="cmb_roles" class="form-select">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                        @endforeach
                    </select>

                    <label for="" class="form-label">Fisrt Name</label>
                    <input type="text" class="form-control mb-2" name="first_name" placeholder="First Name" required>

                    <label for="" class="form-label">Last Name</label>
                    <input type="text" class="form-control mb-2" name="last_name" placeholder="Last Name" required>

                    <label for="" class="form-label">Phone No 1</label>
                    <input type="text" class="form-control mb-2" name="phone1" placeholder="Phone 1" required>

                    <label for="" class="form-label">Phone No 2</label>
                    <input type="text" class="form-control mb-2" name="phone2" placeholder="Phone 2">
                </div>

                <div class="col-md-6">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control mb-2" name="email" placeholder="Email" required>

                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control mb-2" name="password" placeholder="Password" required>

                    <label for="" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control mb-2" name="profile_image" id="profile_image" accept="image/*">
                    <span id="message_warning" style="color:red;">Profile picture should less than 5MB</span>

                    <img src="{{ asset('images/profiles/profile.jpg') }}" alt="profile image" id="profile_image_preview" style="width: 300px; height:auto; border-radius:10px; object-fit:cover;">
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm">Add User</button>
            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        </div>
    </form>

    </div>
  </div>
</div>
