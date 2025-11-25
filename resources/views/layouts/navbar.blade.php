  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div><img src="{{ asset('images/company/akagi_logo_6.png') }}" alt="" style="width: 50px; height:auto;"></div>
      <div class="logo"><a href="#">Akagi eXperience</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">Akagi eXperience</span>
          <i class='bx bx-x'></i>
        </div>
        <ul class="links">
          <li><a href="/dashboard">HOME</a></li>
          <li>
            <a href="#">Packages</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="/packages">Packages</a></li>
              <li><a href="#">Package Routes</a></li>
              <li><a href="#">Package Settings</a></li>
              <li class="more">
                <span><a href="#">More</a>
                <i class='bx bxs-chevron-right arrow more-arrow'></i>
              </span>
                <ul class="more-sub-menu sub-menu">
                  <li><a href="#">Neumorphism</a></li>
                  <li><a href="#">Pre-loader</a></li>
                  <li><a href="#">Glassmorphism</a></li>
                </ul>
              </li>
            </ul>
          </li>

          <li>
            <a href="#">PLACES</a>
            <i class='bx bxs-chevron-down js-arrow arrow'></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="/locations">Locations</a></li>
              <li><a href="/hotels">Hotels</a></li>
            </ul>
          </li>

          <li>
            <a href="#">TOURS</a>
            <i class='bx bxs-chevron-down js-arrow arrow'></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="#">Tours</a></li>
              <li><a href="/tourists">Touists</a></li>
              <li><a href="#">Tour Packages</a></li>
              <li><a href="#">Package Routes</a></li>
            </ul>
          </li>

          <li>
            <a href="#">Quotations</a>
            <i class='bx bxs-chevron-down js-arrow arrow'></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="/customers">Customers</a></li>
              <li><a href="/tour-requests">Tour Requests</a></li>
              <li><a href="#">Tour Quotation</a></li>
              <li><a href="#">Tour Pricing</a></li>
            </ul>
          </li>

          <li>
            <a href="#"><i class="bx bx-cog"></i> Settings</a>
            <i class='bx bxs-chevron-down js-arrow arrow'></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="/users">Users</a></li>
              <li><a href="#">Form Validation</a></li>
              <li><a href="#">Card Slider</a></li>
              <li><a href="#">Complete Website</a></li>
            </ul>
          </li>

        </ul>
      </div>
      <div class="search-box">
        <i class='bx bx-search'></i>
        <div class="input-box">
          <input type="text" placeholder="Search...">
        </div>
      </div>
      <div class="profile-box">
        <img src="{{ URL('images/profiles/profile.jpg') }}" alt="profile" class="img_profile">
        <i class="bx bxs-chevron-down js-arrow arrow"></i>
        <div class="profile-menu">
            <ul id="profile_ul">
                <li><img src="{{ URL('images/profiles/profile.jpg') }}" alt="" class="img_profile"></li>
                <li><i class="bx bx-user fs-3"></i> My Profile</li>
                <li><a href="{{ route('logout') }}"><i class="bx bx-power-off fs-3"></i> Logout</a></li>
            </ul>
        </div>
      </div>
    </div>
  </nav>

  <div id="div_content">
    @yield('content')
  </div>

    <div id="footer">
        <p>
            © 2025 Akagi eXperience. All rights reserved.
            <br>
            powered by Akagi eXperience.
        </p>
    </div>
