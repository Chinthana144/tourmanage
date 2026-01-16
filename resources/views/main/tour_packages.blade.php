@extends('main.page_layout')

<link rel="stylesheet" href="{{ asset('css/main_page.css') }}">

@section('page_content')
    <main class="main">
        <section class="section header-section">
            <img src="{{asset('images/main/sigiriya_1.jpg')}}" alt="" id="img_background">
            <div class="container">
                <h2>Featured Tour Packages</h2>
                <div><span>Check Our</span> <span class="description-title">Featured Tour Packages</span></div>
            </div>
        </section>

        <section class="section data-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Tour Packages</h2>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="txt_search_destination" class="form-control" placeholder="Search">
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary w-100"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row mt-3">
                    @foreach ($packages as $package)
                       <div class="col-lg-4 col-md-6">
                            <div class="destination-card">
                                <div class="image-wrapper">
                                <img src="{{ asset("images/packages/" .$package->cover_image) }}" alt="Destination" class="img-fluid">
                                    
                                </div>
                                <div class="content">
                                    <h4>{{ $package->title }}</h4>
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($package->description), 120, '...') }}</p>
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
                {{ $packages->links() }}
            </div>
        </section>
    </main>

    @include('main.footer')
@endsection