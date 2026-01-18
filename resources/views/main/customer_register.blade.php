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

        <section class="section">
            <div class="form-wrapper">
                {{-- form register --}}
                <div id="form_register" class="form-step active">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('images/main/view_1.jpg') }}" alt="register image" id="img_customer_register">
                        </div>
                        <div class="col-md-6">
                            <h4>Register and Continue</h4>
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
                                <button type="button" class="btn btn-submit w-100 mt-2" id="btn_register_customer">Submit and Continue <i class="bi bi-caret-right-fill"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- form tour --}}
                <div class="form-step" id="form_tour">
                    <button id="btn_back_register" class="btn_arrow"><i class="bi bi-arrow-left-circle"></i></button>
                    <input type="hidden" name="hide_tour_customer_id" id="hide_tour_customer_id">
                    <h4>Tour Details</h4>
                    <div class="row mt-1">
                        <div class="col-md-6">
                            <label for="tour_start">Start Date</label>
                            <input type="date" name="tour_start" id="tour_start" class="form-control mb-2" required>
                        </div>

                        <div class="col-md-6">
                            <label for="tour_return">Return Date</label>    
                            <input type="date" name="tour_return " id="tour_return " class="form-control mb-2" required>
                        </div>

                        <div class="col-md-6">
                            <label for="number_of_adults">Number of Adults</label>   
                            <input type="number" name="number_of_adults" id="number_of_adults" class="form-control mb-2" required>
                        </div>

                        <div class="col-md-6">
                            <label for="number_of_children">Number of Children (optional)</label>   
                            <input type="number" name="number_of_children" id="number_of_children" class="form-control mb-2">
                        </div>

                        <div class="col-md-6">
                            <label for="budget">Budget(optional)</label>   
                            <input type="number" name="budget" id="budget" class="form-control mb-2">
                        </div>

                        <div class="col-md-6">
                            <label for="">Tour Pourpose</label>
                            <select name="cmb_pourpose" id="cmb_pourpose" class="form-select mb-2">
                                @foreach ($pourposes as $pourpose)
                                    <option value="{{ $pourpose->id }}">{{ $pourpose->name }}</option>                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Special Requests (optional)</label>
                            <input type="text" name="sepcial_request" id="sepcial_request" class="form-control mb-2">
                        </div>

                        <div class="col-md-6">
                            <button class="btn btn-submit w-100 mt-4" id="btn_create_request">Save & Continue <i class="bi bi-caret-right-fill"></i></button>
                        </div>
                        
                    </div>
                </div>

                {{-- Group Composition --}}
                <div id="form_composition" class="form-step">
                    <button id="btn_back_tour" class="btn_arrow"><i class="bi bi-arrow-left-circle"></i></button>
                    <h4>Who is going with you?</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Singles</h5>
                            <p>Singles who stay in one room</p>
                            <label for="">Room Count</label>
                            <input type="number" step="1" name="single_count" class="form-control">

                        </div>
                        <div class="col-md-3">
                            <h5>Couples</h5>
                            <p>Couples who stay in one room</p>
                            <label for="">Room Count</label>
                            <input type="number" step="1" name="couples_count" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <h5>Family</h5>
                            <p>Family </p>
                            <label for="">Adult Count</label>
                            <input type="number" step="1" name="couples_count" class="form-control">
                            <label for="">Children Count</label>
                            <input type="number" step="1" name="couples_count" class="form-control">
                            <label for="">Room Count</label>
                            <input type="number" step="1" name="couples_count" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <h5>Friends</h5>
                            <p>Friends Staying together</p>
                            <label for="">Number of Friend(Adults)</label>
                            <input type="number" step="1" name="friends_count" class="form-control">

                            <label for="">Room Count</label>
                            <input type="number" step="1" name="friend_room_count" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </section>
       

        {{-- <section class="section data-section">
           <div class="col-md-6">
                        
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