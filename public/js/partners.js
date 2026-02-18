$(document).ready(function () {
    $("#logo_error").css('display', 'none');

    $("#btn_add_partner").click(function (e) {
        e.preventDefault();
        $("#add_partner_modal").modal('toggle');
    });

    $("#partner_logo").change(function (event) {
        var size=this.files[0].size;
        if(size>5242880){
            $("#logo_error").css('display','block');
            $('#partner_logo_preview').attr('src', '');
            $(this).val('');
        }
        else{
            $('#logo_error').css('display', 'none');
            $("#partner_logo").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#partner_logo_preview").attr("src", url);
        }
    });

    $("#tbl_partners").on('click', '.btn_edit_partner', function(){
        var partner_id = $(this).data('id');

        // alert("id = " + partner_id);
        $.ajax({
            type: "get",
            url: "/getOnePartner",
            data: {
                partner_id: partner_id,
            },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);

                $("#edit_partner_modal").modal('toggle');

                $("#hide_partner_id").val(response['id']);
                $("#edit_partner_name").val(response['name']);
                $("#edit_partner_description").val(response['description']);
                $("#edit_partner_logo_preview").prop('src', 'images/main/partners/' + response['logo']);
                response['status'] == 1 ? $("#edit_chk_status").prop('checked', true) : $("#edit_chk_status").prop('checked', false);
            }
        });
    });

    $("#edit_partner_logo").change(function (event) {
        var size=this.files[0].size;
        if(size>5242880){
            $("#edit_logo_error").css('display','block');
            $('#edit_partner_logo_preview').attr('src', '');
            $(this).val('');
        }
        else{
            $('#edit_logo_error').css('display', 'none');
            $("#edit_partner_logo").css('border-color', 'green');

            var url = URL.createObjectURL(event.target.files[0]);
            $("#edit_partner_logo_preview").attr("src", url);
        }
    });
});//partners jquery
