@extends('main.page_layout')

<link rel="stylesheet" href="{{ asset('css/main_page.css') }}">

@section('page_content')
    <main class="main">
        <section class="section header-section">
            <div class="container">
                <img src="{{asset('images/main/sigiriya_1.jpg')}}" alt="" id="img_background">
                <h2>Featured Destinations</h2>
                <div><span>Check Our</span> <span class="description-title">Featured Destinations</span></div>
            </div>
        </section>

        <section class="section data-section">
            <div class="container">
                <div class="row">
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
            </div>
        </section>
    </main>

    @include('main.footer')
@endsection