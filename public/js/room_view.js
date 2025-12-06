$(document).ready(function () {
   
    $("#btn_add_rooms_modal").click(function(){
        $("#add_rooms_modal").modal('toggle');
    });

    //edit room modal
    $("#tbl_rooms").on('click', '.btn_edit_room', function(){
        let row = $(this).closest('tr');
        let id = row.data('id');

        
    });
});//room view jQuery