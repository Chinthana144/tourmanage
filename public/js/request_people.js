$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var tour_request_id = $("#tour_request_id").val();
    loadRequestPeople(tour_request_id);

    //initialize
    $("#div_quantity").css('display', 'none');
    $("#div_button").css('display', 'none');
    $("#div_adult_count").css('display', 'none');
    $("#div_children_count").css('display', 'none');
    $("#div_extra_bed").css('display', 'none');

    //change
    $("#cmb_group_composition").change(function (e) { 
        e.preventDefault();
        var composition_id = $(this).val();
        
        if(composition_id > 0)
        {
            $("#div_quantity").css('display', 'block');
            $("#div_button").css('display', 'block');
            switch (composition_id) {
                case "1":
                    $("#div_adult_count").css('display', 'none');
                    $("#div_children_count").css('display', 'none');
                    $("#div_extra_bed").css('display', 'none');
                break;
                case "2":
                    $("#div_adult_count").css('display', 'none');
                    $("#div_children_count").css('display', 'none');
                    $("#div_extra_bed").css('display', 'none');
                break;
                case "3":
                    $("#div_adult_count").css('display', 'block');
                    $("#div_children_count").css('display', 'block');
                    $("#div_extra_bed").css('display', 'block');
                break;
                case "4":
                    $("#div_adult_count").css('display', 'block');
                    $("#div_children_count").css('display', 'none');
                    $("#div_extra_bed").css('display', 'block');
                break;
            
                default:
                    alert('null point exception');
                break;
            }
        }//has composition
        else
        {
            $("#div_quantity").css('display', 'none');
            $("#div_button").css('display', 'none');
        }//no composition
    });

    $("#btn_add_people").click(function (e) { 
        e.preventDefault();
        var tour_request_id = $("#tour_request_id").val();
        var composition_id = $("#cmb_group_composition").val();
        var quantity = $("#num_quantity").val();

        var adults = $("#num_adult_count").val() == "" ? 0 : $("#num_adult_count").val();
        var children = $("#num_children_count").val() == "" ? 0 : $("#num_children_count").val();

        var extra_bed = $("#chk_extra_bed").is(":checked") ? 1 : 0;

        $.ajax({
            type: "post",
            url: "/storeRequestPeople",
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
                $("#div_quantity").css('display', 'none');
                $("#div_button").css('display', 'none');
                $("#div_adult_count").css('display', 'none');
                $("#div_children_count").css('display', 'none');
                $("#div_extra_bed").css('display', 'none');  
                $("#cmb_group_composition").val(0);

                loadRequestPeople(tour_request_id);
            }
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
                    htmlData += "<td><button type='button' class='btn btn-danger btn-sm btn_remove_people'><i class='bx bx-trash'></i></button></td>";
                    htmlData += "</tr>";
                });

                htmlData += "</table>";

                $("#div_request_people").html(htmlData);

                var totals = "Total Adults: <b>"+ totalAdults +"</b><br>Total Children: <b>"+ totalChildren +"</b>";
                $("#h5_totals").html(totals);
            }
        });
    }//load request people
});//jQuery