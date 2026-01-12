<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Akagi Exprience</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- vendor CSS files --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glightbox.min.css') }}">

    {{-- main CSS file --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    {{-- header --}}
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.webp" alt=""> -->
            <h1 class="sitename">Akagi eXperience</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
            <li><a href="index.html" class="active">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="destinations.html">Destinations</a></li>
            <li><a href="tours.html">Tours</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li class="dropdown"><a href="#"><span>More Pages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                <li><a href="destination-details.html">Destination Details</a></li>
                <li><a href="tour-details.html">Tour Details</a></li>
                <li><a href="booking.html">Booking</a></li>
                <li><a href="testimonials">Testimonials</a></li>
                <li><a href="faq.html">Frequently Asked Questions</a></li>
                <li><a href="blog-details.html">Blog Details</a></li>
                <li><a href="terms.html">Terms</a></li>
                <li><a href="privacy.html">Privacy</a></li>
                <li><a href="404.html">404</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                <li><a href="#">Dropdown 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                    <li><a href="#">Deep Dropdown 1</a></li>
                    <li><a href="#">Deep Dropdown 2</a></li>
                    <li><a href="#">Deep Dropdown 3</a></li>
                    <li><a href="#">Deep Dropdown 4</a></li>
                    <li><a href="#">Deep Dropdown 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Dropdown 2</a></li>
                <li><a href="#">Dropdown 3</a></li>
                <li><a href="#">Dropdown 4</a></li>
                </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="index.html#about">Get Started</a>

        </div>
    </header>

    {{-- main --}}
    <main class="main">
        {{-- section Travel hero --}}
        <!-- Travel Hero Section -->
        <section id="travel-hero" class="travel-hero section dark-background">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="content">
                            <h1>Travel Beyond The Ordinary.</h1>
                            <p class="lead">Explore breathtaking destinations and create unforgettable memories with our expertly crafted tours.</p>
                            <div class="d-flex flex-wrap gap-3 mt-4">
                                <a href="destinations.html" class="btn btn-primary">Start Exploring</a>
                                <a href="tours.html" class="btn btn-outline-light">View Tours</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <div class="booking-form">
                            <form action="" method="post">
                                <div class="row gy-3">
                                <div class="col-md-12">
                                    <label for="destination">Destination</label>
                                    <input type="text" name="destination" id="destination" class="form-control" placeholder="Where do you want to go?" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="check-in">Check In</label>
                                    <input type="date" name="checkin" id="check-in" class="form-control" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="check-out">Check Out</label>
                                    <input type="date" name="checkout" id="check-out" class="form-control" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="adults">Adults</label>
                                    <input type="number" name="adults" id="adults" class="form-control" min="1" max="20" value="2" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="children">Children</label>
                                    <input type="number" name="children" id="children" class="form-control" min="0" max="20" value="0">
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-accent w-100 mt-3">Search Tours</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- /Travel Hero Section -->

        {{-- section why us --}}
        <!-- Why Us Section -->
    <section id="why-us" class="why-us section">

      <div class="container">

        <!-- Main Content Grid -->
        <div class="content-grid">
          <div class="row g-4 align-items-stretch">

            <!-- About Section -->
            <div class="col-lg-6">
              <div class="about-block">
                <div class="about-header">
                  <span class="section-badge">About Us</span>
                  <h3>Travel Beyond The Ordinary.</h3>
                </div>
                <div class="about-content">
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>

                  <div class="feature-list">
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Expert local guides in every destination</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Customized itineraries for every traveler</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>24/7 customer support throughout your journey</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Image Showcase -->
            <div class="col-lg-6">
              <div class="image-showcase">
                <div class="main-image">
                  <img src=" {{ asset('images/main/travel/showcase-12.webp') }}" alt="Travel Adventure" class="img-fluid rounded-3">
                  <div class="overlay-badge">
                    <div class="badge-content">
                      <i class="bi bi-award-fill"></i>
                      <div class="badge-text">
                        <strong>Award Winner</strong>
                        <span>Best Travel Agency 2024</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="floating-card">
                  <img src="{{ asset('images/main/travel/misc-8.webp') }}" alt="Happy Travelers" class="img-fluid rounded-2">
                  <div class="card-content">
                    <div class="rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <span>4.9/5</span>
                    </div>
                    <p>"Amazing experience!"</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Main Content Grid -->

        <!-- Why Choose Us Section -->
        <div class="why-choose-wrapper">
          <div class="section-header text-center">
            <span class="section-badge">Why Choose Us</span>
            <h3>What Makes Us aDifferent</h3>
            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur adipisci velit</p>
          </div>

          <div class="features-container">
            <div class="row g-4">

              <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                  <div class="feature-icon-wrapper">
                    <div class="feature-icon">
                      <i class="bi bi-compass"></i>
                    </div>
                  </div>
                  <h4>Expert Navigation</h4>
                  <p>Quis nostrum exercitationem ullam corporis suscipit laboriosam</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                  <div class="feature-icon-wrapper">
                    <div class="feature-icon">
                      <i class="bi bi-heart-fill"></i>
                    </div>
                  </div>
                  <h4>Personalized Care</h4>
                  <p>Excepteur sint occaecat cupidatat non proident sunt in culpa</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                  <div class="feature-icon-wrapper">
                    <div class="feature-icon">
                      <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                  </div>
                  <h4>Instant Booking</h4>
                  <p>Ut enim ad minim veniam quis nostrud exercitation ullamco</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                  <div class="feature-icon-wrapper">
                    <div class="feature-icon">
                      <i class="bi bi-globe-americas"></i>
                    </div>
                  </div>
                  <h4>Worldwide Coverage</h4>
                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse</p>
                </div>
              </div>

            </div>
          </div>
        </div><!-- End Why Choose Us Section -->

      </div>

    </section><!-- /Why Us Section -->


    </main>

    <!-- Preloader -->
    <div id="preloader"></div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>

    {{-- main js --}}
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>