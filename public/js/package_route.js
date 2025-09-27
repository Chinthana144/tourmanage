$(document).ready(function () {
    $("#cmb_stoppable_type").change(function(){
        var type = $(this).val();

        if(type == 'location'){
            $.ajax({
                type: "get",
                url: "/getLocations",
                // data: "data",
                // dataType: "dataType",
                success: function (response) {
                    var location = $("#cmb_stoppable");
                    location.empty();
                    $.each(response, function (index, loc) {
                        location.append($('<option>', {
                            value: loc.id,
                            text: loc.name
                        }));
                    });
                }
            });
        }//location
        else{
            $.ajax({
                type: "get",
                url: "/getHotels",
                // data: "data",
                // dataType: "dataType",
                success: function (response) {
                    // console.log(response);
                    var hotels = $("#cmb_stoppable");
                    hotels.empty();
                    $.each(response, function (index, hot) {
                        hotels.append($('<option>', {
                            value: hot.id,
                            text: hot.name
                        }));
                    });
                }
            });
        }//hotel
    });
});//package route jQuery
