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

});//jQuery