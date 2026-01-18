$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#form_tour").addClass('right-side');

    $("#ball_register").toggleClass('bar');

    //add customer by ajax
    $("#btn_register_customer").click(function (e) { 
        // e.preventDefault();
        // $.ajax({
        //     type: "post",
        //     url: "/registerCustomer",
        //     data: {
        //         first_name: $("#first_name").val(),
        //         last_name: $("#last_name").val(),
        //         email: $("#email").val(),
        //         phone: $("#phone").val(),
        //         country_id: $("#cmb_country").val(),
        //     },
        //     // dataType: "dataType",
        //     success: function (response) {
        //         // console.log(response);
                
        //     }
        // }); 

        //transition register
        $("#form_register").removeClass('active').addClass('left-side');
        $("#form_tour").removeClass('right-side').addClass('active');

        //ball register
        $("#ball_register").removeClass('bar').addClass('ball');
        $("#ball_tour").removeClass('ball').addClass('bar');

    });

    $("#btn_back_register").click(function(){
        //transition tour
        $("#form_tour").removeClass('active').addClass('right-side');
        $("#form_register").removeClass('left-side').addClass('active');

        //ball tour
        $("#ball_register").removeClass('ball').addClass('bar');
        $("#ball_tour").removeClass('bar').addClass('ball');
    });

    $("#btn_create_request").click(function () {
        //transition composition
        $("#form_tour").removeClass('active').addClass('left-side');
        $("#form_composition").removeClass('right-side').addClass('active');

        //ball composition
        $("#ball_tour").removeClass('bar').addClass('ball');
        $("#ball_composition").removeClass('ball').addClass('bar');
    });

    $("#btn_back_tour").click(function (e) { 
        //transition tour
        $("#form_composition").removeClass('active').addClass('right-side');
        $("#form_tour").removeClass('left-side').addClass('active');

        //ball tour
        $("#ball_tour").removeClass('ball').addClass('bar');
        $("#ball_composition").removeClass('bar').addClass('ball');
        
    });
});//main page request forms