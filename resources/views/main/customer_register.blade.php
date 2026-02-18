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

        @if (session('success'))
            <p class="text-center text-success">Your tour request has been submitted successfully! <br>One of our team member will contact you soon.</p>
        @else
            <section class="section">
                <div class="container">
                    <h4>Submit your tour request here...</h4>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{ route('main.store_request') }}" method="post" class="form-submit">
                                @csrf
                                <div class="form-set">
                                    <h5>Tour Details</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Where do you want to go?</label>
                                            <select name="cmb_tour_country" id="cmb_tour_country" class="form-select mb-3 form-input">
                                                @foreach ($travel_countries as $travel_country)
                                                    <option value="{{ $travel_country->id }}">{{ $travel_country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Travel Date</label>
                                            <input type="date" name="travel_date" class="form-control mb-3 form-input" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Return Date</label>
                                            <input type="date" name="return_date" class="form-control mb-3 form-input" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Adults</label>
                                            <input type="number" name="adults" class="form-control mb-3 form-input" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Children</label>
                                            <input type="number" name="children" class="form-control mb-3 form-input">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Infants</label>
                                            <input type="number" name="infants" class="form-control mb-3 form-input">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">How many rooms you may need?</label>
                                            <input type="number" name="rooms_count" class="form-control mb-3 form-input" value="1" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">What is the pourpose of you tour?</label>
                                            <select name="cmb_pourpose" id="cmb_pourpose" class="form-select mb-3 form-input">
                                                @foreach ($pourposes as $pourpose)
                                                    <option value="{{ $pourpose->id }}">{{ $pourpose->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Your budget for the trip?</label>
                                            <select name="cmb_budget" id="cmb_budget" class="form-select mb-3 form-input">
                                                @foreach ($budget_ranges as $budget_range)
                                                    <option value="{{ $budget_range->id }}">{{ $budget_range->range }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Tell us about you tour plan</label>
                                            <textarea name="text_description" id="text_description" cols="30" rows="5" class="form-control form-input" placeholder="where do to want to go?"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-set">
                                    <h5>Your Details</h5>
                                    <div class="col-md-12">
                                        <label for="">Your name</label>
                                        <input type="text" name="customer_name" class="form-control mb-3 form-input" placeholder="your name">

                                        <label for="">Your email</label>
                                        <input type="email" name="customer_email" class="form-control mb-3 form-input" placeholder="yourname@gmail.com">

                                        <label for="">Your phone</label>
                                        <input type="text" name="customer_phone" class="form-control mb-3 form-input" placeholder="+94712345678">

                                        <label for="">Your Country</label>
                                        <select name="cmb_customer_country" id="cmb_customer_country" class="form-select mb-3 form-input">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-submit float-end mt-3">Request Quotation</button>

                            </form>
                        </div>
                        <div class="col-md-4">
                            <div id="right_image">
                                <img src="{{ asset('images/main/view_1.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    </main>

    <script src="{{ asset('js/main_request.js') }}"></script>

    @include('main.footer')

@endsection
