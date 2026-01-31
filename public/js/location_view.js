$(document).ready(function () {
    $(".div_image_gallery").on('click', ".div_gallery_items", function(){
        var image = $(this).data('image');

        $(".img_slide img").fadeOut(200, function(){
            $(".img_slide img").attr('src', image);
            $(".img_slide img").fadeIn(500);
        });

    });
});//location view
