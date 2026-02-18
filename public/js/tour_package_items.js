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
        // alert(txt_price);
        
    });

    $("#div_main").on('keyup', '.txt_distance', function(){
        var distance = $(this).val();
        var pericePerKm = $(this).data('price-per-km');

        if(distance == null)
        {
            distance = 0;
        }

        var price = parseFloat(pericePerKm) * parseFloat(distance);
        $(this).closest('tr').find('.txt_price').val(price);
    });

});//jQuery