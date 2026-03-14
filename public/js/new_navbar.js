$(document).ready(function () {
    var navbarExpanded = true;
    var mobileNavbarExpanded = false;

    $("#btn_toggler").click(function (e) { 
        e.preventDefault();
        var width = $("#side_navbar").css('width');
        // console.log(width);
        
        if($("#side_navbar").css('width') == '270px')
        {
            //minimize
            var width = $("#side_navbar").css('width');
            $("#side_navbar").css('width', '56px');
            
            navbarExpanded = true;

            //header setup
            $(".side-header").css('flex-direction', 'column');

            $(".list_item_label").css('display', 'none');
            $(".div_menu").css('display', 'none');
            $("#div_page").css('margin-left', '56px');
            $("#btn_toggler").removeClass('icon_in');
        }
        else{
            //expand
            $("#side_navbar").css('width', '270px');

            navbarExpanded = false;

            //header setup
            $(".side-header").css('flex-direction', 'row');

            $(".list_item_label").css('display', 'block');
            $(".div_nav_hover").fadeOut(200);
            // $("#div_page").css('margin-left', '270px');
            $("#btn_toggler").addClass('icon_in');
        }
    });

    //hover
    $(".nav_button").hover(
        function(){
            if(navbarExpanded){
                var label = $(this).closest('.list_items').find('.div_nav_hover');
                $(".div_nav_hover").fadeOut(200);
                label.fadeIn(200);                
            }
        },
        function(){
            var label = $(this).closest('.list_items').find('.div_nav_hover');
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

    // package menu toggle
    $("#btn_nav_package").click(function (e) { 
        e.preventDefault();
        if(!navbarExpanded){
            if($("#div_package_menu").css('display') == 'none'){
                $("#div_package_menu").fadeIn(300);
            }
            else{
                $("#div_package_menu").fadeOut(200);
            }
        }
    });

    // route menu toggle
    $("#btn_nav_route").click(function (e) { 
        e.preventDefault();
        if(!navbarExpanded){
            if($("#div_route_menu").css('display') == 'none'){
                $("#div_route_menu").fadeIn(300);
            }
            else{
                $("#div_route_menu").fadeOut(200);
            }
        }
    });

    // quotation menu toggle
    $("#btn_nav_quotation").click(function (e) { 
        e.preventDefault();
        if(!navbarExpanded){
            if($("#div_quotation_menu").css('display') == 'none'){
                $("#div_quotation_menu").fadeIn(300);
            }
            else{
                $("#div_quotation_menu").fadeOut(200);
            }
        }
    });

    // asset menu toggle
    $("#btn_nav_asset").click(function (e) { 
        e.preventDefault();
        if(!navbarExpanded){
            if($("#div_asset_menu").css('display') == 'none'){
                $("#div_asset_menu").fadeIn(300);
            }
            else{
                $("#div_asset_menu").fadeOut(200);
            }
        }
    });

    // settings menu toggle
    $("#btn_nav_settings").click(function (e) { 
        e.preventDefault();
        if(!navbarExpanded){
            if($("#div_settings_menu").css('display') == 'none'){
                $("#div_settings_menu").fadeIn(300);
            }
            else{
                $("#div_settings_menu").fadeOut(200);
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