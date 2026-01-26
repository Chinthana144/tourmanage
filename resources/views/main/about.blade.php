@extends('main.page_layout')

<link rel="stylesheet" href="{{ asset('css/main_page.css') }}">

@section('page_content')
    <main class="main">
        <section class="section header-section">
            <img src="{{asset('images/main/sigiriya_1.jpg')}}" alt="" id="img_background">
            <div class="container">
                <h2>Welcome to the Team of Akagi eXperiences</h2>
                <div>
                    <p>See who's behind the seen</p>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="about_card">
                            <h5>About Us</h5>
                            <p>
                                Akagi International Inc. is a dynamic and diversified
                                company established in 2022, committed to delivering
                                excellence across multiple sectors. Our core areas of
                                expertise include Human Resources, Foreign Employment, Tourism, Education Consultancy, and
                                Automotive Imports and Parts. To ensure focused and
                                specialized services, we operate through four subsidiary
                                companies, each dedicated to one of these key fields. At
                                Akagi International Inc., we pride ourselves on our
                                innovative approach, global outlook, and unwavering
                                commitment to quality and customer satisfaction.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('images/company/akagi_international.png') }}" alt="" id="akagi_logo">
                    </div>

                    {{-- Vision and mission --}}
                    <div class="col-md-6 mt-3">
                        <div class="about_card">
                            <div class="img_container">
                                <img src="{{ asset('images/main/vision.png') }}" alt="" class="img_icon">
                            </div>

                            <h5>Vision</h5>
                            <p>
                                To be a globally trusted and innovative leader
                                across our diverse sectors — empowering
                                individuals, enhancing industries, and creating
                                lasting value through excellence in human
                                resources, international employment, tourism,
                                education consultancy, and automotive solutions.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="about_card">
                            <div class="img_container">
                                <img src="{{ asset('images/main/mission.png') }}" alt="" class="img_icon">
                            </div>
                            <h5>Mission</h5>
                            <p>
                                Our mission is to deliver exceptional, reliable, and forward-thinking services through our specialized subsidiaries in human resources, foreign employment, tourism, education consultancy, and automotive import and parts. We are committed to building strong global partnerships, empowering individuals and communities, and driving sustainable growth through integrity, innovation, and customer-centric solutions.
                            </p>
                        </div>
                    </div>

                    {{-- who we are --}}
                    <div class="col-md-12 mt-3">
                        <div class="about_card">
                            <h5>Who we are</h5>
                            <p>
                                Akagi International Inc. proudly operates through its specialized subsidiaries:
                                Akagi Experiences, focusing on travel and tourism; Akagi Serendib, dedicated to
                                automotive imports and parts; Work Force Global, our expert in human resources and
                                foreign employment; Nozomi JLS, providing top-tier Japanese language education; and
                                Akagi JLS, supporting broader educational consultancy services. Together, these
                                subsidiaries embody our commitment to excellence across diverse industries.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="about_card">
                            <h4><i class="bi bi-caret-right-fill"></i>Akagi International</h4>
                            <h4><i class="bi bi-caret-right-fill"></i>Work Force Global</h4>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="about_card">
                            <h4><i class="bi bi-caret-right-fill"></i>Akagi Experience</h4>
                            <h4><i class="bi bi-caret-right-fill"></i>Nozomi JLS</h4>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="about_card">
                            <h4><i class="bi bi-caret-right-fill"></i>Akagi Serendib</h4>
                            <h4><i class="bi bi-caret-right-fill"></i>Akagi JLS</h4>
                        </div>
                    </div>

                    {{-- Innovation --}}
                    <div class="col-md-4 mt-3">
                        <div class="about_card">
                            <h5>Innovation</h5>
                            <p>At Akagi International Inc., innovation is at the heart of everything we
                                do. We continuously embrace new ideas, technologies, and strategies
                                to enhance our services and stay ahead in a rapidly evolving global
                                landscape. Whether it's streamlining recruitment processes, enriching
                                travel experiences, advancing education solutions, or optimizing
                                automotive services, we are driven by a commitment to deliver smarter,
                                more efficient, and future-ready solutions to our clients.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="about_card">
                            <div class="img_container">
                                <img src="{{ asset('images/company/akagi_serendib.png') }}" alt="" class="img_icon">
                            </div>
                            <h5>1. Akagi Serendib</h5>
                            <p>
                                Location - Sri Lanka
                                Services - Importation of automobiles and
                                spare parts from Japan
                                Clientele - Sri Lankan automotive industry
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="about_card">
                            <div class="img_container">
                                <img src="{{ asset('images/company/akagi_experiences.png') }}" alt="" class="img_icon">
                            </div>
                            <h5>2. Akagi eXperiences</h5>
                            <p>
                                Services-Tourism and tourism facility management
                                Offerings - Guided tours, transportation services
                                Market - Tourists visiting Maldives and Sri Lanka
                            </p>
                        </div>

                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="about_card">
                            <div class="img_container">
                                <img src="{{ asset('images/company/akagi_jls.png') }}" alt="" class="img_icon">
                            </div>
                            <h5>3. Akagi Japanese Language School</h5>
                            <p>Location - Sri Lanka(online classes available globally) <br>
                                Programs - Japanese language education for SriLankan students <br>
                                Approach - Blending traditional classroom learning with modern online education methods
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="about_card">
                            <div class="img_container">
                                <img src="{{ asset('images/company/nozomi_jls.png') }}" alt="" class="img_icon">
                            </div>
                            <h5>4. Nozomi Japanese Language School</h5>
                            <p>Location - Japan <br>
                                Programs - Japanese language education for Sri Lankan students <br>
                                Approach - Guidance to find new paths in education and employment
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="about_card">
                            <h5>The Team</h5>
                            <p>
                                At Akagi International Inc., our greatest strength lies in our people. We
                                are proud to have a diverse and dedicated team of professionals who
                                bring expertise, passion, and innovation to every aspect of our business.
                                From experienced industry leaders and skilled consultants to energetic
                                young professionals, our team works collaboratively across our
                                subsidiaries to deliver exceptional results. United by a shared vision and
                                commitment to excellence, our people are the driving force behind our
                                continued growth and success.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <img src="{{ asset('images/company/akagi_experiences.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('main.footer')
@endsection
