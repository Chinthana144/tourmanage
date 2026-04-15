@extends('main.page_layout')

<link rel="stylesheet" href="{{ asset('css/main_page.css') }}">

@section('page_content')
    <main class="main">
        <section class="section header-section">
            <img src="{{asset('images/main/sigiriya_1.jpg')}}" alt="" id="img_background">
            <div class="container">
                <h2>Contact Us</h2>
                <div><span>Need more information? </span> <span class="description-title">Send a message</span></div>
            </div>
        </section>

        <section class="section data-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    @if (session('success'))
                        <p>{{ session('message') }}pasha... </p>
                    @else
                        <div class="col-md-6">
                            <form action="{{ route('main.store_contact_message') }}" method="post">
                                @csrf
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control mb-3 form-input" placeholder="youemail@gmail.com" required>

                                <label for="">Your message</label>
                                <Textarea name="message" class="form-control mb-3 form-input" required style="background-color: #4c4c4c; color:#eee">

                                </Textarea>

                                <button type="submit" class="btn btn-submit float-end mt-3">Send Message</button>
                            </form>
                        </div>
                    @endif
                    
                </div>
            </div>
        </section>
    </main>

    @include('main.footer')
@endsection