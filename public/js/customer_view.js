$(document).ready(function () {
    $("#btn_open_add_customer").click(function(){
        $("#add_customer_modal").modal('toggle');
    });

    $("#tbl_customers").on('click', '.btn_edit_customer', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "get",
            url: "/getOneCustomer",
            data: {
                customer_id: id,
            },
            // dataType: "dataType",
            success: function (response) {
                $("#edit_customer_modal").modal('toggle');  
                
                $("#hide_customer_id").val(response.id);
                $("#edit_first_name").val(response.first_name);
                $("#edit_last_name").val(response.last_name);
                $("#edit_email").val(response.email);
                $("#edit_phone_number").val(response.phone_number);
                $("#edit_country_id").val(response.country_id);
            }
        });
    });   
    
    $("#tbl_customers").on('click', '.btn_add_request', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "get",
            url: "/getOneCustomer",
            data: {
                customer_id: id,
            },
            // dataType: "dataType",
            success: function (response) {
                $("#request_add_modal").modal('toggle');

                var cust_details = "<b>" + response.first_name + " " + response.last_name + "</b><br>" + response.email;

                $("#p_customer_details").html(cust_details);
            }
        });
    });
});//customer jQuery