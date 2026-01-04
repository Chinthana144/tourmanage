$(document).ready(function () {
    //initialize visibility
    $("#div_locations").css('display', 'none');
    $("#div_hotels").css('display', 'none');
    $("#div_restaurants").css('display', 'none');
    $("#div_activities").css('display', 'none');
    $("#div_travel").css('display', 'none');

    //locations
    $("#btn_locations").click(function (e) { 
        e.preventDefault();
        
        $("#div_locations").css('display', 'block');
        $("#div_hotels").css('display', 'none');
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
    });

    $("#btn_hotels").click(function (e) { 
        e.preventDefault();
        $("#div_locations").css('display', 'none');
        $("#div_hotels").css('display', 'block');
        $("#div_restaurants").css('display', 'none');
        $("#div_activities").css('display', 'none');
        $("#div_travel").css('display', 'none');

        //get all hotels
        $.ajax({
            type: "get",
            url: "/getHotels",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#hot_cmb_hotels").empty();
                $("#hot_cmb_hotels").append($('<option>', {value: 0, text: "--- Select Hotel ---",}));
                $.each(response, function (kay, val) { 
                    $("#hot_cmb_hotels").append($('<option>', {
                        value: val.id,
                        text: val.name,
                    }));
                });
            }
        });
    });

    $("#btn_restaurants").click(function (e) { 
        e.preventDefault();
        $("#div_locations").css('display', 'none');
        $("#div_hotels").css('display', 'none');
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
                // console.log(response);
                $("#res_cmb_restaurants").empty();
                $("#res_cmb_restaurants").append($('<option>', {value: 0, text: "--- Select Restaurant ---",}));
                $.each(response, function (kay, val) { 
                    $("#res_cmb_restaurants").append($('<option>', {
                        value: val.id,
                        text: val.name,
                    }));
                });
            }
        });
    });

    $("#btn_activities").click(function (e) { 
        e.preventDefault();
        $("#div_locations").css('display', 'none');
        $("#div_hotels").css('display', 'none');
        $("#div_restaurants").css('display', 'none');
        $("#div_activities").css('display', 'block');
        $("#div_travel").css('display', 'none');

        //get all activities
        $.ajax({
            type: "get",
            url: "/getActivities",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#act_cmb_activities").empty();
                $("#act_cmb_activities").append($('<option>', {value: 0, text: "--- Select Activity ---",}));
                $.each(response, function (kay, val) { 
                    $("#act_cmb_activities").append($('<option>', {
                        value: val.id,
                        text: val.name,
                    }));
                });
            }
        });
    });

    $("#btn_travel").click(function (e) { 
        e.preventDefault();
        $("#div_locations").css('display', 'none');
        $("#div_hotels").css('display', 'none');
        $("#div_restaurants").css('display', 'none');
        $("#div_activities").css('display', 'none');
        $("#div_travel").css('display', 'block');

        //get all travel media
        $.ajax({
            type: "get",
            url: "/getTravelMedia",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#tvl_cmb_travel").empty();
                $("#tvl_cmb_travel").append($('<option>', {value: 0, text: "--- Select Travel Media ---",}));
                $.each(response, function (kay, val) { 
                    $("#tvl_cmb_travel").append($('<option>', {
                        value: val.id,
                        text: val.name,
                    }));
                });
            }
        });
    });

});//jQuery