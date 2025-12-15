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
                $("#edit_vehicle_type").val(response.vehicle_type);
                $("#edit_max_passengers").val(response.max_passengers);
                $("#edit_price_per_km").val(response.price_per_km);
            }
        });
    });
});