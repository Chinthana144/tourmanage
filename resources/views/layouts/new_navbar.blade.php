<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title>New Nav bar</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new_navbar.css') }}">


</head>
<body>
    <aside class="side-navbar" id="side_navbar">
        <header class="side-header">
            <a href="#">
                <img src="{{ asset('images/company/akagi_experiences.png') }}" alt="" id="img_navbar_logo">
            </a>
            <button class="toggler" id="btn_toggler">
                <i class="bi bi-chevron-left"></i>
            </button>
        </header>

        <nav class="navbar">
            <ul class="navbar-list">
               
                <li class="navbar-item">
                    <div class="div_label">
                        <a href="#" class="link-hover">
                            Home
                        </a>
                    </div> 
                    <a href="#" class="nav-link">
                        <button class="nav-button">
                            <i class="bi bi-house-fill nav_icon"></i>
                            <span class="nav-item-label">Home</span>
                        </button>
                    </a> 
                                      
                </li>

                <li class="navbar-item">
                    <div class="div_label">
                        <a href="#" class="link-hover">
                            <button class="btn_menu_item">Locations</button>
                        </a>
                        <a href="#" class="link-hover">
                            <button class="btn_menu_item">Hotels</button>
                        </a>
                        <a href="#" class="link-hover">
                            <button class="btn_menu_item">Restaurants</button>
                        </a>
                        <a href="#" class="link-hover">
                            <button class="btn_menu_item">Activities</button>
                        </a>
                        <a href="#" class="link-hover">
                            <button class="btn_menu_item">Travel</button>
                        </a>
                    </div> 
                    <button id="btn_nav_routes" class='nav-button'>
                        <i class="bi bi-compass"></i>
                        <span class="nav-item-label">Routes</span>
                    </button>
                    <ul id="route-list" class="drop-list">
                        <li class="route-items">
                            <a href="#" class="link-hover">
                                <button class="btn_menu_item">Locations</button>
                            </a>
                        </li>
                        <li class="route-items">
                            <a href="#" class="link-hover">
                                <button class="btn_menu_item">Hotels</button>
                            </a>
                        </li>
                        <li class="route-items">
                            <a href="#" class="link-hover">
                                <button class="btn_menu_item">Restaurants</button>
                            </a>
                        </li>
                        <li class="route-items">
                            <a href="#" class="link-hover">
                                <button class="btn_menu_item">Activities</button>
                            </a>
                        </li>   
                        <li class="route-items">
                            <a href="#" class="link-hover">
                                <button class="btn_menu_item">Travel</button>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="navbar-item">
                    <a href="#" class="nav-link">
                        <button class="nav-button">
                            <i class="bi bi-map-fill"></i>
                            <span class="nav-item-label">Tours</span>
                        </button>
                    </a>
                </li>
                
            </ul>
        </nav>
    </aside>

    <div>
        content
    </div>

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/new_navbar.js') }}"></script>
</body>
</html>