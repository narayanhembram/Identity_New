@php
    $plan = getContent('plan.content', true);
    $plans = App\Models\Plan::where('status', 1)->latest()->limit(3)->get();
@endphp
<!--========================== Plan Start ==========================-->
{{-- <section class="plan py-100">
    <div class="container">
        <div class="title">
            <h6>{{__(@$plan->data_values->top_heading)}}</h6>
            <h4>{{__(@$plan->data_values->heading)}}</h4>
            <p>{{__(@$plan->data_values->sub_heading)}}</p>
        </div>
        @include($activeTemplate.'components.plan')
    </div>
</section> --}}

<section class="plan py-5">
    <div class="container">
        <div class="notification text-center bg-light p-4 rounded">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-left">
                        <div class="col-lg-4 col-md-12 text-left">
                            <h3 class="mb-3 text-danger font-weight-bold">
                                How PickMyCareer can help you ?
                            </h3>
                            <span class="mt-3 mb-4 divider mini"></span>
                            <p>
                                “ What am I passionate about?” “What am I going to be?” These
                                are the most difficult questions one has to face while they
                                decide to pursue their higher education.
                                <br> <br>
                                Don’t worry! We are here to help you.
                            </p>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-12 mb-4">
                                    <div class="d-flex">
                                        <div class="pr-3">
                                            <figure class="mt-4"><img
                                                    src="https://lmes-mars-cdn.jujube.in/site/new/revisions/v3/carrer-libary.png"
                                                    class="img-fluid" alt=""></figure>
                                        </div>
                                        <div>
                                            <h4 class="is-title h4 font-weight-bold text-left">
                                                Career Library
                                            </h4>
                                            <p>
                                                Our comprehensive career library consists of 500+
                                                career options, 400+ courses, 100+ entrance exams, and
                                                more things to explore.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-4">
                                    <div class="d-flex">
                                        <div class="pr-3">
                                            <figure class="mt-4"><img
                                                    src="https://lmes-mars-cdn.jujube.in/site/new/revisions/v3/master-guidance.png"
                                                    class="img-fluid" alt=""></figure>
                                        </div>
                                        <div>
                                            <h4 class="is-title h4 font-weight-bold text-left">
                                                Master Class
                                            </h4>
                                            <p>
                                                Get inspired by video bytes from veterans successful
                                                in their fields, teaching about the right ideas to
                                                succeed in the industry.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-4">
                                    <div class="d-flex">
                                        <div class="pr-3">
                                            <figure class="mt-4"><img
                                                    src="https://lmes-mars-cdn.jujube.in/site/new/revisions/v3/carrer-report.png"
                                                    class="img-fluid" alt=""></figure>
                                        </div>
                                        <div>
                                            <h4 class="is-title h4 font-weight-bold text-left">
                                                Career Assessment
                                            </h4>
                                            <p>
                                                Our AI-based assessment and precise 20-page
                                                personalized career report helps you discover your
                                                interest and maps it with the perfect career.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-4">
                                    <div class="d-flex">
                                        <div class="pr-3">
                                            <figure class="mt-4"><img
                                                    src="https://lmes-mars-cdn.jujube.in/site/new/revisions/v3/one-on-one.png"
                                                    class="img-fluid" alt=""></figure>
                                        </div>
                                        <div>
                                            <h4 class="is-title h4 font-weight-bold text-left">
                                                One-to-one counselling
                                            </h4>
                                            <p>
                                                Get personal, online, one-to-one counseling sessions
                                                (interactions) with the field experts to gain a deeper
                                                insights in your field.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--========================== Plan End ==========================-->
