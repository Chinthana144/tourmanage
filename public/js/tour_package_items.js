$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $("#div_main").on('click', '.btn_add_hotel_price', function () {
        var routeID = $(this).data('route-id');
        var packageID = $(this).data('package-id');
        var hotelID = $(this).data('hotel-id');

        $("#hotel_add_modal").modal('toggle');

        $("#hot_tour_route_id").val(routeID);
        $("#hot_package_id").val(packageID);
        $("#hot_hotel_id").val(hotelID);

        switch (packageID) {
            case  1:
                $("#hotel_add_modal .modal-title").text("Standard Hotel Package");
            break;
            case 2:
                $("#hotel_add_modal .modal-title").text("Comfort Hotel Package");
            break;
            case 3:
                $("#hotel_add_modal .modal-title").text("Premium Hotel Package");
            break;
        
            default:
                $("#hotel_add_modal .modal-title").text("Hotel Package");
            break;
        }//switch
        
        //get hotel facilities
        $.ajax({
            type: "get",
            url: "/getHotelFacilities",
            data: {
                hotel_id: hotelID
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                var htmlfacilities = "<div class='row mt-2'>";

                $.each(response, function (key, val) { 
                    htmlfacilities +="<div class='col-md-4'>";
                    htmlfacilities +="<div class='form-check form-switch'>";
                    htmlfacilities +="<input class='form-check-input' type='checkbox' role='switch' id='chk_facility_"+val.facility_id+"' name='chk_facility_"+val.facility_id+"'>";
                    htmlfacilities +="<label class='form-check-label' for='chk_facility_"+val.facility_id+"'>"+val.name+"</label>";
                    htmlfacilities +="</div>";
                    htmlfacilities +="</div>";
                });

                htmlfacilities +="</div>";

                $("#div_hotel_facilities").html(htmlfacilities);
            }
        });
    });

    $("#div_main").on('click', '.btn_add_room_price', function(){
        var routeID = $(this).data('route-id');
        var packageID = $(this).data('package-id');
        var routePeopleID = $(this).data('tour-people-id');

        $("#room_add_modal").modal('toggle');

        //get one tour people
        $.ajax({
            type: "get",
            url: "/getOneRequestPeople",
            data: {
                request_people_id: routePeopleID
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#tour_package_id").val(packageID);
                $("#tour_route_item_id").val(routeID);
                $("#tour_request_people_id").val(routePeopleID);
                
                $("#req_adult_count").val(response.adults);
                $("#req_children_count").val(response.children);
                $("#req_room_quantity").val(response.quantity);

                response.extra_bed ? $("#req_extra_bed_price").prop('readonly', false) : $("#req_extra_bed_price").prop('readonly', true);

            }
        });
    });

    $("#btn_add_room").click(function (e) { 
        e.preventDefault();
        var routeID = $("#tour_route_item_id").val();
        var packageID = $("#tour_package_id").val();
        var routePeopleID = $("#tour_request_people_id").val();

        // Add room logic here
        $.ajax({
            type: "post",
            url: "/store-tour-room",
            data: {
                tour_route_item_id: routeID,
                tour_package_id: packageID,
                tour_request_people_id: routePeopleID,
                room_type_id: $("#cmb_room_type").val(),
                bed_type_id: $("#cmb_bed_type").val(),
                base_adults: $("#req_adult_count").val(),
                base_children: $("#req_children_count").val(),
                room_quantity: $("#req_room_quantity").val(),
                extra_bed_price: $("#req_extra_bed_price").val(),
                price_per_night: $("#req_price_per_night").val()
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                
            }
        });
    });

    $("#div_main").on('click', '.btn_open', function(){
        var routeID = $(this).data('route-id');

        $("#div_room_packages_" + routeID).toggleClass('d-none');
    });

    $("#div_main").on('click', '.btn_open_hotel', function(){
        var routeID = $(this).data('route-id');

        $("#div_hotel_packages_" + routeID).toggleClass('d-none');
    });
});//jQuery