$(document).ready(function (event) {
    $("#cover_image_error").css('display', 'none');

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
});//jquery
