$(document).ready(function () {
    $("#btn_add_price").click(function (e) { 
        e.preventDefault();
        $("#add_travel_price_modal").modal('toggle');
    });

    $("#tbl_travel_prices").on('click', '.btn_edit_price', function(){
        var travel_price_id = $(this).data('id');

        $.ajax({
            type: "get",
            url: "/getOneTravelPrice",
            data: {
                travel_price_id: travel_price_id
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);

                $("#edit_travel_price_modal").modal('toggle');
                
                $("#travel_price_id").val(travel_price_id);
                $("#edit_cmb_season").val(response.season_id);
                $("#edit_cmb_package").val(response.package_id);
                $("#edit_cmb_price_mode").val(response.price_mode_id);
                $("#edit_description").val(response.description);
                $("#edit_price").val(response.price);
                response.is_compulsory == 1 ? $("#edit_chk_compulsory").attr('checked', true) : $("#edit_chk_compulsory").attr('checked', false);
            }
        });
    });
});//tarvel price jQuery