<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title>Akagi eXperiences</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new_navbar.css') }}">

    {{-- bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    {{-- jQuery --}}
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
</head>
<body>
    <div id="div_main">
        {{-- side navigation bar --}}
        <aside class="side-navbar" id="side_navbar">
            <header class="side-header">
                <a href="#">
                    <img src="{{ asset('images/company/akagi_experiences.png') }}" alt="" id="img_navbar_logo">
                </a>
                <button class="toggler" id="btn_toggler">
                    <i class="bi bi-caret-right-fill"></i>
                </button>
            </header>

            <nav class="navbar">

                <ul id="desktop_nav_items">
                    <li class="list_items">
                        <div class="div_nav_hover">
                            <a href="/dashboard" class="nav_link">
                                <button class="flag_button">Home</button>
                            </a>
                        </div>
                        <a href="/dashboard" class="nav_link">
                            <button class="nav_button">
                                <i class="bi bi-house-fill"></i>
                                <span class="list_item_label">Home</span>
                            </button>
                        </a>
                    </li>
                    <li class="list_items">
                        <div class="div_nav_hover">
                            <a href="/locations" class="nav_link">
                                <button class="flag_button">Locations</button>
                            </a>
                            <a href="/locations" class="nav_link">
                                <button class="flag_button">Hotels</button>
                            </a>
                            <a href="/locations" class="nav_link">
                                <button class="flag_button">Restaurants</button>
                            </a>
                            <a href="/locations" class="nav_link">
                                <button class="flag_button">Activities</button>
                            </a>
                            <a href="/locations" class="nav_link">
                                <button class="flag_button">Travel Media</button>
                            </a>
                        </div>
                        <a href="#" class="nav_link">
                            <button id="btn_nav_route" class="nav_button">
                                <i class="bi bi-compass-fill"></i>
                                <span class="list_item_label">Routes</span>
                            </button>
                        </a>
                        <div id="div_route_menu" class="div_menu">
                            <a href="/locations" class="nav_link">
                                <button class="menu_button">Locations</button>
                            </a>
                            <a href="/hotels" class="nav_link">
                                <button class="menu_button">Hotels</button>
                            </a>
                            <a href="/restaurants" class="nav_link">
                                <button class="menu_button">Restaurants</button>
                            </a>
                            <a href="/activities" class="nav_link">
                                <button class="menu_button">Activities</button>
                            </a>
                            <a href="/travel-media" class="nav_link">
                                <button class="menu_button">Travel Media</button>
                            </a>
                        </div>
                    </li>
                    <li class="list_items">
                        home
                    </li>
                </ul>
                
            </nav>
        </aside>

        {{-- ============================================================================= --}}
        {{-- =========================== mobile navigation bar =========================== --}}
        {{-- ============================================================================= --}}

        <div id="div_mobile_navbar">
            <div id="content_mobile_header">
                <button id="btn_mobile_toggler"><i class="bi bi-list"></i></button>
                <h3>Akagi Experiences</h3>
                <a href="{{ route('logout') }}">
                    <button id="btn_logout"><i class="bi bi-power"></i></button>    
                </a>
            </div>
            <nav class="navbar" id="navbar_mobile">
                <a href="#">
                    <button class="btn_nav_mobile">
                        <i class="bi bi-house-fill nav_icon"></i>
                        Home
                    </button>
                </a>
                <a href="#">
                    <button class="btn_nav_mobile" id="btn_nav_routes_mobile">
                        <i class="bi bi-compass"></i>
                        Route
                    </button>
                    <div id="route_menu_mobile" class="div_mobile_menu">
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
                </a>
                
            </nav>
        </div>

        <div id="div_page">
            <div id="content_desktop_header">
                <h3>Akagi Experiences</h3>
                <a href="{{ route('logout') }}">
                    <button id="btn_logout"><i class="bi bi-power"></i></button>    
                </a>
            </div>
            <div id="div_content">
                @yield('content')
            </div>
        </div>
        <div id="footer">
            <p>
                © 2026 Akagi eXperience. All rights reserved.
                <br>
                powered by Akagi eXperience.
            </p>
        </div>
    </div>
    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/new_navbar.js') }}"></script>
</body>
</html>