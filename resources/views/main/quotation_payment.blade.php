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
            </div>
        </div>
      </section>

        @php
            $package_prices = json_decode($quotation->package_prices);
            $essential_total = 0;
            $classic_total = 0;
            $signature_total = 0;
        @endphp

      <section id="why-us" class="why-us section">
        <div class="container">
            <div class="section-header text-center">
              <h3>Welcome {{ $quotation->tourRequest->customer_name }}</h3>
              <p class="text-start">
                Quotation No: {{ $quotation->quotation_no }} <br>
                Name: {{ $quotation->tourRequest->customer_name }} <br>
                email: {{ $quotation->tourRequest->customer_email }} <br>
                phone: {{ $quotation->tourRequest->customer_phone }}
              </p>
              <p>Please Select your package and proceed for payment.</p>
              <div class="row">
                <div class="col-md-4">
                    <h5>Agaki Essential Package</h5>
                    <table class="table table-bordered text-white">
                        @foreach ($package_prices->essential_prices as $price)
                            @php
                                $essential_total += floatVal($price->total_price);
                            @endphp
                            <tr>
                                <td>{{ substr($price->component_type, 11) }}</td>
                                <td>{{ $price->total_price }}</td>
                            </tr>
                        @endforeach 
                        <tr class="total_row">
                            <td>Total</td>
                            <td>{{$essential_total}}</td>
                        </tr>
                    </table> 

                    <button class="btn btn-primary">Select Akagi Essential - ${{ $essential_total }}</button>
                </div>

                <div class="col-md-4">
                    <h5>Akagi Classic Package</h5>
                    <table class="table table-bordered text-white">
                        @foreach ($package_prices->classic_prices as $price)
                            @php
                                $classic_total += floatVal($price->total_price);
                            @endphp
                            <tr>
                                <td>{{ substr($price->component_type, 11) }}</td>
                                <td>{{ $price->total_price }}</td>
                            </tr>
                        @endforeach
                        <tr class="total_row">
                            <td>Total</td>
                            <td>{{$classic_total}}</td>
                        </tr>
                    </table>

                    <button class="btn btn-primary">Select Akagi Classic - ${{ $classic_total }}</button>
                </div>

                <div class="col-md-4">
                    <h5>Akagi Signature Package</h5>
                    <table class="table table-bordered text-white">
                        @foreach ($package_prices->signature_prices as $price)
                            @php
                                $signature_total += floatVal($price->total_price);
                            @endphp
                            <tr>
                                <td>{{ substr($price->component_type, 11) }}</td>
                                <td>{{ $price->total_price }}</td>
                            </tr>
                        @endforeach
                        <tr class="total_row">
                            <td>Total</td>
                            <td>{{$signature_total}}</td>
                        </tr>
                    </table>

                    <button class="btn btn-primary">Select Akagi Signature - ${{$signature_total}}</button>
                </div>
              </div>
            </div>
        </div>
      </section>

      {{-- tour route section --}}
        <section class="section">
            <div class="container">
                <h5>Your Tour Route</h5>

                @foreach ($tour_route as $route)
                    <div class="row mb-2">
                        @switch($route->item_type)
                            @case('App\Models\Locations')
                                <div class="col-md-1">
                                    Day {{ $route->day_no }}
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset($route->item->primary_image) }}" alt="image" style="width: 100%; height:auto; border-radius:10px;">
                                </div>
                                <div class="col-md-7">
                                    <h5>{{ $route->item->name }}</h5>
                                    <p>{{ $route->item->description }}</p>
                                </div>
                                @break
                            @case('App\Models\Hotels')
                                <div class="col-md-1">
                                    Day {{ $route->day_no }}
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset("images/hotels/" . $route->item->cover_image) }}" alt="image" style="width: 100%; height:auto; border-radius:10px;">
                                </div>
                                <div class="col-md-7">
                                    <h5>{{ $route->item->name }}</h5>
                                </div>
                                @break

                            @case('App\Models\Activities')
                                <div class="col-md-1">
                                    Day {{ $route->day_no }}
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset("images/activities/" . $route->item->cover_image) }}" alt="image" style="width: 100%; height:auto; border-radius:10px;">
                                </div>
                                <div class="col-md-7">
                                    <h5>{{ $route->item->name }}</h5>
                                    <p>{{ $route->item->description }}</p>
                                </div>
                                @break

                            @case('App\Models\Restaurants')
                                <div class="col-md-1">
                                    Day {{ $route->day_no }}
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset("images/restaurants/" . $route->item->cover_image) }}" alt="image" style="width: 100%; height:auto; border-radius:10px;">
                                </div>
                                <div class="col-md-7">
                                    <h5>{{ $route->item->name }}</h5>
                                    <p>{{ $route->item->description }}</p>
                                </div>
                                @break
                            @default
                                
                        @endswitch
                    </div>
                    
                @endforeach
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

