$(document).ready(function () {
    
    $("#tbl_requests").on('click', '.btn_edit_request', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "get",
            url: "/getOneRequest",
            data: {
                tour_request_id: id,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#request_edit_modal").modal('toggle');

                var p_customer_details = "<b>" + response.first_name + " " + response.last_name + "</b><br>" + response.email;
                $("#p_customer_details").html(p_customer_details);

                $("#hide_request_id").val(response.id);
                $("#hide_request_customer_id").val(response.customer_id);
                $("#travel_date").val(response.travel_date);
                $("#return_date").val(response.return_date);
                $("#number_of_adults").val(response.adults);
                $("#number_of_children").val(response.children);
                $("#tour_pourpose").val(response.tour_pourpose);
                $("#budget").val(response.budget);
                $("#special_requests").val(response.special_requests);
            }
        });        
    });

});//jQuery