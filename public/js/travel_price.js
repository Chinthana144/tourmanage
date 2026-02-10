$(document).ready(function () {
    $("#btn_add_price").click(function (e) { 
        e.preventDefault();
        $("#add_travel_price_modal").modal('toggle');
    });
});