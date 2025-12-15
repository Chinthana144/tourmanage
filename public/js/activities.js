$(document).ready(function () {
    $("#btn_add_activity").click(function(){
        $("#add_activity_modal").modal('toggle');
    });

    $("#tbl_activities").on('click', '.btn_edit_activity', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "get",
            url: "/getOneActivity",
            data: {
                activity_id: id,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                
                $("#edit_activity_modal").modal('toggle');

                $("#hide_activity_id").val(response.id);
                $("#hide_location_id").val(response.location_id);
                $("#txt_edit_name").val(response.name);
                $("#txt_edit_description").val(response.description);
                $("#cmb_edit_category").val(response.category_id);
                $("#num_edit_duration").val(response.duration_minutes);
                $("#cmb_edit_pricing_type").val(response.pricing_type_id);
                $("#cmb_edit_best_time").val(response.best_time_id);

                response.is_paid == 1 ? $("#chk_edit_paid_activity").prop('checked', true) : $("#chk_edit_paid_activity").prop('checked', false);

                response.price_adult ?? $("#num_edit_adult_price").val(response.price_adult);
                response.price_child ?? $("#num_edit_child_price").val(response.price_child);
                response.group_price ?? $("#num_edit_group_price").val(response.group_price);

                response.is_optional == 1 ? $("#chk_edit_optional").prop('checked', true) : $("#chk_edit_optional").prop('checked', false);
                response.requires_guide == 1 ? $("#chk_edit_requires_guide").prop('checked', true) : $("#chk_edit_requires_guide").prop('checked', false);
                response.status == 1 ? $("#chk_edit_status").prop('checked', true) : $("#chk_edit_status").prop('checked', false);

                $("#txt_edit_note").val(response.notes);
            }
        });
    });
});//activities jQuery