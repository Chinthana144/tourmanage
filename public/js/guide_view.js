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

    $("#div_guide_rate").on('click', '.icon_star', function(){
        var value = $(this).data('value');
        switch (value) {
            case 1:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 2:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 3:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 4:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_four").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
            case 5:
                $(".star_one").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_two").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_three").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_four").removeClass('bx bx-star').addClass('bx bxs-star');
                $(".star_five").removeClass('bx bx-star').addClass('bx bxs-star');
            break;
            default:
                $(".star_one").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_two").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_three").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_four").removeClass('bx bxs-star').addClass('bx bx-star');
                $(".star_five").removeClass('bx bxs-star').addClass('bx bx-star');
            break;
        }//switch
        $("#guide_rate").val(value);
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

    $("#tbl_guides").on('click', '.btn_edit_guide', function(){
        var guideID = $(this).data('id');

        
    });
});//guide view jQuery