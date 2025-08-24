$(document).ready(function () {
    $('#message_warning').css('display', 'none');
    $('#message_edit_warning').css('display', 'none');

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

        $.ajax({
            type: "get",
            url: "/getOneUser",
            data: {user_id: id},
            // dataType: "dataType",
            success: function (response) {
                // console.log(response);

                $('#userEditModal').modal('toggle');

                $("#hidden_user_id").val(response.id);

                $("#hidden_user_id").val(response.id);
                $("#first_name").val(response.first_name);
                $("#last_name").val(response.last_name);
                $("#phone1").val(response.phone1);
                $("#phone2").val(response.phone2);
                $("#email").val(response.email);
                // $("#password").val(response.password);
                $("#cmb_edit_roles").val(response.role_id);
                if(response.profile_image){
                    $("#image_edit_preview").attr("src", "/images/profiles/"+response.profile_image);
                }
                else{
                    $("#image_edit_preview").attr("src", "/images/profiles/profile.jpg");
                }
                $("#editUserModal").modal('toggle');
            }
        });
    });

    $("#profile_edit_image").change(function(event){
        var size=this.files[0].size;
        if(size>5242880){//5MB
            $('#message_warning').css('display', 'block');
            $('#message_warning').html('Image size should be less than 1MB');
            $("#profile_edit_image").val('');
            $("#image_edit_preview").attr("src", "/images/profiles/profile.jpg");
            $("#profile_edit_image").css('border-color', 'red');
            return;
        }
        else{
            $('#message_warning').css('display', 'none');
            $("#profile_edit_image").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#image_edit_preview").attr("src", url);
        }
    });

});
