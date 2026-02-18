$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //hide success
    $("#sec_success").css('display', 'none');

    $("#div_destination").on('change', '.chk-destination', function(){
        var destinationID = $(this).data('destination-id');
        var tourRequestID = $(this).data('request-id');
        // alert('changers' + destinationID);
        var value = $(this).prop('checked');
        // alert('value = ' + value);

        $.ajax({
            type: "post",
            url: "/toggleTourDestinations",
            data: {
                location_id: destinationID,
                tour_request_id: tourRequestID,
                value: value,
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                if(response['success']){
                    showMessage(response['message']);
                }
                else{
                    showMessage("Something went wrong!", 'error');
                }
            }
        });
    });

    $("#btn_destination_submit").click(function (e) {
        // e.preventDefault();
        $("#sec_destination").fadeOut(300);
        $("#sec_success").css('display', 'block');
        $("#sec_success").fadeIn(300);
    });

    function showMessage(message, type='success')
    {
        $("#flash_message")
            .removeClass()
            .addClass(type)
            .text(message)
            .fadeIn(300)
            .delay(2000)
            .fadeOut(300);
    }
}); //tour destination jQuery
