$(document).ready(function () {
    //initiatives
    $("#div_activities").css('display', 'none');

    //type change
    $("#cmb_routeble_type").change(function(){
        var routable_type = $(this).val();

        switch (routable_type) {
            case 'location':
                alert('location');
            break;
            case 'hotel':
                alert('hotel');
            break;
            case 'restaurants':
                alert('restaurants');
            break;
            case 'activities':
                $("#div_activities").css('display', 'block');
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
                            $("#act_routable_type").val('location');
                        });
                    }
                });
            break;
            case 'travel':
                alert('travel');
            break;
        
            default:
                break;
        }
    });

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

});//tour route jQuery  