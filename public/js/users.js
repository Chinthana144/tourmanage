$(document).ready(function () {
    $('#message_warning').css('display', 'none');

    $("#btn_open_register_modal").click(function(){
        $("#registerModal").modal('toggle');
    });

    //close modal
    $("#btn_close_register_modal").click(function(){
        $("#registerModal").modal('hide');
    });

    $("#profile_image").change(function(event){
        var size=this.files[0].size;
        if(size>5242880){//5MB
            $('#message_warning').css('display', 'block');
            $('#message_warning').html('Image size should be less than 1MB');
            $("#profile_image").val('');
            $("#profile_image_preview").attr("src", "/images/profiles/profile.jpg");
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

    $("#users_table").on('click', '.btn_edit_user', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        alert(id);
    });

});
