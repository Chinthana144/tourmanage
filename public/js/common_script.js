$(document).ready(function () {
    $(".div_populatiry").on('click', '.icon_star', function(){
        var value = $(this).data('value');
        switch (value) {
            case 1:
                $(".star_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_two").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 2:
                $(".star_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 3:
                $(".star_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 4:
                $(".star_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_four").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 5:
                $(".star_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_four").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_five").removeClass('bi bi-star').addClass('bi bi-star-fill');
            break;
            default:
                $(".star_one").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_two").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
        }//switch
        $("#popularity").val(value);
    });

    $(".div_edit_populatiry").on('click', '.icon_star', function(){
        var value = $(this).data('value');
        
        switch (value) {
            case 1:
                $(".star_edit_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_two").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 2:
                $(".star_edit_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 3:
                $(".star_edit_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 4:
                $(".star_edit_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_four").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 5:
                $(".star_edit_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_four").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_edit_five").removeClass('bi bi-star').addClass('bi bi-star-fill');
            break;
            default:
                $(".star_edit_one").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_two").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_edit_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
        }//switch
        $("#edit_popularity").val(value);
    });

    $(".div_start_rating").on('click', '.icon_star', function(){
        var value = $(this).data('value');
        switch (value) {
            case 1:
                $(".star_rate_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_two").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_rate_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_rate_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_rate_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 2:
                $(".star_rate_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_rate_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_rate_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 3:
                $(".star_rate_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_rate_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 4:
                $(".star_rate_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_four").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
            case 5:
                $(".star_rate_one").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_two").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_three").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_four").removeClass('bi bi-star').addClass('bi bi-star-fill');
                $(".star_rate_five").removeClass('bi bi-star').addClass('bi bi-star-fill');
            break;
            default:
                $(".star_rate_one").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_rate_two").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_rate_three").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_rate_four").removeClass('bi bi-star-fill').addClass('bi bi-star');
                $(".star_rate_five").removeClass('bi bi-star-fill').addClass('bi bi-star');
            break;
        }//switch
        $("#star_rating").val(value);
    });
});//common jQuery
