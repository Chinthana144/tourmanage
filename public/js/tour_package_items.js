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

        // console.log(txt_price);
        // alert(txt_price);

        //get totals
        getTotals();
        
    });

    $("#div_main").on('keyup', '.txt_distance', function(){
        var distance = $(this).val();
        var pericePerKm = $(this).data('price-per-km');

        if(distance == null)
        {
            distance = 0;
        }

        var price = parseFloat(pericePerKm) * parseFloat(distance);
        $(this).closest('tr').find('.txt_price').val(price.toFixed(2));
    });


});//jQuery

function getTotals()
{
    var essential_price = 0;
    var classic_price = 0;
    var signature_price = 0;

    $("#div_main input[type='checkbox']:checked").each(function(){
        var price = $(this).closest('tr').find('.txt_price').val();
        price = parseFloat(price);
        var packageType = $(this).data('package-type');
        switch (packageType) {
            case "essential":
                essential_price += price;
            break;
            case "classic":
                classic_price += price;
            break;
            case "signature":
                signature_price += price;
            break;
        
            default:
            break;
        }
    });

    // console.log('essential - ' + essential_price.toFixed(2));
    // console.log('classic - ' + classic_price);
    // console.log('signature - ' + signature_price);

    $("#h5_essential_total").text(essential_price.toFixed(2));
    $("#h5_classic_total").text(classic_price.toFixed(2));
    $("#h5_signature_total").text(signature_price.toFixed(2));
    
}//get totals