@extends('main.page_layout')

<link rel="stylesheet" href="{{ asset('css/main_page.css') }}">

@section('page_content')
    <main class="main">
        <section class="section header-section">
            <img src="{{asset('images/main/sigiriya_1.jpg')}}" alt="" id="img_background">
            <div class="container">
                <h2>Page Topic</h2>
                <div><span>here</span> <span class="description-title">page description</span></div>
            </div>
        </section>

        <section class="section data-section">
            <div class="container">
                <p>Content here</p>
            </div>
        </section>
    </main>

    @include('main.footer')
@endsection