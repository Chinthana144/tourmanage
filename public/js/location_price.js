$(document).ready(function () {
    $("#add_location_price").click(function (e) { 
        e.preventDefault();
        $("#add_location_price_modal").modal('toggle');
    });

    $("#tbl_location_prices").on('click', '.btn_edit_price', function(){
        var priceID = $(this).data('id');

        $.ajax({
            type: "get",
            url: "/getOneLocationPrice",
            data: {
                price_id: priceID,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);

                $("#edit_location_price_modal").modal('toggle');
                
                $("#hide_price_id").val(response.id);
                $("#cmb_edit_season").val(response.season_id);
                $("#cmb_edit_package").val(response.package_id);
                $("#cmb_edit_price_mode").val(response.price_mode_id);
                $("#edit_description").val(response.description);
                $("#edit_price").val(response.price);
                response.status == 1 ? $("#chk_edit_compulsory").attr('checked', true) : $("#chk_edit_compulsory").attr('checked', false);
            }
        });
    });
});//location price jQuery