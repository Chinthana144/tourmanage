$(document).ready(function () {
    $("#btn_add_travel_media").click(function(){
        $("#add_travel_modal").modal('toggle');
    });

    $("#tbl_travel_medias").on('click', '.btn_edit_travel_media', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "get",
            url: "/getOneTravelMedia",
            data: {
                'travel_media_id' : id,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#edit_travel_modal").modal('toggle');

                $("#hide_travel_media_id").val(response.id);
                $("#edit_name").val(response.name);
                $("#edit_vehicle_type").val(response.vehicle_no);
                $("#edit_max_passengers").val(response.max_passengers);
                $("#edit_price_per_km").val(response.price_per_km);
            }
        });
    });

    $(".div_populatiry").on('click', '.icon_star', function(){
        var value = $(this).data('value');
        switch (value) {
            case 1:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 2:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 3:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 4:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_four").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 5:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_four").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_five").removeClass('bx bx-star').addClass('bx bxs-star');
            break;
            default:
                $(".star_one").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_two").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
        }//switch
        $("#popularity").val(value);
    });

    $(".div_edit_populatiry").on('click', '.icon_star', function(){
        var value = $(this).data('value');
        switch (value) {
            case 1:
                $(".star_edit_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_two").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_edit_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_edit_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_edit_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 2:
                $(".star_edit_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_edit_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_edit_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 3:
                $(".star_edit_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_edit_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 4:
                $(".star_edit_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_four").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 5:
                $(".star_edit_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_four").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_edit_five").removeClass('bx bx-star').addClass('bx bxs-star');
            break;
            default:
                $(".star_edit_one").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_edit_two").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_edit_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_edit_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_edit_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
        }//switch
        $("#edit_popularity").val(value);
    });
});//travel media jQuery