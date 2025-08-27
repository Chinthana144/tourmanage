$(document).ready(function () {
    // when province changes
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

    // when district changes
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

    $("#cmb_city").change(function(){
        var city_id = $(this).val();

        $.ajax({
            type: "get",
            url: "/get-one-city-by-id",
            data: {city_id: city_id},
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);
                $("#txt_latitude").val(response.latitude);
                $("#txt_longitude").val(response.longitude);
            }
        });
    });

    //show image when select image
    $("#primary_image").change(function(event){
        var size=this.files[0].size;
        if(size>5242880){//5MB
            $('#message_warning').css('display', 'block');
            $('#message_warning').html('Image size should be less than 5MB');
            $("#primary_image").val('');
            $("#primary_image_preview").attr("src", "/images/locations/no-image.png");
            $("#primary_image").css('border-color', 'red');
            return;
        }
        else{
            $('#message_warning').css('display', 'none');
            $("#primary_image").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#primary_image_preview").attr("src", url);
        }
    });

    //image 1
    $("#image1").change(function(event){
        var size=this.files[0].size;
        if(size>5242880){//5MB
            $('#message_warning').css('display', 'block');
            $('#message_warning').html('Image size should be less than 5MB');
            $("#image1").val('');
            $("#image1_preview").attr("src", "/images/locations/no-image.png");
            $("#image1").css('border-color', 'red');
            return;
        }
        else{
            $('#message_warning').css('display', 'none');
            $("#image1").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#image1_preview").attr("src", url);
        }
    });

    //image 2
    $("#image2").change(function(event){
        var size=this.files[0].size;
        if(size>5242880){//5MB
            $('#message_warning').css('display', 'block');
            $('#message_warning').html('Image size should be less than 5MB');
            $("#image2").val('');
            $("#image2_preview").attr("src", "/images/locations/no-image.png");
            $("#image2").css('border-color', 'red');
            return;
        }
        else{
            $('#message_warning').css('display', 'none');
            $("#image2").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#image2_preview").attr("src", url);
        }
    });

    //image 3
    $("#image3").change(function(event){
        var size=this.files[0].size;
        if(size>5242880){//5MB
            $('#message_warning').css('display', 'block');
            $('#message_warning').html('Image size should be less than 5MB');
            $("#image3").val('');
            $("#image3_preview").attr("src", "/images/locations/no-image.png");
            $("#image3").css('border-color', 'red');
            return;
        }
        else{
            $('#message_warning').css('display', 'none');
            $("#image3").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#image3_preview").attr("src", url);
        }
    });

    //image 4
    $("#image4").change(function(event){
        var size=this.files[0].size;
        if(size>5242880){//5MB
            $('#message_warning').css('display', 'block');
            $('#message_warning').html('Image size should be less than 5MB');
            $("#image4").val('');
            $("#image4_preview").attr("src", "/images/locations/no-image.png");
            $("#image4").css('border-color', 'red');
            return;
        }
        else{
            $('#message_warning').css('display', 'none');
            $("#image4").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#image4_preview").attr("src", url);
        }
    });
});
