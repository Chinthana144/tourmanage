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

        <div id="div_navigator">
            <div class="ball" id="ball_register"></div>
            <div class="ball" id="ball_tour"></div>
            <div class="ball" id="ball_composition"></div>
            <div class="ball" id="ball_destinations"></div>
        </div>

        <div class="form-wrapper">
            <div id="form_register" class="form-step active">
                <p>form register</p>
                <button id="btn_goto_tour">next</button>
            </div>

            <div id="form_tour" class="form-step">
                <button id="btn_back_register">Back</button>
                <p>form  bananasasasdwas</p>
            </div>
        </div>

        {{-- <section class="section data-section">
            <div class="container request_form">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <img src="{{ asset('images/main/view_1.jpg') }}" alt="register image" id="img_customer_register">
                    </div>
                    <div class="col-md-6">
                        <h4>Register and request for Quotation</h4>
                        <div class="row gy-3">
                            <div class="col-md-12">
                                <label for="check-in">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required placeholder="firstname">
                            </div>
                            <div class="col-md-12">
                                <label for="check-in">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required placeholder="lastname">
                            </div>
                            <div class="col-md-12">
                                <label for="check-in">Email</label>
                                <input type="text" name="email" id="email" class="form-control" required placeholder="youremail@gmail.com">
                            </div>
                            <div class="col-md-12">
                                <label for="check-in">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" required placeholder="+947#########">
                            </div>
                            <div class="col-md-12">
                                <label for="children">Country</label>
                                <select name="cmb_country" id="cmb_country" class="form-select">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-submit" id="btn_register_customer">Request Quotation</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="tour_form active" id="div_tour_form">
                    tour form asdasdw  asasdwas asadw asa
                </div>
            </div>
            <button id="btn_check">Check</button>
        </section> --}}

    </main>

    <script src="{{ asset('js/main_request.js') }}"></script>

    @include('main.footer')
    
@endsection