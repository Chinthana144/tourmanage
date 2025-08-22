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
        var url = URL.createObjectURL(event.target.files[0]);
        $("#profile_image_preview").attr("src", url);
    });

});
