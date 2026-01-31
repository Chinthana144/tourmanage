$(document).ready(function () {
    $("#div_populatiry").on('click', '.icon_star', function(){
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
        $("#popularity").val(value);
    });
});//common jQuery
