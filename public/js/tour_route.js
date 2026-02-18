$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //initiatives
    $("#div_locations").css('display', 'none');
    $("#div_hotels").css('display', 'none');
    $("#div_restaurants").css('display', 'none');
    $("#div_activities").css('display', 'none');
    $("#div_travel").css('display', 'none');

    //route info show
    $("#tbl_tour_route").on('click', '.btn_open_info', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "get",
            url: "/getOneTourRoute",
            data: {
                tour_route_id: id
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                var route_type = response['route_type'];

                $("#route_info_modal").modal('toggle');
                var details = "<p>";
                
                switch (route_type) {
                    case 'location':
                        $("#modal_title").text('Location');
                        details += "Day No: <b>" + response['data']['day_no'] +"</b><br>";
                        details += "Location: <b>" + response['data']['name'] +"</b><br>";
                        details += "Description :" + response['data']['description'] +"<br>";
                        details += "Province: <b>" + response['data']['province'] +"</b><br>";
                        details += "District: <b>" + response['data']['district'] +"</b><br>";
                        details += "City: <b>" + response['data']['city'] +"</b><br>";
                        details += "</p>";

                        details += "<img src='"+ response['data']['primary_image'] +"' alt='no image' style='width:100%; height:auto; border-radius:10px;'>";
                    break;

                    case 'hotel':
                        $("#modal_title").text('Hotel');
                        details += "Day No: <b>" + response['data']['day_no'] +"</b><br>";
                        details += "Hotel: <b>" + response['data']['name'] +"</b><br>";
                        details += "Check-in-date: <b>" + response['data']['check_in_date'] +"</b><br>";
                        details += "Check-out-date: <b>" + response['data']['check_out_date'] +"</b><br>";
                        details += "Province: <b>" + response['data']['province'] +"</b><br>";
                        details += "District: <b>" + response['data']['district'] +"</b><br>";
                        details += "City: <b>" + response['data']['city'] +"</b><br>";
                        details += "</p>";

                        details += "<p><b>Rooms</b></p>";
                        details += "<div style='max-height:200px; over-flow:scroll;'>";
                        details += "<table class='table'>";
                        details += "<tr>";
                        details += "<th>Room</th>";
                        details += "<th>People</th>";
                        details += "<th>Price</th>";
                        details += "<th>Qty</th>";
                        details += "</tr>";
                        $.each(response['room'], function (key, val) { 
                            details += "<tr>";
                            details += "<td>"+ val['room_type'] +" <br>"+ val['bed_type'] +"</td>";
                            details += "<td>Adult: "+ val['base_adults'] +"<br>Children: "+ val['base_children'] +"</td>";
                            details += "<td>Per night: "+ val['price_per_night'] +"<br>Extra bed: "+ val['extra_bed_price'] +"</td>";
                            details += "<td>"+ val['room_quantity'] +"</td>";
                            details += "</tr>";
                        });
                        details += "</table>";
                        details += "</div>";
                        
                    break;

                    case 'restaurant':
                        $("#modal_title").text('Restaurant');
                        details += "Day No: <b>" + response['data']['day_no'] +"</b><br>";
                        details += "Restaurant: <b>" + response['data']['name'] +"</b><br>";
                        details += "Province: <b>" + response['data']['province'] +"</b><br>";
                        details += "District: <b>" + response['data']['district'] +"</b><br>";
                        details += "City: <b>" + response['data']['city'] +"</b><br>";
                        details += "<hr>";
                        details += "Meal type: <b>"+ response['data']['meal_type'] +"</b><br>";
                        details += "Meal: <b>"+ response['data']['meal_name'] +"</b><br>";
                        details += "Price: <b>"+ response['data']['meal_price'] +"</b><br>";
                        details += "</p>";

                        details += "<img src='images/restaurants/"+ response['data']['cover_image'] +"' alt='no image' style='width:100%; height:auto; border-radius:10px;'>";
                    break;

                    case 'activity':
                        $("#modal_title").text('Activity');
                        details += "Day No: <b>" + response['data']['day_no'] +"</b><br>";
                        details += "Location: <b>" + response['data']['location'] +"</b><br>";
                        details += "Activity: <b>" + response['data']['name'] +"</b><br>";
                        details += "Description: " + response['data']['description'] +"<br>";
                        details += "Line total: <b>" + response['data']['line_total'] +"</b><br>";

                        details += "</p>";

                        details += "<img src='"+ response['data']['image4'] +"' alt='no image' style='width:100%; height:auto; border-radius:10px;'>";
                    break;

                    case 'travel':
                        $("#modal_title").text('Travel');
                        details += "Day No: <b>" + response['data']['day_no'] +"</b><br>";
                        details += "Travel with: <b>" + response['data']['name'] +"</b><br>";
                        details += "Vehical No: <b>" + response['data']['vehicle_No'] +"</b><br><hr>";
                        details += "From: <b>" + response['data']['start'] +"</b><br>";
                        details += "To: <b>" + response['data']['end'] +"</b><br><hr>";
                        details += "Distance: <b>" + response['data']['distance_km'] +" Km</b><br>";
                        details += "Duration: <b>" + response['data']['duration_minutes'] +" minutes</b><br>";
                        details += "</p>";
                    break;
                
                    default:
                        alert('No path selected');
                    break;
                }//switch case

                $("#div_details").html(details);
            }
        });

        
    });

    //location div show
    $("#btn_show_location").click(function(){
        $("#div_locations").css('display', 'block');
        $("#div_hotels").css('display', 'none');
        $("#div_restaurants").css('display', 'none');
        $("#div_activities").css('display', 'none');
        $("#div_travel").css('display', 'none');

        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
        $("#btn_show_hotel").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_restaurant").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_activities").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_travel").removeClass('btn-primary').addClass('btn-outline-primary');

        //get all locations
        $.ajax({
            type: "get",
            url: "/getLocations",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#loc_cmb_locations").empty();
                $("#loc_cmb_locations").append($('<option>', {value: 0, text: "--- Select Location ---",}));
                $.each(response, function (key, val) { 
                    // console.log("val = " + val.name);
                    $("#loc_cmb_locations").append($('<option>', {
                        value: val.id,
                        text: val.name,
                    }));
                });
            }
        });
    });

    //hotel div show
    $("#btn_show_hotel").click(function(){
        $("#div_locations").css('display', 'none');
        $("#div_hotels").css('display', 'block');
        $("#div_restaurants").css('display', 'none');
        $("#div_activities").css('display', 'none');
        $("#div_travel").css('display', 'none');

        $("#btn_show_location").removeClass('btn-primary').addClass('btn-outline-primary');
        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
        $("#btn_show_restaurant").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_activities").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_travel").removeClass('btn-primary').addClass('btn-outline-primary');

        //get all hotels
        $.ajax({
            type: "get",
            url: "/getHotels",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#cmb_hotels").empty();
                $("#cmb_hotels").append($('<option>', {value: 0, text: "--- Select Hotel ---",}));
                $.each(response, function (kay, val) { 
                    $("#cmb_hotels").append($('<option>', {
                        value: val.id,
                        text: val.name,
                    }));
                });
            }
        });

        //het boarding types
        $.ajax({
            type: "get",
            url: "/getBoardingTypes",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#hot_boarding_type").empty();
                $("#hot_boarding_type").append($('<option>', {value: 0, text: "--- Select Boarding Type ---",}));
                $.each(response, function (kay, val) { 
                    $("#hot_boarding_type").append($('<option>', {
                        value: val.id,
                        text: val.name,
                    }));
                });
            }
        });

        //get requested room types
        var tour_request_id = $("#hot_tour_request_id").val();

        //load form
        loadRequestPeople(tour_request_id);

    });

    //edit click
    $("#hot_div_people").on('click', '.btn_edit_room', function(){
        let id = $(this).data('room-id');
        let tourRequestID = $(this).data('request-id');

        $("#room_edit_modal").modal('toggle');

        $.ajax({
            type: "get",
            url: "/getOneRequestRoom",
            data: {
                room_id: id,
            },
            // dataType: "dataType",
            success: function (response) {
                $("#hide_room_id").val(response.id);
                $("#cmb_room_type").val(response.room_type_id);
                $("#cmb_bed_type").val(response.bed_type_id);
                $("#adult_count").val(response.adult_count);
                $("#children_count").val(response.children_count);
                $("#extra_bed_count").val(response.extra_bed_count);
                $("#room_quantity").val(response.room_quantity);

                loadRequestPeople(tourRequestID);
            }
        });
    });

    //update request rooms
    $("#btn_update_room").click(function(){
        var room_id = $("#hide_room_id").val();
        var tour_request_id = $("#tour_request_id").val();
        var room_type_id = $("#cmb_room_type").val();
        var bed_type_id = $("#cmb_bed_type").val();
        var adult_count = $("#adult_count").val();
        var children_count = $("#children_count").val();
        var extra_bed_count = $("#extra_bed_count").val();
        var room_quantity = $("#room_quantity").val();

        $.ajax({
            type: "post",
            url: "/editRequestRoom",
            data: {
                room_id : room_id,
                tour_request_id : tour_request_id,
                room_type_id : room_type_id,
                bed_type_id : bed_type_id,
                adult_count : adult_count,
                children_count : children_count,
                extra_bed_count : extra_bed_count,
                room_quantity : room_quantity,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#room_edit_modal").modal('hide');

                loadRequestPeople(response.tour_request_id);
            }
        });
    });

    //open room add modal
    $("#btn_open_add_room").click(function (e) { 
        $("#room_add_modal").modal('toggle');
    });

    //add request rooms
    $("#btn_add_room").click(function(){
        var tour_request_id = $("#req_tour_request_id").val();
        var room_type_id = $("#req_cmb_room_type").val();
        var bed_type_id = $("#req_cmb_bed_type").val();
        var adult_count = $("#req_adult_count").val();
        var children_count = $("#req_children_count").val();
        var extra_bed_count = $("#req_extra_bed_count").val();
        var room_quantity = $("#req_room_quantity").val();

        $.ajax({
            type: "post",
            url: "/addRequestRoom",
            data: {
                tour_request_id : tour_request_id,
                room_type_id : room_type_id,
                bed_type_id : bed_type_id,
                adult_count : adult_count,
                children_count : children_count,
                extra_bed_count : extra_bed_count,
                room_quantity : room_quantity,
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);

                $("#room_add_modal").modal('hide');
                loadRequestPeople(response.tour_request_id);
            }
        });
    });

    //delete click
    $("#hot_div_people").on('click', '.btn_delete_room', function(){
        let id = $(this).data('room-id');
        let tourRequestID = $(this).data('request-id');

        $.ajax({
            type: "post",
            url: "/deleteRoom",
            data: {
                room_id: id,
                tour_request_id: tourRequestID,
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                
                loadRequestPeople(response.tour_request_id);
            }   
        });
    });

    //restaurants div show
    $("#btn_show_restaurant").click(function(){
        $("#div_locations").css('display', 'none');
        $("#div_hotels").css('display', 'none');
        $("#div_restaurants").css('display', 'block');
        $("#div_activities").css('display', 'none');
        $("#div_travel").css('display', 'none');

        $("#btn_show_location").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_hotel").removeClass('btn-primary').addClass('btn-outline-primary');
        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
        $("#btn_show_activities").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_travel").removeClass('btn-primary').addClass('btn-outline-primary');

        //get all restaurants
        $.ajax({
            type: "get",
            url: "/getRestaurants",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                $("#cmb_restaurants").empty();
                $("#cmb_restaurants").append($('<option>', {value: 0, text: "--- Select Restaurant ---",}));
                $.each(response, function (kay, val) { 
                    $("#cmb_restaurants").append($('<option>', {
                        value: val.id,
                        text: val.name,
                    }));
                });
            }
        });

        //get meals types
        $.ajax({
            type: "get",
            url: "/getMealTypes",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                $("#res_meal_type").empty();
                $("#res_meal_type").append($('<option>', {value: 0, text: "--- Select MealType ---",}));
                $.each(response, function (key, val) { 
                    $("#res_meal_type").append($('<option>', {
                        value: val.id,
                        text: val.name,
                    }));
                });
            }
        });
    });

    //activities div show
    $("#btn_show_activities").click(function(){
        $("#div_locations").css('display', 'none');
        $("#div_hotels").css('display', 'none');
        $("#div_restaurants").css('display', 'none');
        $("#div_activities").css('display', 'block');
        $("#div_travel").css('display', 'none');

        $("#btn_show_location").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_hotel").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_restaurant").removeClass('btn-primary').addClass('btn-outline-primary');
        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
        $("#btn_show_travel").removeClass('btn-primary').addClass('btn-outline-primary');

        //get all locations
        $.ajax({
            type: "get",
            url: "/getLocations",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#cmb_locations").empty();
                $("#cmb_locations").append($('<option>', {value: 0, text: "--- Select Location ---",}));
                $.each(response, function (key, val) { 
                    // console.log("val = " + val.name);
                    $("#cmb_locations").append($('<option>', {
                        value: val.id,
                        text: val.name,
                    }));
                    $("#act_routable_type").val('Activities');
                });
            }
        });
    });

    //travel div show
    $("#btn_show_travel").click(function(){
        $("#div_locations").css('display', 'none');
        $("#div_hotels").css('display', 'none');
        $("#div_restaurants").css('display', 'none');
        $("#div_activities").css('display', 'none');
        $("#div_travel").css('display', 'block');

        $("#btn_show_location").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_hotel").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_restaurant").removeClass('btn-primary').addClass('btn-outline-primary');
        $("#btn_show_activities").removeClass('btn-primary').addClass('btn-outline-primary');
        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
        
        //get all tarvel
        $.ajax({
            type: "get",
            url: "/getTravelMedia",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#tvl_cmb_media").empty();
                $("#tvl_cmb_media").append($('<option>', {value: 0, text: "--- Select Travel Media ---",}));
                $.each(response, function (key, val) { 
                    $("#tvl_cmb_media").append($('<option>', {
                        value: val.id,
                        text: val.name,
                    }));
                });
            }
        });
    });

    //=================================== Locations ============================//
    //location cmb changed
    $("#cmb_locations").change(function(){
        var location_id = $(this).val();
        if(location_id > 0)
        {
            $.ajax({
                type: "get",
                url: "/getActivitybyLocation",
                data: {
                    location_id: location_id,
                },
                // dataType: "dataType",
                success: function (response) {
                    // console.log(response);
                    $("#cmb_activities").empty();
                    $("#cmb_activities").append($('<option>', {value: 0, text: "--- Select Activity ---",}));
                    $.each(response, function (key, val) { 
                        $("#cmb_activities").append($('<option>', {
                            value: val.id,
                            text: val.name,
                        }));
                    });
                }
            });
        }//has location
    });

    //===================================== Hotels =============================//
    //load requested rooms
    function loadRequestPeople(tourRequestID)
    {   
        $.ajax({
            type: "get",
            url: "/getAllRequestPeople",
            data: {
                tour_request_id: tourRequestID,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                var html_people = "<div class='border border-primary rounded mt-2 p-1' style='max-height:200; over-flow:scroll;'>";
                $.each(response, function (key, val) { 
                    html_people += "<input type='hidden' name='hide_room_"+val.id+"' value='"+ val.id +"'>";
                    html_people += "<div class='row'>";
                    
                    html_people += "<div class='col-md-2'>";
                    html_people += "<p>";
                    html_people += "<b>" + val.composition +"</b>";
                    html_people += "</p>";
                    html_people += "</div>";

                    html_people += "<div class='col-md-2'>";
                    html_people += "<p>";
                    html_people += "Adults: <b>" + val.adults +"</b><br>";
                    html_people += "Children: <b>" + val.children +"</b>";
                    html_people += "</p>";
                    html_people += "</div>";

                    html_people += "<div class='col-md-2'>";
                    html_people += "<p>";
                    html_people += "Extra beds: <b>" + val.extra_bed +"</b><br>";
                    html_people += "Rooms: <b>" + val.quantity +"</b>";
                    html_people += "</p>";
                    html_people += "</div>";

                    html_people += "<div class='col-md-2'>";
                    html_people += "<label for=''>Price Per night</label>";
                    html_people += "<input type='number' step='0.01' name='night_price_"+val.id+"' class='form-control' required>";
                    html_people += "</div>";

                    html_people += "<div class='col-md-2'>";
                    html_people += "<label for=''>Price extra bed</label>";
                    html_people += "<input type='number' step='0.01' name='extra_bed_"+val.id+"' class='form-control' required>";
                    html_people += "</div>";

                    html_people += "<div class='col-md-2'>";
                    html_people += "<div class='d-flex'>";
                    html_people += "<button data-room-id='"+ val.id +"' data-request-id='"+tourRequestID+"' type='button' class='btn btn-warning btn-sm mt-3 btn_edit_room'><i class='bx bx-edit'></i></button>";
                    html_people += "<button data-room-id='"+ val.id +"' data-request-id='"+tourRequestID+"' type='button' class='btn btn-danger btn-sm mt-3 ms-1 btn_delete_room'><i class='bx bx-trash'></i></button>";
                    html_people += "</div>";
                    html_people += "</div>";

                    html_people += "</div>";
                });

                html_people += "</div>";

                $("#hot_div_people").html(html_people);
            }
        });
    }//load requested rooms

    //======================================= Restaurants ================================//
    $("#cmb_restaurants").change(function(){
        var restaurant_id = $(this).val();
        if(restaurant_id > 0)
        {
            $.ajax({
                type: "get",
                url: "/getOneRestaurant",
                data: {
                    restaurant_id: restaurant_id,
                },
                // dataType: "dataType",
                success: function (response) {
                    // console.log(response);
                    $("#res_open_time").val(response.opening_time);
                    $("#res_close_time").val(response.closing_time);
                }
            });
        }//has restaurant
    });

    $("#res_price_per_adult").keyup(function (e) { 
        var price_per_adult = $(this).val();
        var num_adult = $("#res_num_adult").val();

        var total_price_adult = parseFloat(num_adult) * parseFloat(price_per_adult);

        $("#res_total_price_adult").val(total_price_adult);
    });

    $("#res_price_per_child").keyup(function(){
        var price_per_child = parseFloat(isNaN($(this).val())) ? 0 : $(this).val();
        var num_children = parseFloat($("#res_num_children").val()) ?? 0;

        var total_price_children = num_children * price_per_child;

        $("#res_total_price_child").val(total_price_children);

        //get total
        var total_price_adult = parseFloat($("#res_total_price_adult").val());

        // console.log('price = ' + total_price_adult);

        var total_price = total_price_children + total_price_adult;

        $("#res_total_price").val(total_price);
    });

    //======================================= Activities =================================//
    //activity cmb chnaged
    $("#cmb_activities").change(function(){
        var activity_id = $(this).val();
        if(activity_id > 0)
        {
            $.ajax({
                type: "get",
                url: "/getOneActivity",
                data: {
                    activity_id: activity_id,
                },
                // dataType: "dataType",
                success: function (response) {
                    // console.log(response);
                    var num_adult = $("#act_num_adult").val();
                    var num_children = $("#act_num_children").val();

                    var price_adult = parseFloat(num_adult) * parseFloat(response.price_adult ?? 0);
                    var price_children = parseFloat(num_children) * parseFloat(response.price_child ?? 0);

                    $("#act_price_per_adult").val(response.price_adult ?? 0);
                    $("#act_price_per_child").val(response.price_adult ?? 0);

                    $("#act_total_price_adult").val(price_adult);
                    $("#act_total_price_child").val(price_children);
                }
            });
        }//has activity
    });

    $("#act_price_per_adult").keyup(function (e) { 
        var price_per_adult = parseFloat($(this).val());
        var num_adults = parseFloat($("#act_num_adult").val());

        var total_price_adults = price_per_adult * num_adults;

        $("#act_total_price_adult").val(total_price_adults);
    });

    $("#act_price_per_child").keyup(function (e) { 
        var price_per_child = parseFloat($(this).val());
        var num_children = parseFloat($("#act_num_children").val());

        var total_price_children = price_per_child * num_children;

        $("#act_total_price_child").val(total_price_children);
    });


    //===================================== Travelling ==================================//
    $("#tvl_start_type").change(function(){
        var start_type = $(this).val();
        if(start_type > 0)
        {
            switch (start_type) {
                case "1":
                    //location
                    $.ajax({
                        type: "get",
                        url: "/getLocations",
                        // data: "data",
                        // dataType: "dataType",
                        success: function (response) {
                            // console.log(response);
                            $("#tvl_start_place").empty();
                            $("#tvl_start_place").append($('<option>', {value: 0, text: "--- Select Location ---",}));
                            $.each(response, function (key, val) { 
                                // console.log("val = " + val.name);
                                $("#tvl_start_place").append($('<option>', {
                                    value: val.id,
                                    text: val.name,
                                }));
                            });
                        }
                    });
                break;
                case "2":
                    //hotels
                    $.ajax({
                        type: "get",
                        url: "/getHotels",
                        // data: "data",
                        // dataType: "dataType",
                        success: function (response) {
                            $("#tvl_start_place").empty();
                            $("#tvl_start_place").append($('<option>', {value: 0, text: "--- Select Hotels ---",}));
                            $.each(response, function (key, val) { 
                                $("#tvl_start_place").append($('<option>', {
                                    value: val.id,
                                    text: val.name,
                                })); 
                            });
                        }
                    });
                break;
                case "3":
                    //restaurants
                    $.ajax({
                        type: "get",
                        url: "/getRestaurants",
                        // data: "data",
                        // dataType: "dataType",
                        success: function (response) {
                            $("#tvl_start_place").empty();
                            $("#tvl_start_place").append($('<option>', {value: 0, text: "--- Select Restaurants ---",}));
                            $.each(response, function (key, val) { 
                                $("#tvl_start_place").append($('<option>', {
                                    value: val.id,
                                    text: val.name,
                                }));
                            });
                        }
                    });
                break;
            }//switch
        }//has val
    });

    $("#tvl_end_type").change(function(){
        var end_type = $(this).val();
        if(end_type > 0)
        {
            switch (end_type) {
                case "1":
                    //location
                    $.ajax({
                        type: "get",
                        url: "/getLocations",
                        // data: "data",
                        // dataType: "dataType",
                        success: function (response) {
                            // console.log(response);
                            $("#tvl_end_place").empty();
                            $("#tvl_end_place").append($('<option>', {value: 0, text: "--- Select Location ---",}));
                            $.each(response, function (key, val) { 
                                // console.log("val = " + val.name);
                                $("#tvl_end_place").append($('<option>', {
                                    value: val.id,
                                    text: val.name,
                                }));
                            });
                        }
                    });
                break;
                case "2":
                    //hotels
                    $.ajax({
                        type: "get",
                        url: "/getHotels",
                        // data: "data",
                        // dataType: "dataType",
                        success: function (response) {
                            $("#tvl_end_place").empty();
                            $("#tvl_end_place").append($('<option>', {value: 0, text: "--- Select Hotels ---",}));
                            $.each(response, function (key, val) { 
                                $("#tvl_end_place").append($('<option>', {
                                    value: val.id,
                                    text: val.name,
                                })); 
                            });
                        }
                    });
                break;
                case "3":
                    //restaurants
                    $.ajax({
                        type: "get",
                        url: "/getRestaurants",
                        // data: "data",
                        // dataType: "dataType",
                        success: function (response) {
                            $("#tvl_end_place").empty();
                            $("#tvl_end_place").append($('<option>', {value: 0, text: "--- Select Restaurants ---",}));
                            $.each(response, function (key, val) { 
                                $("#tvl_end_place").append($('<option>', {
                                    value: val.id,
                                    text: val.name,
                                }));
                            });
                        }
                    });
                break;
            }//switch
        }//has place type
    });

    $("#tvl_cmb_media").change(function(){
        var travel_media_id = $(this).val();

        $.ajax({
            type: "get",
            url: "/getOneTravelMedia",
            data: {
                travel_media_id: travel_media_id,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#tvl_price_per_km").val(response.price_per_km);
            }
        });
    });
    
    $("#tvl_distance_km").keyup(function (e) { 
        var price_per_km = $("#tvl_price_per_km").val();
        if(price_per_km !== null || price_per_km !== "")
        {
            var distance_km = $("#tvl_distance_km").val();
            var price = parseFloat(distance_km) * parseFloat(price_per_km);
            
            $("#tvl_price").val(price);
        }
    });

});//tour route jQuery  