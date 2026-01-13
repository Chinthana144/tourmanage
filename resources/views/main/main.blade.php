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
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
            {{-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
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
            </li> --}}
            <li><a href="contact.html">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        {{-- <a class="btn-getstarted" href="index.html#about">Get Started</a> --}}
        <a class="btn-getstarted" href="/login">Login</a>

        </div>
    </header>

    {{-- main --}}
    <main class="main">
      <!-- Travel Hero Section -->
      <section id="travel-hero" class="travel-hero section dark-background">
          <div class="container">

              <div class="row align-items-center">
                  <div class="col-lg-6">
                      <div class="content">
                          <h1>Travel Beyond The Ordinary.</h1>
                          <p class="lead">Curated journeys combining culture, comfort, and unforgettable experiences across remarkable destinations.</p>
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
                              <div class="col-md-6">
                                  <label for="check-in">Travel Date</label>
                                  <input type="date" name="checkin" id="check-in" class="form-control" required="">
                              </div>
                              <div class="col-md-6">
                                  <label for="check-out">Return Date</label>
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
                              <div class="col-md-6">
                                  <label for="children">Tour Pourpose</label>
                                  <select name="cmb_pourpose" id="cmb_pourpose" class="form-control">
                                    @foreach ($tour_pourposes as $pourpose)
                                        <option value="{{ $pourpose->id }}" style="background-color: #0d0d0d; color:white;">{{ $pourpose->name }}</option>
                                    @endforeach
                                  </select>
                              </div>

                              <div class="col-md-12">
                                  <label for="destination">Requests</label>
                                  <input type="text" name="requests" id="requests" class="form-control" placeholder="Special requests" required="">
                              </div>
                              <div class="col-md-12 text-center">
                                  <button type="submit" class="btn btn-accent w-100 mt-3">Request Quotation</button>
                              </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>

          </div>
      </section><!-- /Travel Hero Section -->

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
                    <p>At Akagi eXperience, we believe travel should be more than destinations. We design carefully curated journeys that combine authentic experiences, comfort, and personal attention—so every trip feels meaningful and unforgettable.</p>
                    <p>We don't just organize trips—we craft experiences. Akagi eXperience combines local insight, careful planning, and personalized service to create journeys that truly stand out.</p>

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
              <h3>What Makes Us Different</h3>
              <p>We focus on authenticity, comfort, and carefully crafted experiences that truly stand apart.</p>
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
                    <h4>Curated Experiences</h4>
                    <p>Every journey is thoughtfully designed to deliver authentic moments, not generic itineraries.</p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6">
                  <div class="feature-box">
                    <div class="feature-icon-wrapper">
                      <div class="feature-icon">
                        <i class="bi bi-heart-fill"></i>
                      </div>
                    </div>
                    <h4>Personal Attention</h4>
                    <p>We tailor each experience to your preferences, ensuring comfort, care, and seamless travel.</p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6">
                  <div class="feature-box">
                    <div class="feature-icon-wrapper">
                      <div class="feature-icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                      </div>
                    </div>
                    <h4>Local Expertise</h4>
                    <p>Our deep local knowledge brings you closer to cultures, traditions, and hidden destinations.</p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6">
                  <div class="feature-box">
                    <div class="feature-icon-wrapper">
                      <div class="feature-icon">
                        <i class="bi bi-globe-americas"></i>
                      </div>
                    </div>
                    <h4>Quality & Reliability</h4>
                    <p>From planning to execution, we focus on quality, safety, and dependable service throughout.</p>
                  </div>
                </div>

              </div>
            </div>
          </div><!-- End Why Choose Us Section -->

        </div>

      </section>
      <!-- /Why Us Section -->

      <!-- packages -->
      <section id="price_packages" class="price-packages section">
        <!-- Section Title -->
        <div class="container section-title">
          <h2>Our Travel Packages</h2>
          <div><span>Choose</span> <span class="description-title">the experience that fits your travel style</span></div>
        </div>
        <!-- End Section Title -->

        <img src="{{ asset('images/main/mountain.jpg') }}" alt="" id="img_package_background">

        <div class="container">
          <div class="row g-4">
            <div class="col-md-4 text-center">
              <div class="package-card">
                  <div class="package-box">
                    <h4>Akagi Essential</h4>
                    <span>"Smart travel, made simple"</span>
                    <p>Ideal for budget-conscious travelers seeking comfortable accommodation, essential services, and well-planned itineraries without unnecessary extras.</p>   
                
                    <div class="itemlist">
                      <i class="bi bi-check-circle-fill"></i><span> 3★ Hotels</span><br>
                      <i class="bi bi-check-circle-fill"></i><span> BB or HB Meal Plan</span><br>
                      <i class="bi bi-check-circle-fill"></i><span> Standard Transport</span><br>
                      <i class="bi bi-check-circle-fill"></i><span> Essential Activities</span><br>
                    </div>

                  </div>
                  <button class="btn">View Details</button>
              </div>
            </div>
            <div class="col-md-4 text-center">
              <div class="package-card">
                  <div class="package-box">
                    <h4>Akagi Classic (Recommended)</h4>
                    <span>"Comfort meets experience"</span>
                    <p>A well-balanced package offering enhanced comfort, better hotels, full-board meals, and upgraded travel for a richer experience.</p>   
                
                    <div class="itemlist">
                      <i class="bi bi-check-circle-fill"></i><span> 4★ Hotels</span><br>
                      <i class="bi bi-check-circle-fill"></i><span> Full Board Meals</span><br>
                      <i class="bi bi-check-circle-fill"></i><span> Premium Vehicles</span><br>
                      <i class="bi bi-check-circle-fill"></i><span> Extended Activities</span><br>
                    </div>

                  </div>
                  <button class="btn">Choose Classic</button>
              </div>
            </div>
            <div class="col-md-4 text-center">
              <div class="package-card">
                  <div class="package-box">
                    <h4>Akagi Signature</h4>
                    <span>"Travel without limits"</span>
                    <p>Our most exclusive package, designed for VIP travelers who expect exceptional comfort, personalized service, and seamless all-inclusive travel..</p>   
                
                    <div class="itemlist">
                      <i class="bi bi-check-circle-fill"></i><span> Luxury Hotels</span><br>
                      <i class="bi bi-check-circle-fill"></i><span> All-Inclusive Meals</span><br>
                      <i class="bi bi-check-circle-fill"></i><span> Premium Transport & Flights</span><br>
                      <i class="bi bi-check-circle-fill"></i><span> Private & Exclusive Experiences</span><br>
                    </div>

                  </div>
                  <button class="btn">Request Signature Experience</button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /packages -->

      <!-- Featured Destinations Section -->
      <section id="featured-destinations" class="featured-destinations section">

        <!-- Section Title -->
        <div class="container section-title">
          <h2>Featured Destinations</h2>
          <div><span>Check Our</span> <span class="description-title">Featured Destinations</span></div>
        </div><!-- End Section Title -->

        <div class="container">

          <div class="row gy-4">

            @foreach ($destinations as $destination)
                <div class="col-lg-4 col-md-6">
                  <div class="destination-card">
                    <div class="image-wrapper">
                      <img src="{{ asset($destination->primary_image) }}" alt="Destination" class="img-fluid">
                      <div class="overlay">
                        <div class="badge">Popular</div>
                      </div>
                    </div>
                    <div class="content">
                      <h4>{{ $destination->name }}</h4>
                      <p>{{ \Illuminate\Support\Str::limit(strip_tags($destination->description), 100, '...') }}</p>
                      {{-- <div class="features">
                        <span class="feature-tag">Romantic</span>
                        <span class="feature-tag">Luxury</span>
                      </div> --}}
                      <div class="card-footer">
                        <div class="tours-count">Available</div>
                        <a href="#" class="explore-btn">
                          Explore <i class="bi bi-arrow-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div><!-- End Destination Card -->
            @endforeach

          </div>

          <div class="destinations-cta">
            <div class="row justify-content-center">
              <div class="col-lg-8 text-center">
                <h3>Can't Decide Where to Go?</h3>
                <p>Our travel experts are here to help you find the perfect destination based on your preferences, budget, and travel style.</p>
                <div class="cta-buttons">
                  <a href="destinations.html" class="btn btn-primary">View All Destinations</a>
                  <a href="contact.html" class="btn btn-outline">Talk to Expert</a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </section>
      <!-- /Featured Destinations Section -->

      {{-- add partners here --}}

    </main>

    <footer id="footer" class="footer position-relative dark-background">

      <div class="container">
        <div class="row gy-5">

          <div class="col-lg-4">
            <div class="footer-content">
              <a href="index.html" class="logo d-flex align-items-center mb-4">
                <span class="sitename">Akagi eXperience</span>
              </a>
              <p class="mb-4">Akagi eXperience creates thoughtfully curated journeys that blend authentic experiences, comfort, and personalized service—so every trip goes beyond the ordinary.</p>

              <div class="newsletter-form">
                <h5>Stay Updated</h5>
                <form action="forms/newsletter.php" method="post" class="php-email-form">
                  <div class="input-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required="">
                    <button type="submit" class="btn-subscribe">
                      <i class="bi bi-send"></i>
                    </button>
                  </div>
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Thank you for subscribing!</div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-6">
            <div class="footer-links">
              <h4>Company</h4>
              <ul>
                <li><a href="#"><i class="bi bi-chevron-right"></i> About</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i> Careers</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i> Press</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i> Blog</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i> Contact</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-2 col-6">
            <div class="footer-links">
              <h4>Solutions</h4>
              <ul>
                <li><a href="#"><i class="bi bi-chevron-right"></i> Digital Strategy</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i> Cloud Computing</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i> Data Analytics</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i> AI Solutions</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i> Cybersecurity</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="footer-contact">
              <h4>Get in Touch</h4>
              <div class="contact-item">
                <div class="contact-icon">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="contact-info">
                  <p>2847 Maple Avenue<br>Los Angeles, CA 90210<br>United States</p>
                </div>
              </div>

              <div class="contact-item">
                <div class="contact-icon">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="contact-info">
                  <p>+1 (555) 987-6543</p>
                </div>
              </div>

              <div class="contact-item">
                <div class="contact-icon">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="contact-info">
                  <p>info@akagiexp.com</p>
                </div>
              </div>

              <div class="social-links">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
                <a href="#"><i class="bi bi-github"></i></a>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="footer-bottom">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="copyright">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">Akagi eXperience</strong> <span>All Rights Reserved</span></p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="footer-bottom-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Cookie Policy</a>
              </div>
              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
              </div>
            </div>
          </div>
        </div>
      </div>

    </footer>

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