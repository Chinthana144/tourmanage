$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#form_tour").addClass('right-side');
    $("#ball_register").toggleClass('bar');

    //group composition
    $("#div_adults").css('display', 'none');
    $("#div_children").css('display', 'none');
    $("#div_extra_bed").css('display', 'none');
    $("#div_rooms").css('display', 'none');
    $("#div_submit_button").css('display', 'none');

    //add customer by ajax
    $("#btn_register_customer").click(function (e) {
        // e.preventDefault();
        var email = $("#email").val();
        if(!validateEmail(email)){
            alert("Please enter valid email");
        }
        else{
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
                    // console.log(response);

                    if(response['success'])
                    {
                        $("#hide_tour_customer_id").val(response['customer']['id']);
                        //transition register
                        $("#form_register").removeClass('active').addClass('left-side');
                        $("#form_tour").removeClass('right-side').addClass('active');

                        //ball register
                        $("#ball_register").removeClass('bar').addClass('ball');
                        $("#ball_tour").removeClass('ball').addClass('bar');
                    }
                    else
                    {
                        alert('please enter valid email');
                    }
                }//success
            });
        }//valid email
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
        $.ajax({
            type: "post",
            url: "/requestStore",
            data: {
                hide_customer_id: $("#hide_tour_customer_id").val(),
                start_date: $("#tour_start").val(),
                return_date: $("#tour_return").val(),
                cmb_tour_purpose: $("#cmb_pourpose").val(),
                budget: $("#budget").val(),
                sepcial_request: $("#sepcial_request").val(),
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                if(response['success'])
                {
                    $('#tour_request_id').val(response['tour_request']['id']);
                    $('#hide_tour_request_id').val(response['tour_request']['id']);

                    //transition composition
                    $("#form_tour").removeClass('active').addClass('left-side');
                    $("#form_composition").removeClass('right-side').addClass('active');

                    //ball composition
                    $("#ball_tour").removeClass('bar').addClass('ball');
                    $("#ball_composition").removeClass('ball').addClass('bar');
                }
                else
                {
                    alert('something wen wrong. please contact dev');
                }
            }//success
        });
    });

    $("#btn_back_tour").click(function (e) {
        //transition tour
        $("#form_composition").removeClass('active').addClass('right-side');
        $("#form_tour").removeClass('left-side').addClass('active');

        //ball tour
        $("#ball_tour").removeClass('ball').addClass('bar');
        $("#ball_composition").removeClass('bar').addClass('ball');
    });

    // group composution
    $("#cmb_compisition").change(function(){
        var composition = $(this).val();
        switch (composition) {
            case '1':
                $("#div_adults").css('display', 'none');
                $("#div_children").css('display', 'none');
                $("#div_extra_bed").css('display', 'none');
                $("#div_rooms").css('display', 'block');
                $("#div_submit_button").css('display', 'block');
            break;
            case '2':
                $("#div_adults").css('display', 'none');
                $("#div_children").css('display', 'none');
                $("#div_extra_bed").css('display', 'none');
                $("#div_rooms").css('display', 'block');
                $("#div_submit_button").css('display', 'block');
            break;
            case '3':
                $("#div_adults").css('display', 'block');
                $("#div_children").css('display', 'block');
                $("#div_extra_bed").css('display', 'block');
                $("#div_rooms").css('display', 'block');
                $("#div_submit_button").css('display', 'block');
            break;
            case '4':
                $("#div_adults").css('display', 'block');
                $("#div_children").css('display', 'none');
                $("#div_extra_bed").css('display', 'block');
                $("#div_rooms").css('display', 'block');
                $("#div_submit_button").css('display', 'block');
            break;
            case '0':
                $("#div_adults").css('display', 'none');
                $("#div_children").css('display', 'none');
                $("#div_extra_bed").css('display', 'none');
                $("#div_rooms").css('display', 'none');
                $("#div_submit_button").css('display', 'none');
            break;

            default:
            break;
        }//switch
    });

    $("#btn_add_composition").click(function(){

        var tour_request_id = $("#tour_request_id").val();
        var composition_id = $("#cmb_compisition").val();
        var quantity = $("#room_count").val();

        var adults = $("#adult_count").val() == "" ? 0 : $("#adult_count").val();
        var children = $("#children_count").val() == "" ? 0 : $("#children_count").val();

        var extra_bed = $("#chk_extra_bed").is(":checked") ? 1 : 0;

        $.ajax({
            type: "post",
            url: "/addGroupComposition",
            data: {
                tour_request_id: tour_request_id,
                composition_id: composition_id,
                quantity: quantity,
                adults: adults,
                children: children,
                extra_bed: extra_bed,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);

                //load table
                loadRequestPeople(tour_request_id);

                $("#cmb_compisition").val(0);
                $("#room_count").val(1);
                $("#adult_count").val('');
                $("#children_count").val('');
            }//success
        });
    });

     $("#div_request_people").on('click', '.btn_remove_people', function(){
        var tour_request_id = $("#tour_request_id").val();

        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "post",
            url: "/removeRequestPeople",
            data: {
                tour_request_id: tour_request_id,
                request_people_id: id,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);

                if(response['success'])
                {
                    loadRequestPeople(tour_request_id);
                }
            }
        });
    });

    function loadRequestPeople(tour_request_id)
    {
        //get all people for request
        $.ajax({
            type: "get",
            url: "/getAllRequestPeople",
            data: {
                tour_request_id: tour_request_id,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                var totalAdults = 0;
                var totalChildren = 0;
                var htmlData = "<table class='table' id='tbl_request_people'>";
                htmlData += "<tr>";
                htmlData += "<th>Composition</th>";
                htmlData += "<th>Adults</th>";
                htmlData += "<th>Children</th>";
                htmlData += "<th>Extra Bed</th>";
                htmlData += "<th>Qty</th>";
                htmlData += "<th>Action</th>";
                htmlData += "</tr>";

                $.each(response, function (key, val) {
                    totalAdults += parseInt(val.adults);
                    totalChildren += parseInt(val.children);

                    var has_extra_bed = val.extra_bed == 1 ? "<span class='badge bg-success'>Yes</span>" : "<span class='badge bg-secondary'>No</span>";

                    htmlData += "<tr data-id='"+ val.id +"'>";
                    htmlData += "<td>"+ val.composition +"</td>";
                    htmlData += "<td>"+ val.adults +"</td>";
                    htmlData += "<td>"+ val.children +"</td>";
                    htmlData += "<td>"+ has_extra_bed +"</td>";
                    htmlData += "<td>"+ val.quantity +"</td>";
                    htmlData += "<td><button type='button' class='btn btn-danger btn-sm btn_remove_people'><i class='i bi-trash'></i></button></td>";
                    htmlData += "</tr>";
                });

                htmlData += "</table>";

                $("#div_request_people").html(htmlData);

                var totals = "Total Adults: <b>"+ totalAdults +"</b><br>Total Children: <b>"+ totalChildren +"</b>";
                $("#h5_totals").html(totals);
            }
        });
    }//load request people

    //validate email
    function validateEmail(email) {
    const emailReg = /^([a-zA-Z0-9_.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return emailReg.test(email);
}
});//main page request forms
