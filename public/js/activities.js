$(document).ready(function () {
    $("#btn_add_activity").click(function(){
        $("#add_activity_modal").modal('toggle');
    });

    $("#tbl_activities").on('click', '.btn_edit_activity', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        alert("id = " + id);
    });
});//activities jQuery