$(document).ready(function () {
    $("#cmb_province").change(function(){
        var province_id = $(this).val();

        $.ajax({
            type: "get",
            url: "/get-districts-by-province",
            data: {province_id: province_id},
            // dataType: "dataType",
            success: function (response) {
                var $districtSelect = $("#cmb_district");
                $districtSelect.empty();
                $districtSelect.append($('<option>', {
                    value: '0',
                    text: '--- Select District ---'
                }));
                $.each(response, function(index, district) {
                    $districtSelect.append($('<option>', {
                        value: district.id,
                        text: district.name_en
                    }));
                });
            }
        });
    });
});
