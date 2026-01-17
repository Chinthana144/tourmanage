$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#form_tour").css('display', 'none');

    $("#ball_register").toggleClass('bar');

    //add customer by ajax
    $(".request_form").on('click', '#btn_register_customer', function(){

        $.ajax({
            type: "post",
            url: "/registerCustomer",
            data: {
                first_name: $("#first_name").val(),
                last_name: $("#last_name").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                country_id: $("#cmb_country").val(),
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                
            }
        }); 
    });

    $("#btn_goto_tour").click(function (e) { 
        // e.preventDefault();
        $("#form_register").addClass('remove');

        $("#form_tour").css('display', 'block');
        
        $("#form_tour").addClass('active');
        
    });
});//main page request forms