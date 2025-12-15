$(document).ready(function () {
    $("#cover_image_error").css('display','none');
    $("#image_1_error").css('display','none');
    $("#image_2_error").css('display','none');

    // Get districts by province
    $("#cmb_province").change(function(){
        var province_id = $(this).val();

        $.ajax({
            type: "get",
            url: "/get-districts-by-province",
            data: {province_id: province_id},
            // dataType: "dataType",
            success: function (response) {
                var $districtSelect = $("#cmb_district");
                $districtSelect.empty();
                $districtSelect.append($('<option>', {
                    value: '0',
                    text: '--- Select District ---'
                }));
                $.each(response, function(index, district) {
                    $districtSelect.append($('<option>', {
                        value: district.id,
                        text: district.name_en
                    }));
                });
            }
        });
    });

    // Get cities by district
    $("#cmb_district").change(function(){
        var district_id = $(this).val();

        $.ajax({
            type: "get",
            url: "/get-cities-by-district",
            data: {district_id: district_id},
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                var $citySelect = $("#cmb_city");
                $citySelect.empty();
                $citySelect.append($('<option>', {
                    value: '0',
                    text: '--- Select City ---'
                }));
                $.each(response, function(index, city) {
                    $citySelect.append($('<option>', {
                        value: city.id,
                        text: city.name_en
                    }));
                });
            }
        });
    });

    // Get one city by id
     $("#cmb_city").change(function(){
        var city_id = $(this).val();

        $.ajax({
            type: "get",
            url: "/get-one-city-by-id",
            data: {city_id: city_id},
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#txt_restaurant_latitude").val(response.latitude);
                $("#txt_restaurant_longitude").val(response.longitude);
            }
        });
    });

    //show cover image
    $("#cover_image").change(function(){
        var size=this.files[0].size;
        if(size>5242880){
            $("#cover_image_error").css('display','block');
            $('#cover_image_preview').attr('src', '');
            $(this).val('');
        }
        else{
            $('#cover_image_error').css('display', 'none');
            $("#cover_image").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#cover_image_preview").attr("src", url);
        }
    });

    $("#image_1").change(function(){
        var size=this.files[0].size;
        if(size>5242880){
            $("#image_1_error").css('display','block');
            $('#image_1_preview').attr('src', '');
            $(this).val('');
        }
        else{
            $('#image_1_error').css('display', 'none');
            $("#image_1").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#image_1_preview").attr("src", url);
        }
    });

    $("#image_2").change(function(){
        var size=this.files[0].size;
        if(size>5242880){
            $("#image_2_error").css('display','block');
            $('#image_2_preview').attr('src', '');
            $(this).val('');
        }
        else{
            $('#image_2_error').css('display', 'none');
            $("#image_2").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#image_2_preview").attr("src", url);
        }
    });
});//restaurant jQuery