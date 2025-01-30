@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

    <section class="about-us text-center py-5 bg-light">
        <div class="container">
            <p class="lead text-muted mb-5" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200"
                style="font-size: 0.95rem;">
                Are you facing challenges in making an informed decision about your future or developing plans to achieve
                your desired career goals? If yes, let Career Map help you with this. We are a team of highly experienced
                professionals dedicated to helping students make the right decision. <span class="fw-bold text-danger">Career
                    Map, a unit of Identity Group, is the best career counsellor in
                    Bhubaneswar</span>, offering professional career counselling services in Odisha since 2016.
            </p>
            <p class="lead text-muted mb-5" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="400"
                style="font-size: 0.95rem;">
                We are highly passionate about your career, our work, and the science behind it. Our team is concerned about
                your happiness and offers psychometric assessment-based career counselling, behavioural counselling, career
                guidance, and more. Instead of piecemeal, we believe in holistic career development.
            </p>
            <p class="lead text-muted mb-5" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="600"
                style="font-size: 0.95rem;">
                We have established career cells in many top schools in Bhubaneswar and are now on a journey to expand our
                services all over the state. Moreover, we are also the technical partner of UNICEF Odisha and Odisha School
                Education Programme Authority.
            </p>
        </div>
    </section>

    <!-- Philosophy, Mission, Vision Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center justify-content-center">
                <!-- Philosophy -->
                <div class="col-md-4 mb-4 d-flex" data-aos="fade-up">
                    <div class="card shadow w-100">
                        <div class="card-body d-flex flex-column">
                            <h3 class="text-danger">Philosophy</h3>
                            <p class="text-muted">
                                Students spend more than 70 percent of their adult lives serving different jobs. Thus, taking career decisions is a crucial decision in every student's professional and academic journey. It is vital that such decisions are made under expert guidance and utmost care.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Mission -->
                <div class="col-md-4 mb-4 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="card shadow w-100">
                        <div class="card-body d-flex flex-column">
                            <h3 class="text-danger">Mission</h3>
                            <p class="text-muted">
                                To help students and individuals attain their career goals in life by offering the best career counselling.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Vision -->
                <div class="col-md-4 mb-4 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="card shadow w-100">
                        <div class="card-body d-flex flex-column">
                            <h3 class="text-danger">Vision</h3>
                            <p class="text-muted">
                                To be a global and trusted leader in the field of career counselling by offering necessary information, researching different career options, and providing expert advice to make better decisions for students and professionals.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Founder Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- Founder Image -->
                <div class="col-md-6 mb-4" data-aos="fade-left" data-aos-duration="1000">
                    <img src="{{ asset('assets/images/frontend/about/founder.png') }}" alt="Founder" class="img-fluid"
                        style="width: 100%; height: auto;">
                </div>
                <!-- Founder Details -->
                <div class="col-md-6 mb-4" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="text-danger mb-3">About the Founder</h2>
                    <span class="text-muted">Founder & MD, Identity Group</span>
                    <p class="mt-3" style="font-size: 0.8rem;">
                        Jasobant Narayan Singhlal is the Founder & Managing Director of Identity Group, Bhubaneswar. He is
                        an established Corporate Trainer, a Master Trainer (Campus to Corporate), a Motivational Speaker, an
                        established Career Counsellor, and Parenting Guide. He has been spearheading the Training and
                        Counselling under the umbrella of IDENTITY GROUP in Bhubaneswar since June 2012.
                    </p>
                    <p style="font-size: 0.8rem;">
                        His two-fold vision is to empower and guide the youth towards a bright career and to empower and
                        produce impactful educators.
                    </p>
                    <a href="#" class="btn btn-danger mt-3">Founder Profile</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
            once: true,
        });
    </script>
@endsection
