$(document).ready(function () {
    
    $("#tbl_tourists").on('click', '.btn_tourist_health',  function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "get",
            url: "/get-tourist-health",
            data: {id:id},
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);

                var tourist = response.tourist
                var tourist_health = response.tourist_health;

                $("#h5_health_modal_title").text(tourist.firstname + " " + tourist.lastname + " Health Details");

                $("#hide_tourist_id").val(tourist.id);
                $("#hide_tourist_health_id").val(tourist_health.id);

                var blood_group_id = tourist_health.blood_group_id;
                var dietary_type_id = tourist_health.dietary_preference_id;
                var allergies = tourist_health.allergies;
                var medical_conditions = tourist_health.medical_conditions;
                var emergency_contact_name = tourist_health.emergency_contact_name;
                var emergency_contact_phone = tourist_health.emergency_contact_phone;
                var notes = tourist_health.notes;

                $("#cmb_blood_group").val(blood_group_id);
                $("#cmb_dietary_type").val(dietary_type_id);
                $("#allergies").val(allergies);
                $("#medical_condition").val(medical_conditions);
                $("#emergency_contact_name").val(emergency_contact_name);
                $("#emergency_contact_phone").val(emergency_contact_phone);
                
                $("#tourist_health_modal").modal('toggle');
            }
        });
    });

    //edit tourist
    $("#tbl_tourists").on('click', '.btn_tourist_edit', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "get",
            url: '/getOneTourist',
            data: {id:id},
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#tourist_edit_modal").modal('toggle');  
                console.log("id = " + response.id);
                  

                $("#hidden_tourist_id").val(response.id);
                $("#first_name").val(response.firstname);
                $("#last_name").val(response.lastname);
                $("#email").val(response.email);
                $("#phone").val(response.phone);
                $("#passport_no").val(response.passport_no);
                $("#cmb_country").val(response.country_id);
                $("#dob").val(response.dob);
                $("#cmb_language").val(response.language_id);
                $("#address").val(response.address);
                $("#img_profile_picture").attr('src', response.profile_picture);

            }
        });
    });

    //close button
    $("#btn_close_tourist_edit").click(function(){
        $("#tourist_edit_modal").modal('hide');    
    });

    //add image
    $("#profile_picture").change(function(event){
        var size=this.files[0].size;
        if(size>5242880){
            alert("File size exceeds 5MB");
            $(this).css('border-color', 'red');
        }
        else{
            var url = URL.createObjectURL(event.target.files[0]);
            $("#img_profile_picture").attr("src", url);
            $(this).css('border-color', 'green');
        }
    });

    //check dob
    $("#dob").change(function(){
        var dob = new Date(this.value);
        var today = new Date();

        var age = today - dob;
        if(age<0){
            $('#dob_error').html('Invalid date of birth');
            $("#dob_error").css('display', 'block');
            $('#dob_error').css('color', 'red');
            $("#dob").css('border-color', 'red');
        }
        else{
            $("#dob_error").css('display', 'none');
            $("#dob").css('border-color', 'green');
        }
    });

});//jQuery