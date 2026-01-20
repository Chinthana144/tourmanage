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
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Destinations</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="div_search">
                            <input type="text" class="form-search">
                            <button class="btn-search"><i class="bi bi-search"></i></button>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('main.footer')
@endsection
