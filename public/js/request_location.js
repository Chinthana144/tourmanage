$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change', '.chk_location', function(){
        let locationID = $(this).data('location-id');
        let tourRequestID = $(this).data('tour-request-id');
        let isChecked = $(this).is(':checked');

        console.log('location = ' + locationID);
        console.log('request = ' + tourRequestID);
        

        if(isChecked)
        {
            $.ajax({
                type: 'POST',
                url: "/storeTourRequestLocation",
                data: {
                    tour_request_id: tourRequestID,
                    location_id: locationID,
                },
                // dataType: "dataType",
                success: function (response) {
                    console.log(response);
                }
            });
        }

   }); 
});//request locatiomn jQuery