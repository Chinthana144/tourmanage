$(document).ready(function () {
    //initialize visibility
    $("#div_locations").css('display', 'none');

    //locations
    $("#btn_locations").click(function (e) { 
        e.preventDefault();
        
        $("#div_locations").css('display', 'block');

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

    $("#").click(function (e) { 
        e.preventDefault();
        
    });

});//jQuery