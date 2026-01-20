@extends('main.page_layout')

<link rel="stylesheet" href="{{ asset('css/main_page.css') }}">

@section('page_content')
    <main class="main">
        <section class="section header-section">
            <img src="{{asset('images/main/sigiriya_1.jpg')}}" alt="" id="img_background">
            <div class="container">
                <h2>Welcome to Akagi eXperiences</h2>
                <div>
                    <p>Create your own custom tour with Akagi eXperiences</p>
                </div>
            </div>
        </section>

        <section class="section">
            <div id="flash_message" style="display:none;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Destinations</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="div_search float-end">
                            <input type="text" class="text-search">
                            <button class="btn-search"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>

                {{-- Destinations --}}
                <div id="div_destination">
                    <div class="row">
                        @foreach ($destinations as $destination)
                            <div class="col-lg-4 col-md-6">
                                <div class="destination-card">
                                    <div class="image-container">
                                        <img src="{{ asset($destination->primary_image) }}" alt="Destination" class="img-fluid">
                                        {{-- <div class="overlay">
                                            <div class="badge">Popular</div>
                                        </div> --}}
                                    </div>
                                    <div class="content">
                                        <h4>{{ $destination->name }}</h4>
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($destination->description), 120, '...') }}</p>
                                        {{-- <div class="features">
                                            <span class="feature-tag">Romantic</span>
                                            <span class="feature-tag">Luxury</span>
                                        </div> --}}
                                        <div class="card-footer">
                                            <div class="form-check form-switch">
                                                <input data-destination-id="{{ $destination->id }}" data-request-id="{{ $tour_request->id }}" class="form-check-input chk-destination" type="checkbox" id="chk_destination_{{$destination->id}}">
                                                <label class="form-check-label" for="chk_destination_{{$destination->id}}">Select Destination</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Destination Card -->
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('main.footer')

    <script src="{{ asset('js/main_destination.js') }}"></script>
@endsection
