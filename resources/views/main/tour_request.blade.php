@extends('main.page_layout')

<link rel="stylesheet" href="{{ asset('css/main_page.css') }}">

@section('page_content')
    <main class="main">
        <section class="section header-section">
            <img src="{{asset('images/main/sigiriya_1.jpg')}}" alt="" id="img_background">
            <div class="container">
                <h2>Tour Request</h2>
                {{-- <div><span>Check Our</span> <span class="description-title">Featured Tour Packages</span></div> --}}
            </div>
        </section>

        <section class="section data-section">
            <div class="container">
                <h4>Tour request form here</h4>
            </div>
        </section>
    </main>

    @include('main.footer')
@endsection