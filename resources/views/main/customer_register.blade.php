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

        {{-- <div id="div_navigator">
            <div class="ball" id="ball_register"></div>
            <div class="ball" id="ball_tour"></div>
            <div class="ball" id="ball_composition"></div>
            <div class="ball" id="ball_destinations"></div>
        </div> --}}

        <section class="section">
            <div class="form-wrapper">
                {{-- form register --}}
                {{-- <div id="form_register" class="form-step active">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="float-end">Register and Continue</h4>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('images/main/view_1.jpg') }}" alt="register image" id="img_customer_register">
                        </div>
                        <div class="col-md-6">
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
                                <input type="email" name="email" id="email" class="form-control" required placeholder="youremail@gmail.com">
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
                </div> --}}

                {{-- form tour --}}
                {{-- <div class="form-step" id="form_tour">
                    <input type="hidden" name="hide_tour_customer_id" id="hide_tour_customer_id">
                    <div class="row">
                        <div class="col-md-6">
                            <button id="btn_back_register" class="btn_arrow"><i class="bi bi-arrow-left-circle"></i></button>
                        </div>
                        <div class="col-md-6">
                            <h4 class="float-end">Tour Details</h4>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-6">
                            <img src="{{ asset('images/main/view_1.jpg') }}" alt="register image" id="img_customer_register">
                        </div>
                        <div class="col-md-6">
                            <label for="tour_start">Start Date</label>
                            <input type="date" name="tour_start" id="tour_start" class="form-control mb-2" required>

                            <label for="tour_return">Return Date</label>
                            <input type="date" name="tour_return" id="tour_return" class="form-control mb-2" required>

                            <label for="budget">Budget(optional)</label>
                            <input type="number" name="budget" id="budget" class="form-control mb-2">

                            <label for="">Tour Pourpose</label>
                            <select name="cmb_pourpose" id="cmb_pourpose" class="form-select mb-2">
                                @foreach ($pourposes as $pourpose)
                                    <option value="{{ $pourpose->id }}">{{ $pourpose->name }}</option>
                                @endforeach
                            </select>

                            <label for="">Special Requests (optional)</label>
                            <input type="text" name="sepcial_request" id="sepcial_request" class="form-control mb-2">

                            <button class="btn btn-submit w-100 mt-2" id="btn_create_request">Save & Continue <i class="bi bi-caret-right-fill"></i></button>
                        </div>
                    </div>
                </div> --}}

                {{-- Group Composition --}}
                {{-- <div id="form_composition" class="form-step">
                    <button id="btn_back_tour" class="btn_arrow"><i class="bi bi-arrow-left-circle"></i></button>
                    <h4>Who is going with you?</h4>
                    <input type="hidden" name="tour_request_id" id="tour_request_id" value="1">
                    <div class="col-md-4">
                        <label for="">Select Group Compisition</label>
                        <select name="cmb_compisition" id="cmb_compisition" class="form-select">
                            <option value="0">--- Select Composition ---</option>
                            <option value="1">Singles</option>
                            <option value="2">Couples</option>
                            <option value="3">Family</option>
                            <option value="4">Friends</option>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-2" id="div_adults">
                            <label for="">Adults</label>
                            <input type="number" class="form-control" id="adult_count">
                        </div>
                        <div class="col-md-2" id="div_children">
                            <label for="">Children</label>
                            <input type="number" class="form-control" id="children_count">
                        </div>
                        <div class="col-md-2" id="div_extra_bed">
                            <label for="">Extra Bed</label>
                           <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="chk_extra_bed">
                                <label class="form-check-label" for="chk_extra_bed">Extra Bed</label>
                            </div>
                        </div>
                        <div class="col-md-2" id="div_rooms">
                            <label for="">Rooms</label>
                            <input type="number" class="form-control" id="room_count">
                        </div>
                        <div class="col-md-2" id="div_submit_button">
                            <button class="btn btn-submit mt-4 w-100" id="btn_add_composition"><i class="bi bi-plus"></i> Add</button>
                        </div>
                    </div>

                    <div id="div_request_people"></div>
                    <h5 id="h5_totals"></h5>
                    <form action="{{ route('main.tour_destination') }}" method="post">
                        @csrf
                        <input type="hidden" name="hide_tour_request_id" id="hide_tour_request_id">
                        <button class="btn btn-submit float-end mt-2" id="btn_submit_composition">Submit & Continue</button>
                    </form>

                </div> --}}
            </div>
        </section>

        <section class="section">
            <div class="container">
                <h4>Submit your tour request here...</h4>
                <div class="row">
                    <div class="col-md-8" class="div_form">
                        <form action="" method="post" class="form-submit">
                            @csrf
                            <div class="col-md-12">
                                <label for="">Where do you want to go?</label>
                                <select name="cmb_tour_country" id="cmb_tour_country" class="form-select">
                                    <option value=""></option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        right columns
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script src="{{ asset('js/main_request.js') }}"></script>

    @include('main.footer')

@endsection
