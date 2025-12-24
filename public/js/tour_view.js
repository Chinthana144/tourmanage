$(document).ready(function () {
    $("#btn_add_tour").click(function () { 
        $("#add_tour_modal").modal('toggle');
    });

    $("#tbl_tours").on('click', '.btn_edit_tour', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "get",
            url: "/getOneTour",
            data: {
                tour_id: id,    
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                
                $("#edit_tour_modal").modal('toggle');

                $("#hide_tour_id").val(response.id);
                $("#tour_request_id").val(response.tour_request_id);
                $("#txt_edit_title").val(response.title);
                $("#txt_edit_description").val(response.description);
                $("#edit_start_date").val(response.start_date);
                $("#edit_end_date").val(response.end_date);
                $("#edit_num_days").val(response.total_days);
                $("#edit_num_nights").val(response.total_nights);
                $("#edit_num_adults").val(response.adults);
                $("#edit_num_children").val(response.children);
                $("#edit_cmb_currencies").val(response.currency_id);
                $("#txt_edit_notes").val(response.note);

                let price_details = "Sub Total: <b>" + response.sub_total + "</b><br>";
                price_details += "Discount Amount: <b>" + response.discount_amount + "</b><br>";
                price_details += "Tax Amount: <b>" + response.tax_amount + "</b><br>";
                price_details += "Grand Total: <b>" + response.grand_total + "</b>";

                $("#p_prices").html(price_details);
            }
        });
    });
});//tour jquery