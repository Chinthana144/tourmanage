$(document).ready(function () {
   
    $("#btn_add_rooms_modal").click(function(){
        $("#add_rooms_modal").modal('toggle');
    });

    //edit room modal
    $("#tbl_rooms").on('click', '.btn_edit_room', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');//room id

        $.ajax({
            type: "get",
            url: "/getOneRoom",
            data: {
                room_id: id,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#edit_room_modal").modal('toggle');

                $("#hide_room_id").val(response.id);

                $("#cmb_edit_room_type").val(response.room_type_id);

                $("#cmb_edit_room_type").val(response.room_type_id);
                $("#cmb_edit_bed_type").val(response.bed_type_id);
                $("#txt_edit_description").val(response.description);
                $("#txt_edit_max_adults").val(response.room_type_id);
                $("#txt_edit_max_children").val(response.room_type_id);
                $("#txt_edit_max_guests").val(response.room_type_id);
                $("#txt_edit_square_feet").val(response.room_type_id);

                // console.log(response.amenities);
                //decode json amenities
                var amenities = JSON.parse(response.amenities);

                amenities.air_conditioning == 1 ? $("#chk_edit_air_conditioning").prop('checked', true) : $("#chk_edit_air_conditioning").prop('checked', false);
                amenities.wifi == 1 ? $("#chk_edit_wifi").prop('checked', true) : $("#chk_edit_wifi").prop('checked', false);
                amenities.tv == 1 ? $("#chk_edit_tv").prop('checked', true) : $("#chk_edit_tv").prop('checked', false);
                amenities.mini_fridge == 1 ? $("#chk_edit_mini_fridge").prop('checked', true) : $("#chk_edit_mini_fridge").prop('checked', false);
                amenities.mini_bar == 1 ? $("#chk_edit_mini_bar").prop('checked', true) : $("#chk_edit_mini_bar").prop('checked', false);
                amenities.coffee_maker == 1 ? $("#chk_edit_coffee_maker").prop('checked', true) : $("#chk_edit_coffee_maker").prop('checked', false);
                amenities.balcony == 1 ? $("#chk_edit_balcony").prop('checked', true) : $("#chk_edit_balcony").prop('checked', false);
                amenities.safety_box == 1 ? $("#chk_edit_safety_box").prop('checked', true) : $("#chk_edit_safety_box").prop('checked', false);
                amenities.hot_water == 1 ? $("#chk_edit_hot_water").prop('checked', true) : $("#chk_edit_hot_water").prop('checked', false);
                amenities.bathtub == 1 ? $("#chk_edit_bathtub").prop('checked', true) : $("#chk_edit_bathtub").prop('checked', false);
                amenities.shower == 1 ? $("#chk_edit_shower").prop('checked', true) : $("#chk_edit_shower").prop('checked', false);
                amenities.hair_dryer == 1 ? $("#chk_edit_hair_dryer").prop('checked', true) : $("#chk_edit_hair_dryer").prop('checked', false);
                amenities.towels == 1 ? $("#chk_edit_towels").prop('checked', true) : $("#chk_edit_towels").prop('checked', false);
                amenities.toiletries == 1 ? $("#chk_edit_toiletries").prop('checked', true) : $("#chk_edit_toiletries").prop('checked', false);
                
                response.smoking_allowed == 1 ? $("#chk_edit_smorking").prop('checked', true) : $("#chk_edit_smorking").prop('checked', false);
                response.has_breakfast == 1 ? $("#chk_edit_breakfast").prop('checked', true) : $("#chk_edit_breakfast").prop('checked', false);
                response.has_free_cancellation == 1 ? $("#chk_edit_free_cancellation").prop('checked', true) : $("#chk_edit_free_cancellation").prop('checked', false);
                response.extra_bed_allowed == 1 ? $("#chk_edit_extra_bed").prop('checked', true) : $("#chk_edit_extra_bed").prop('checked', false);

                $("#txt_edit_extra_bed_price").val(response.extra_bed_price);
                $("#txt_edit_base_price").val(response.base_price_per_night);   
            }
        });
    });
});//room view jQuery