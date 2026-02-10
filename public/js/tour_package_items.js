$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#div_main").on('click', '.chk_price', function(){
        var itemID = $(this).data('item-id');

        // alert(itemID);
        
        var txt_price = $(this).closest('tr').find('.txt_price').val();

        console.log(txt_price);
        
    });

});//jQuery