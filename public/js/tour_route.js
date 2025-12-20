$(document).ready(function () {
    //initiatives
    $("#div_locations").css('display', 'none');
    $("#div_restaurants").css('display', 'none');
    $("#div_activities").css('display', 'none');
    $("#div_travel").css('display', 'none');

    //type change
    $("#cmb_routeble_type").change(function(){
        var routable_type = $(this).val();

        switch (routable_type) {
            case 'location':
                $("#div_locations").css('display', 'block');
                $("#div_restaurants").css('display', 'none');
                $("#div_activities").css('display', 'none');
                $("#div_travel").css('display', 'none');
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

            break;
            case 'hotel':
                alert('hotel');
            break;
            case 'restaurants':
                $("#div_locations").css('display', 'none');
                $("#div_restaurants").css('display', 'block');
                $("#div_activities").css('display', 'none');
                $("#div_travel").css('display', 'none');
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
            break;
            case 'activities':
                $("#div_locations").css('display', 'none');
                $("#div_restaurants").css('display', 'none');
                $("#div_activities").css('display', 'block');
                $("#div_travel").css('display', 'none');
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
            break;
            case 'travel':
                $("#div_restaurants").css('display', 'none');
                $("#div_locations").css('display', 'none');
                $("#div_activities").css('display', 'none');
                $("#div_travel").css('display', 'block');
                
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
                                text: val.vehicle_type,
                            }));
                        });
                    }
                });
            break;
        
            default:
            break;
        }
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