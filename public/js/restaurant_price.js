$(document).ready(function () {
    $("#btn_add_restaurant_price").click(function (e) { 
        e.preventDefault();
        $("#add_restaurant_price_modal").modal('toggle');
    });

    $("#tbl_restaurant_prices").on('click', '.btn_edit_price', function(){
        var priceID = $(this).data('id');

        $.ajax({
            type: "get",
            url: "/getOneRestaurantPrice",
            data: {
                price_id: priceID,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#edit_restaurant_price_modal").modal('toggle');

                $("#hide_price_id").val(response.id);
                $("#cmb_edit_season").val(response.season_id);
                $("#cmb_edit_package").val(response.package_id);
                $("#cmb_edit_price_mode").val(response.price_mode_id);
                $("#cmb_edit_meal_type").val(response.meal_type_id);
                $("#edit_description").val(response.description);
                $("#edit_price").val(response.price);

                response.is_compulsory == 1 ? $("#chk_edit_compulsory").attr('checked', true) : $("#chk_edit_compulsory").attr('checked', false);
            }
        });
    });

});//restaurant price jQuery