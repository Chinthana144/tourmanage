$(document).ready(function () {
    $("#btn_add_price").click(function(){
        $("#add_price_modal").modal('toggle');
    });

    //room type change
    $("#cmb_room_type").change(function(){
        var room_type_id = $(this).val();

        $.ajax({
            type: "get",
            url: "/getOneRoom",
            data: {
                room_id: room_type_id
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                var amenties = JSON.parse(response.amenities);

                var p_details = "Adults: " + response.max_adults + " Children: " + response.max_children + " Total guests: " + response.max_guests_total + "<br>";
                p_details += "Amenities: <br>";
                if(amenties.air_conditioning == 1)
                    {p_details += "<span class='badge bg-primary'>Air Conditioning</span> ";}
                if(amenties.wifi == 1)
                    {p_details += "<span class='badge bg-primary'>Wifi</span> ";}
                if(amenties.tv == 1)
                    {p_details += "<span class='badge bg-primary'>TV</span> ";}
                if(amenties.mini_fridge == 1)
                    {p_details += "<span class='badge bg-primary'>Mini Fridge</span> ";}
                if(amenties.mini_bar == 1)
                    {p_details += "<span class='badge bg-primary'>Mini Bar</span> ";}
                if(amenties.coffee_maker == 1)
                    {p_details += "<span class='badge bg-primary'>Coffee Maker</span> ";}
                if(amenties.balcony == 1)
                    {p_details += "<span class='badge bg-primary'>Balcony</span> ";}
                if(amenties.safety_box == 1)
                    {p_details += "<span class='badge bg-primary'>Safety Box</span> ";}
                if(amenties.hot_water == 1)
                    {p_details += "<span class='badge bg-primary'>Hot Water</span> ";}
                if(amenties.bathtub == 1)
                    {p_details += "<span class='badge bg-primary'>Bathtub</span> ";}
                if(amenties.shower == 1)
                    {p_details += "<span class='badge bg-primary'>Shower</span> ";}
                if(amenties.hair_dryer == 1)
                    {p_details += "<span class='badge bg-primary'>Hair Dryer</span> ";}
                if(amenties.towels == 1)
                    { p_details += "<span class='badge bg-primary'>Towels</span> ";}
                if(amenties.toiletries == 1)
                    {p_details += "<span class='badge bg-primary'>Toiletries</span> ";}
                
                    p_details += "<br>Others: <br>"

                //sepcial ones
                if(response.smoking_allowed == 1)
                    {p_details += "<span class='badge bg-success'>Smorking Allowed</span> ";}
                if(response.has_breakfast == 1)
                    {p_details += "<span class='badge bg-success'>Has Breakfast</span> ";}
                if(response.has_free_cancellation == 1)
                    {p_details += "<span class='badge bg-success'>Free Cancellation</span> ";}
                if(response.extra_bed_allowed == 1)
                    {p_details += "<span class='badge bg-success'>Extra Bed Allowed</span> ";}

                p_details += "<br>Prices: <br>"

                p_details += "Extra bed price: <b>"+ response.extra_bed_price +"</b><br>";
                p_details += "Base price: <b>"+ response.base_price_per_night +"</b><br>";

                $("#p_room_details").html(p_details);

                //set base price
                $("#price_per_night").val(response.base_price_per_night);
            }
        });
    });
});//price view jQuery