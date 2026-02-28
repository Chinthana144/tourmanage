$(document).ready(function () {
    $("#message_warning").css('display', 'none');

    $("#btn_add_guide").click(function (e) { 
        e.preventDefault();
        $("#add_guide_modal").modal('toggle');
    });

    $("#cmb_travel_media").select2({
        dropdownParent: $('#add_guide_modal'),
        placeholder: 'Search vehicle',
        ajax:{
            // type:"get",
            url:"/searchTravelMedia",
            dataType: "json",
            delay:250,
            data: function(params){
                return{
                    q: params.term
                };
            },
            processResults: function(data){
                return {
                    results: data.map(travelMedia => ({
                        id: travelMedia.id,
                        text: travelMedia.name + " | " + travelMedia.vehicle_No,
                    }))
                };
            },
        },
        cache: true,
        minimumInputLength: 1,
    });

    $(".div_guide_rate").on('click', '.icon_star', function(){
        var value = $(this).data('value');
        switch (value) {
            case 1:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');

                $(".edit_star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_two").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".edit_star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".edit_star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".edit_star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 2:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');

                $(".edit_star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".edit_star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".edit_star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 3:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');

                $(".edit_star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".edit_star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 4:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_four").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');

                $(".edit_star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_four").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 5:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_four").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_five").removeClass('bx bx-star').addClass('bx bxs-star');

                $(".edit_star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_four").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".edit_star_five").removeClass('bx bx-star').addClass('bx bxs-star');
            break;
            default:
                $(".star_one").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_two").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');

                $(".edit_star_one").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".edit_star_two").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".edit_star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".edit_star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".edit_star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
        }//switch
        $("#guide_rate").val(value);
        $("#edit_guide_rate").val(value);
    });

    $("#profile_image").change(function(event){
        var size=this.files[0].size;
        if(size>5242880){//5MB
            $('#message_warning').css('display', 'block');
            $('#message_warning').html('Image size should be less than 5MB');
            $("#profile_image").val('');
            $("#profile_image_preview").attr("src", "/images/locations/no-image.png");
            $("#profile_image").css('border-color', 'red');
            return;
        }
        else{
            $('#message_warning').css('display', 'none');
            $("#profile_image").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#profile_image_preview").attr("src", url);
        }
    });

    $("#edit_cmb_travel_media").select2({
        dropdownParent: $('#edit_guide_modal'),
        placeholder: 'Search vehicle',
        ajax:{
            // type:"get",
            url:"/searchTravelMedia",
            dataType: "json",
            delay:250,
            data: function(params){
                return{
                    q: params.term
                };
            },
            processResults: function(data){
                return {
                    results: data.map(travelMedia => ({
                        id: travelMedia.id,
                        text: travelMedia.name + " | " + travelMedia.vehicle_No,
                    }))
                };
            },
        },
        cache: true,
        minimumInputLength: 1,
    });

    $("#edit_profile_image").change(function(event){
        var size=this.files[0].size;
        if(size>5242880){//5MB
            $('#edit_message_warning').css('display', 'block');
            $('#edit_message_warning').html('Image size should be less than 5MB');
            $("#edit_profile_image").val('');
            $("#edit_profile_image_preview").attr("src", "/images/locations/no-image.png");
            $("#edit_profile_image").css('border-color', 'red');
            return;
        }
        else{
            $('#edit_message_warning').css('display', 'none');
            $("#edit_profile_image").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#edit_profile_image_preview").attr("src", url);
        }
    });

    $("#tbl_guides").on('click', '.btn_edit_guide', function(){
        var guideID = $(this).data('id');

        $.ajax({
            type: "get",
            url: "/getOneGuide",
            data: {
                guide_id: guideID,
            },
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                
                $("#edit_guide_modal").modal('toggle');

                $("#hide_guide_id").val(response['id']);
                $("#edit_name").val(response['name']);
                $("#edit_phone").val(response['phone']);
                $("#edit_email").val(response['email']);
                
                //travel media
                if(response['travel_media_id'] > 0)
                {
                    $("#p_travel_media").html("Name: <b>"+ response['travel_name'] +"</b> No:<b>"+ response['travel_no'] +"</b>");
                    $("#hide_travel_media_id").val(response['travel_media_id']);
                }
                else{
                    $("#p_travel_media").html("<span class='badge bg-secondary'>No Vehicle</span>");
                }

                //languages
                response['english'] == 1 ? $("#edit_chk_language_english").prop('checked', true) : $("#edit_chk_language_english").prop('checked', false);
                response['japanese'] == 1 ? $("#edit_chk_language_japanese").prop('checked', true) : $("#edit_chk_language_japanese").prop('checked', false);
                response['sinhala'] == 1 ? $("#edit_chk_language_sinhala").prop('checked', true) : $("#edit_chk_language_sinhala").prop('checked', false);
                response['tamil'] == 1 ? $("#edit_chk_language_tamil").prop('checked', true) : $("#edit_chk_language_tamil").prop('checked', false);

                //rate
                $("#edit_guide_rate").val(response['rate']);
                switch (response['rate']) {
                    case 1:
                        $(".edit_star_one").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_two").removeClass('bx bxs-start').addClass('bx bx-star');
                        $(".edit_star_three").removeClass('bx bxs-start').addClass('bx bx-star');
                        $(".edit_star_four").removeClass('bx bxs-start').addClass('bx bx-star');
                        $(".edit_star_five").removeClass('bx bxs-start').addClass('bx bx-star');    
                    break;
                    case 2:
                        $(".edit_star_one").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_two").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_three").removeClass('bx bxs-start').addClass('bx bx-star');
                        $(".edit_star_four").removeClass('bx bxs-start').addClass('bx bx-star');
                        $(".edit_star_five").removeClass('bx bxs-start').addClass('bx bx-star');    
                    break;
                    case 3:
                        $(".edit_star_one").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_two").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_three").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_four").removeClass('bx bxs-start').addClass('bx bx-star');
                        $(".edit_star_five").removeClass('bx bxs-start').addClass('bx bx-star');    
                    break;
                    case 4:
                        $(".edit_star_one").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_two").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_three").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_four").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_five").removeClass('bx bxs-start').addClass('bx bx-star');    
                    break;
                    case 5:
                        $(".edit_star_one").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_two").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_three").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_four").removeClass('bx bx-start').addClass('bx bxs-star');
                        $(".edit_star_five").removeClass('bx bx-start').addClass('bx bxs-star');    
                    break;
                    default:
                        $(".edit_star_one").removeClass('bx bxs-start').addClass('bx bx-star');
                        $(".edit_star_two").removeClass('bx bxs-start').addClass('bx bx-star');
                        $(".edit_star_three").removeClass('bx bxs-start').addClass('bx bx-star');
                        $(".edit_star_four").removeClass('bx bxs-start').addClass('bx bx-star');
                        $(".edit_star_five").removeClass('bx bxs-start').addClass('bx bx-star'); 
                    break;
                }

                //load profile image
                if(response['profile_image'] != null)
                {
                    $("#edit_profile_image_preview").prop('src', 'images/guides/' + response['profile_image']);
                }
            }
        });
    });

    //travel media select changed
    $("#edit_cmb_travel_media").change(function(){
        var travelMediaID = $(this).val();
        $("#hide_travel_media_id").val(travelMediaID);
    });
});//guide view jQuery