$(document).ready(function () {

    $("#tbl_tour_requests").on('click', '.btn_edit_request', function(){
        let id = $(this).data('id');

        $.ajax({
            type: "get",
            url: "/getOneRequest",
            data: {
                tour_request_id: id,
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                $("#request_edit_modal").modal('toggle');

                $("#hide_request_id").val(response['id']);
                $("#customer_name").val(response['customer_name']);
                $("#customer_phone").val(response['customer_phone']);
                $("#customer_email").val(response['customer_email']);
                $("#cmb_country").val(response['country_id']);

                $("#travel_date").val(response['travel_date']);
                $("#return_date").val(response['return_date']);

                $("#number_of_adults").val(response['adults']);
                $("#number_of_children").val(response['children']);
                $("#number_of_infants").val(response['infants']);

                $("#cmb_tour_purpose").val(response['tour_pourpose_id']);
                $("#cmb_travel_country").val(response['travel_country_id']);
                $("#cmb_tour_budget").val(response['travel_budget_id']);
                $("#rooms_count").val(response['rooms_count']);
                $("#txt_description").val(response['description']);
            }
        });
    });

    $("#tbl_tour_requests").on('click', '.btn_add_tour', function(){
        // let row = $(this).closest('tr');
        let id = $(this).data('id');

        $("#add_tour_modal").modal('toggle');

        $("#tour_request_id").val(id);

        $.ajax({
            type: "get",
            url: "/getOneRequest",
            data: {
                tour_request_id: id,
            },
            // dataType: "dataType",
            success: function (response) {
                $("#txt_title").val(response.customer_name + " - " + response.tour_pourpose);
                $("#tour_start_date").val(response.travel_date);
                $("#tour_end_date").val(response.return_date);
                $("#tour_num_adults").val(response.adults);
                $("#tour_num_children").val(response.children);
                $("#tour_num_infants").val(response.infants);
                $("#rooms_per_hotel").val(response.rooms_count);
            }
        });
    });



    //add date
    $("#tour_start_date").change(function(){
        var startDate = new Date($(this).val());

        var currentDate = new Date();

        if(currentDate > startDate)
        {
            $("#tour_start_date").css('border-color', 'red');
            $(this).val(currentDate);
        }
        else
        {
            $("#tour_start_date").css('border-color', 'green');
        }

        $("#tour_end_date").val($(this).val());
    });
});//jQuery
