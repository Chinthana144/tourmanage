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
    <aside class="side-navbar">
        <header class="side-header">
            <a href="#">
                <img src="{{ asset('images/company/akagi_experiences.png') }}" alt="" id="img_navbar_logo">
            </a>
            <button class="toggler">
                <i class="bi bi-chevron-left"></i>
            </button>
        </header>

        <nav class="navbar">
            <ul class="navbar-list">
                <li class="navbar-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-house-fill"></i>
                        <span class="nav-item-label">Home</span>
                    </a>
                </li>
                <li class="navbar-item">
                    {{-- <a href="#" class="nav-link">
                        <i class="bi bi-compass"></i>
                        <span class="nav-item-label">Routes</span>
                    </a> --}}
                    <button id="btn_nav_routes" class='btn_menu_toggler'>
                        <i class="bi bi-compass"></i>
                        Routes
                    </button>
                    <ul id="route-list">
                        <li class="route-items">
                            <a href="#">Locations</a>
                        </li>
                        <li class="route-items">
                            <a href="#">Hotels</a>
                        </li>
                        <li class="route-items">
                            <a href="#">Restaurants</a>
                        </li>
                        <li class="route-items">
                            <a href="#">Activities</a>
                        </li>   
                        <li class="route-items">
                            <a href="#">Travel</a>
                        </li>
                    </ul>
                </li>
                <li class="navbar-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-map-fill"></i>
                        <span class="nav-item-label">Tours</span>
                    </a>
                </li>
                
            </ul>
        </nav>
    </aside>
</body>
</html>