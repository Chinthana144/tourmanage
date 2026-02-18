$(document).ready(function () {
    $("#cover_image_error").css('display','none');
    $("#image_1_error").css('display','none');
    $("#image_2_error").css('display','none');


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
});//jQuery end
