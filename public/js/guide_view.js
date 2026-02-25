$(document).ready(function () {
    $("#btn_add_guide").click(function (e) { 
        e.preventDefault();
        $("#add_guide_modal").modal('toggle');
    });

    $("#cmb_travel_media").select2({
        placeholder: 'Search vehicle',
        ajax:{
            // type:"get",
            url:"/searchTravelMedia",
            dataType: "json",
            delay:250,
            data: function(params){
                return{
                    q: params.term
                };
            },
            processResults: function(data){
                return {
                    results: data.map(travelMedia => ({
                        id: travelMedia.id,
                        text: travelMedia.name,
                    }))
                };
            },
            cache: true,
            minimumInputLength: 1,
        },
        
    });
});//guide view jQuery