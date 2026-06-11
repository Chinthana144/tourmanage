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
                $(".star_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_two").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 2:
                $(".star_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 3:
                $(".star_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 4:
                $(".star_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_four").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 5:
                $(".star_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_four").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_five").removeClass('bi bi-star').addClass('bi bi-star-fill');
            break;
            default:
                $(".star_one").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_two").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
        }//switch
        $("#popularity").val(value);
    });

    $(".div_edit_populatiry").on('click', '.icon_star', function(){
        var value = $(this).data('value');
        switch (value) {
            case 1:
                $(".star_edit_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_two").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 2:
                $(".star_edit_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 3:
                $(".star_edit_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 4:
                $(".star_edit_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_four").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 5:
                $(".star_edit_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_four").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_five").removeClass('bi bi-star').addClass('bi bi-star-fill');
            break;
            default:
                $(".star_edit_one").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_two").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
        }//switch
        $("#edit_popularity").val(value);
    });
});//travel media jQuery