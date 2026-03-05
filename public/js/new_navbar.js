$(document).ready(function () {
    var navbarExpanded = false;

    $("#btn_toggler").click(function (e) { 
        e.preventDefault();
        var width = $("#side_navbar").css('width');
        console.log(width);
        
        if($("#side_navbar").css('width') == '270px')
        {
            var width = $("#side_navbar").css('width');
            $("#side_navbar").css('width', '56px');
            
            navbarExpanded = true;

            //header setup
            $(".side-header").css('flex-direction', 'column');

            $(".nav-item-label").css('display', 'none');
        }
        else{
            $("#side_navbar").css('width', '270px');

            navbarExpanded = false;

            //header setup
            $(".side-header").css('flex-direction', 'row');

            $(".nav-item-label").css('display', 'block');
        }
    });

    //hover
    $(".nav-button").hover(
        function(){
            if(navbarExpanded){
                var label = $(this).closest('.navbar-item').find('.div_label');
                label.fadeIn(200);
            }
        },
        function(){
            var label = $(this).closest('.navbar-item').find('.div_label');
            label.hover(
                function(){
                    label.css('display', 'block');
                },
                function(){
                    label.fadeOut(200);
                }
            );
        }//hover out
    );

    $("#btn_nav_routes").click(function (e) { 
        e.preventDefault();
        if(!navbarExpanded){
            if($("#route-list").css('display') == 'none'){
                $("#route-list").fadeIn(300);
            }
            else{
                $("#route-list").fadeOut(200);
            }
        }
    });
});