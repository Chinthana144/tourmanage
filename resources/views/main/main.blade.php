@extends('main.layout')

    {{-- header with navigation --}}
    @include('main.navigation')

  @section('content')
          {{-- main --}}
    <main class="main">

      <!-- Travel Hero Section -->
      <section id="travel-hero" class="travel-hero section dark-background">
        <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-12">
                    <div class="video-wrapper">
                      <video autoplay muted loop playsinline class="bg-video">
                        <source src="{{ asset('videos/vid_sunset.mp4') }}" type="video/mp4">
                      </video>
                    </div>
                      <div class="content">
                          <h1>Travel Beyond The Ordinary.</h1>
                          <p class="lead">Curated journeys combining culture, comfort, and unforgettable experiences across remarkable destinations.</p>
                          <div class="d-flex flex-wrap gap-3 mt-4">
                              <a href="{{ route('main.show_customer_register') }}" class="btn btn-primary">Design Custom Tour</a>
                              <a href="{{ route('main.tour_packages') }}" class="btn btn-outline-light">View Our Pre-arranged Tours</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section><!-- /Travel Hero Section -->

      {{-- main destinatons --}}
      <section id="main_destinations" class="section main_destinations">
        <div class="container">
            <h4>Destinations</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="image_wrapper">
                        <img src="{{ asset('images/main/srilanka_destination.jpg') }}" alt="">
                        <div class="content">
                            <h5>Sri Lanka</h5>
                            <p>A land of rich culture, lush landscapes, and timeless heritage. From golden beaches and misty hills to ancient temples and wildlife, Sri Lanka offers diverse experiences in one unforgettable journey.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="image_wrapper">
                        <img src="{{ asset('images/main/maldives_destination.jpg') }}" alt="">
                        <div class="content">
                            <h5>Maldives</h5>
                            <p>An island paradise known for crystal-clear waters, luxury resorts, and ultimate relaxation. The Maldives is perfect for romantic escapes, private retreats, and truly indulgent experiences.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <!-- Why Us Section -->
      <section id="why-us" class="why-us section">
        <div class="container">
          <!-- Main Content Grid -->
          <div class="content-grid">
            <div class="row g-4 align-items-stretch">

              <!-- About Section -->
              <div class="col-lg-12 col-md-12">
                <div class="about-block">
                  <div class="about-header">
                    <span class="section-badge">About Us</span>
                    <h3>Travel Beyond The Ordinary.</h3>
                  </div>
                  <div class="about-content">
                    <p>
                      <b>The Architecture of Travel</b><br>
                      Akagi eXperiences is a luxury travel architectural firm bridging the gap between Japanese precision and Indian Ocean soul. Operating from our dual hubs in Japan and the World Trade Center (WTC) Colombo, we design journeys, not just itineraries.
                      <b>Japanese Standards, Local Heart</b><br>
                      Our foundation is Omotenashi—the Japanese art of selfless hospitality. We believe true luxury is the absence of friction. By merging Japanese discipline with deep Sri Lankan and Maldivian expertise, we ensure every journey is seamless, secure, and soulful.
                    </p>
                    <p>
                      <b>The "Frictionless" Guarantee</b><br>
                      We handle the complexity so you don't have to. From securing VIP "Pre-Paid" status at exclusive resorts to managing private logistics and domestic manifests, Akagi ensures you are never just a guest—you are a priority.
                    </p>

                    <div class="feature-list">
                      <div class="feature-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Dual-Hub Accountability: Offices in Japan and Sri Lanka (WTC) for 24/7 global support.</span>
                      </div>
                      <div class="feature-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Curated Excellence: A portfolio limited to properties that meet our rigorous standards.</span>
                      </div>
                      <div class="feature-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>VIP Logistics: Specializing in privacy, speed, and exclusivity for high-net-worth travel.</span>
                      </div>
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
              <p>"Our Indian Ocean Footprint: From the cultural heart of Sri Lanka to the private atolls of the Maldives, we collaborate with the region’s most prestigious resorts to architect your perfect escape."</p>
            </div>

            <div class="features-container">
              <div class="row g-4">

                <div class="col-lg-3 col-md-6">
                  <div class="feature-box">
                    <div class="feature-icon-wrapper">
                      <div class="feature-icon">
                        <i class="bi bi-map"></i>
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
                        <i class="bi bi-compass"></i>
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
                        <i class="bi bi-check-all"></i>
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
                      {{-- <div class="overlay">
                        <div class="badge">Popular</div>
                      </div> --}}
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
                  <a href="/main.destination" class="btn btn-primary">View All Destinations</a>
                  <a href="contact.html" class="btn btn-outline">Talk to Expert</a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </section>
      <!-- /Featured Destinations Section -->

      {{-- add partners here --}}
      <section class="partners-section">
            <div class="container">
                <h5 class="text-dark">Our Partners</h5>
                <div class="partners-wrapper">
                    <div class="partners-track">
                        @foreach ($partners as $partner)
                            <div class="partner-logo">
                                <img src="{{ asset('images/main/partners/' . $partner->logo) }}"
                                    alt="{{ $partner->name }}">
                            </div>
                        @endforeach

                        {{-- duplicate for seamless loop --}}
                        @foreach ($partners as $partner)
                            <div class="partner-logo">
                                <img src="{{ asset('images/main/partners/' . $partner->logo) }}"
                                    alt="{{ $partner->name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('main.footer')

    <script>
      // video
      document.addEventListener('DOMContentLoaded', function () {
        const video = document.querySelector('.bg-video');
        if (video) {
            video.playbackRate = 0.8; // half speed
        }
      });
    </script>
  @endsection

