$(document).ready(function () {
    $(".div_image_gallery").on('click', ".div_gallery_items", function(){
        var image = $(this).data('image');

        var locationID = $(this).data('id');

        $('#img_display_'+locationID).fadeOut(200, function(){
            $("#img_display_"+locationID).attr('src', image);
            $("#img_display_"+locationID).fadeIn(500);
        });

    });
});//location view
