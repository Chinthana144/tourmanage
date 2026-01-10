$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var tour_id = $("#hide_tour_id").val();
    //load table
    loadRouteItem(tour_id);

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

    //delete item
    $("#tbl_route_items").on('click', '.btn_delete_item', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "post",
            url: "/deleteRouteItem",
            data: {
                route_item_id : id,
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                
            }
        });
    });

    //item move
    $("#tbl_route_items").on('click', '.btn_move_up', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "get",
            url: "/routeMoveUp",
            data: {
                route_item_id : id,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                var tour_id = response.tour_id;
                loadRouteItem(tour_id);
            }
        });
    });

    //item move down
    $("#tbl_route_items").on('click', '.btn_move_down', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        $.ajax({
            type: "get",
            url: "/routeMoveDown",
            data: {
                route_item_id : id,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                var tour_id = response.tour_id;
                loadRouteItem(tour_id);

            }
        });
    });

    function loadRouteItem(tour_id)
    {
        //get route items by tour id
        $.ajax({
            type: "get",
            url: "/getRouteItemsByTourID",
            data: {
                tour_id: tour_id,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                var htmlItems = "<tr>";
                htmlItems += "<th>No</th>";
                htmlItems += "<th>Day</th>";
                htmlItems += "<th>Type</th>";
                htmlItems += "<th>Name</th>";
                htmlItems += "<th>Note</th>";
                htmlItems += "<th>Action</th>";
                htmlItems += "</tr>";

                $.each(response, function (key, val) { 
                    var routeType = "";
                    switch (val.item_type) {
                        case 'location':
                               routeType = "<span class='badge bg-primary'>Location</span>" 
                        break;
                        case 'hotel':
                               routeType = "<span class='badge bg-success'>Hotel</span>" 
                        break;
                        case 'restaurant':
                               routeType = "<span class='badge bg-warning'>Restaurant</span>" 
                        break;
                        case 'activity':
                               routeType = "<span class='badge bg-info'>Activity</span>" 
                        break;
                        case 'travel':
                               routeType = "<span class='badge bg-secondary'>Travel</span>" 
                        break;
                    
                        default:
                        break;
                    }

                    htmlItems += "<tr data-id='"+ val.id +"'>";
                    htmlItems += "<td>"+ val.order_no +"</td>";
                    htmlItems += "<td> Day "+ val.day_no +"</td>";
                    htmlItems += "<td>"+ routeType +"</td>";
                    htmlItems += "<td>"+ val.item_name +"</td>";
                    htmlItems += "<td>"+ val.notes +"</td>";
                    htmlItems += "<td><div class='d-flex'>";
                    htmlItems += "<button class='btn btn-outline-success btn-sm ms-1 btn_move_up'><i class='bx bx-caret-up'></i></button>";
                    htmlItems += "<button class='btn btn-outline-success btn-sm ms-1 btn_move_down'><i class='bx bx-caret-down'></i></button>";
                    htmlItems += "<button class='btn btn-outline-danger btn-sm ms-1 btn_delete_item'><i class='bx bx-trash'></i></button>";
                    htmlItems += "</div></td>";
                    htmlItems += "</tr>";
                });

                $("#tbl_route_items").html(htmlItems);

            }//success
        });
    }

});//jQuery