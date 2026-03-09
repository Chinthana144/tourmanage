$(document).ready(function () {
    var navbarExpanded = true;
    var mobileNavbarExpanded = false;

    $("#btn_toggler").click(function (e) { 
        e.preventDefault();
        var width = $("#side_navbar").css('width');
        // console.log(width);
        
        if($("#side_navbar").css('width') == '270px')
        {
            var width = $("#side_navbar").css('width');
            $("#side_navbar").css('width', '56px');
            
            navbarExpanded = true;

            //header setup
            $(".side-header").css('flex-direction', 'column');

            $(".nav-item-label").css('display', 'none');
            $(".div_menu").css('display', 'none');
            $(".nav-button i").css('margin', '0');
            $("#div_page").css('margin-left', '56px');
            $("#btn_toggler").removeClass('icon_in');
        }
        else{
            $("#side_navbar").css('width', '270px');

            navbarExpanded = false;

            //header setup
            $(".side-header").css('flex-direction', 'row');

            $(".nav-item-label").css('display', 'block');
            $(".div_label").fadeOut(200);
            $("#div_page").css('margin-left', '270px');
            $("#btn_toggler").addClass('icon_in');
        }
    });

    //hover
    $(".nav-button").hover(
        function(){
            if(navbarExpanded){
                var label = $(this).closest('.navbar-item').find('.div_label');
                $(".div_label").fadeOut(200);
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

    $("#btn_nav_packages").click(function(e){
        e.preventDefault();
        if(!navbarExpanded){
            if($("#package_menu").css('display') == 'none'){
                $("#package_menu").fadeIn(300);
            }
            else{
                $("#package_menu").fadeOut(300);
            }
        }
    });

    $("#btn_nav_routes").click(function (e) { 
        e.preventDefault();
        if(!navbarExpanded){
            if($("#route_menu").css('display') == 'none'){
                $("#route_menu").fadeIn(300);
            }
            else{
                $("#route_menu").fadeOut(200);
            }
        }
    });

    //=================== Mobile navbar =================//
    $("#btn_mobile_toggler").click(function(){
        if(mobileNavbarExpanded == false){
            $("#navbar_mobile").fadeIn(300);
            mobileNavbarExpanded = true;
        }
        else{
            $("#navbar_mobile").fadeOut(300);
            mobileNavbarExpanded = false;
        }
    });

    $("#btn_nav_routes_mobile").click(function (e) { 
        e.preventDefault();
        if($("#route_menu_mobile").css('display') == 'none')
        {
            $("#route_menu_mobile").css('display', 'block');
        }
        else{
            $("#route_menu_mobile").css('display', 'none');
        }
    });

});