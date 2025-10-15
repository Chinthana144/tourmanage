<div class="modal" tabindex="-1" id="tourist_health_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="h5_health_modal_title">Health Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('tourist_health.update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="hide_tourist_id" id="hide_tourist_id" value="0">
        <input type="hidden" name="hide_tourist_health_id" id="hide_tourist_health_id" value="0">
        <div class="modal-body">
            <label for="">Select Blood Group</label>
            <select name="cmb_blood_group" id="cmb_blood_group" class="form-select mb-2">
                <option value="">--- Select Blood Group ---</option>
                @foreach ($blood_groups as $blood_group)
                    <option value="{{ $blood_group->id }}">{{ $blood_group->name }}</option>
                @endforeach
            </select>

            <label for="">Dietary Preference</label>
            <select name="cmb_dietary_type" id="cmb_dietary_type" class="form-select mb-2">
                <option value="">--- Select Dietary Preference ---</option>
                @foreach ($dietary_types as $dietary_type)
                    <option value="{{ $dietary_type->id }}"><strong>{{ $dietary_type->name}}</strong>: {{ $dietary_type->description }}</option>
                @endforeach
            </select>

            <div class="mb-2">
                <label for="">Allergies (Optional)</label>
                <textarea name="allergies" id="allergies" cols="30" rows="2" class="form-control"></textarea>
            </div>
            
            <div class="mb-2">
                <label for="">Medical Condition (Optional)</label>
                <textarea name="medical_condition" id="medical_condition" cols="30" rows="2" class="form-control"></textarea>
            </div>

            <div class="mb-2">
                <label for="">Emergency Contact Person Name</label>
                <input type="text" name="emergency_contact_name" id="emergency_contact_name" class="form-control" placeholder="Emergency Contact Name">
            </div>

            <div class="mb-2">
                <label for="">Emergency Contact Phone No</label>
                <input type="text" name="emergency_contact_phone" id="emergency_contact_phone" class="form-control" placeholder="Emergency Contact Phone">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

    </div>
  </div>
</div>