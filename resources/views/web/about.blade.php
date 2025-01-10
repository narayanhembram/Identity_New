@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="about-us text-center bg-light py-5">
        <div class="container">
            <p class="description">
                Are you facing challenges in making an informed decision about your future or developing plans to
                achieve your desired career goals? If yes, let Career Map help you with this. We are a team of highly
                experienced professionals dedicated to helping students make the right decision. <span
                    class="fw-bold text-danger">Career Map, a unit of Identity Group, is the best career counsellor in
                    Bhubaneswar</span>, offering professional career counselling services in Odisha since 2016. We are
                highly passionate about your career, our work, and the science behind it. Our team is concerned about
                your happiness and offers psychometric assessment-based career counselling, behavioural counselling,
                career guidance, and more. Instead of piecemeal, we believe in holistic career development. We have
                established career cells in many top schools in Bhubaneswar and are now on a journey to expand our
                services all over the state. Moreover, we are also the technical partner of UNICEF Odisha and Odisha
                School Education Programme Authority.
            </p>
        </div>
    </section>

    <!-- Philosophy, Mission, Vision Section -->
    <section class="philosophy-mission-vision py-5">
        <div class="container">
            <div class="row text-center" style="border-radius:10px; background-color:#c8c8c840;">
                <!-- Philosophy -->
                {{-- <div class="about-box"> --}}
                    <div class="col-md-6">
                        <div class="card-body">
                            <h2 class="text-danger">Philosophy</h2>
                            <p class="card-text">
                                Students spend more than 70 percent of their adult lives serving different jobs. Thus,
                                taking career decisions is a crucial decision in every student's professional and
                                academic journey. It is vital that such decisions are made under expert guidance and
                                utmost care.
                            </p>
                        </div>
                    </div>
                    <!-- Mission and Vision -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <h2 class="text-danger">Mission</h2>
                            <p class="card-text">
                                To help students and individuals attain their career goals in life by offering the best
                                career counselling.
                            </p>
                        </div>
                        <div class="card-body">
                            <h2 class="text-danger">Vision</h2>
                            <p class="card-text">
                                To be a global and trusted leader in the field of career counselling by offering
                                necessary information, researching different career options, and providing expert advice
                                to make better decisions for students and professionals.
                            </p>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </section>

    <section class="philosophy-mission-vision py-5">
        <div class="container">
            <div class="row text-center">
                    <div class="col-md-6">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/frontend/about/founder.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <span class="text-danger">Founder & MD, Identity Group</span>
                            <h2 class="text-danger">About Founder</h2>
                            <p class="card-text">
                                Jasobant Narayan Singhlal is the Founder & Managing Director of Identity Group, Bhubaneswar. He is an established Corporate Trainer, a Master Trainer (Campus to Corporate), a Motivational Speaker, an established Career Counsellor, and Parenting Guide. He has been spearheading the Training and Counselling under the umbrella of IDENTITY GROUP in Bhubaneswar since June 2012. His two folded vision is to empower, guide the youth towards a bright career and to empower and produce impactful educators.
                            </p>
                            <button class="btn btn-danger">Founder Profile</button>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection
