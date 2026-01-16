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
                              {{-- <a href="#" class="btn btn-primary">Design Custom Tour</a> --}}
                              {{-- <a href="#" class="btn btn-outline-light">View Our Pre-arranged Tours</a> --}}
                          </div>
                      </div>
                  </div>

                  {{-- <div class="col-lg-6 mt-5 mt-lg-0">
                      <div class="booking-form">
                        <h4>Register and request for Quotation</h4>
                          <form action="" method="post">
                              <div class="row gy-3">
                              <div class="col-md-6">
                                  <label for="check-in">First Name</label>
                                  <input type="text" name="first_name" id="first_name" class="form-control" required placeholder="firstname">
                              </div>
                              <div class="col-md-6">
                                  <label for="check-in">Last Name</label>
                                  <input type="text" name="last_name" id="last_name" class="form-control" required placeholder="lastname">
                              </div>
                              <div class="col-md-6">
                                  <label for="check-in">Email</label>
                                  <input type="text" name="email" id="email" class="form-control" required placeholder="youremail@gmail.com">
                              </div>
                              <div class="col-md-6">
                                  <label for="check-in">Phone</label>
                                  <input type="text" name="phone" id="phone" class="form-control" required placeholder="+947#########">
                              </div>
                              <div class="col-md-6">
                                  <label for="children">Country</label>
                                  <select name="cmb_pourpose" id="cmb_pourpose" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" style="background-color: #0d0d0d; color:white;">{{ $country->name }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="col-md-12 text-center">
                                  <button type="submit" class="btn btn-accent w-100 mt-3">Request Quotation</button>
                              </div>
                              </div>
                          </form>
                      </div>
                  </div> --}}

              </div>
          </div>
          
      </section><!-- /Travel Hero Section -->

      <!-- Why Us Section -->
      <section id="why-us" class="why-us section">

        <div class="container">

          <!-- Why Choose Us Section -->
          <div class="why-choose-wrapper">
            <div class="section-header text-center">
              {{-- <span class="section-badge">Why Choose Us</span> --}}
              <h3>Please wait, we are under development.</h3>

            </div>
          </div><!-- End Why Choose Us Section -->

        </div>

      </section>
      <!-- /Why Us Section -->

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

