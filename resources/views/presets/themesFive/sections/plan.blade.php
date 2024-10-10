@php
    $plan = getContent('plan.content', true);
    $plans = App\Models\Plan::where('status', 1)->latest()->limit(3)->get();
@endphp

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<!--========================== Career Plan Start ==========================-->
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
<style>
    .bio {
        display: grid;
        grid-auto-flow: row;
        grid-template-rows: min-content;
        grid-gap: 24px;
    }

    .artist-list {
        display: flex;
        min-height: 200px;
        height: 450px !important;
        margin: 0;
        padding: 0;
        overflow: hidden;
        list-style-type: none;
        width: 100%;
        min-width: 100%;
        flex-direction: column;
    }

    @media only screen and (min-width: 1280px) {
        .artist-list {
            flex-direction: row;
        }
    }

    .artist-item {
        flex: 1;
        display: flex;
        align-items: stretch;
        cursor: pointer;
        transition: all 0.35s ease;
        position: relative;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;
        overflow: hidden;
    }

    .artist-item::before {
        content: "";
        position: absolute;
        z-index: 20;
        top: 0;
        left: 0;
        width: 100%;
        height: 450px;
        background: rgba(15, 15, 15, 0.75);
    }

    .artist-item.active {
        flex: 6;
        cursor: default;
    }

    .artist-item.active::before {
        background: linear-gradient(180deg, rgba(15, 15, 15, 0) 0%, #111111 100%);
    }

    h2 {
        font-size: 36px;
        line-height: 36px;
        font-weight: 700;
        text-transform: uppercase;
    }

    @media only screen and (min-width: 768px) {
        h2 {
            font-size: 48px;
            line-height: 48px;
        }
    }

    @media only screen and (min-width: 1280px) {
        h2 {
            font-size: 64px;
            line-height: 64px;
        }
    }

    h3 {
        font-weight: bold;
        white-space: nowrap;
        position: absolute;
        z-index: 30;
        opacity: 1;
        top: 50%;
        left: 50%;
        transition: top 0.35s, opacity 0.15s;
        transform-origin: 0 0;
        font-size: 24px;
        text-transform: uppercase;
        transform: translate(-50%, -50%) rotate(0deg);
    }

    @media only screen and (min-width: 1280px) {
        h3 {
            top: 100%;
            left: 50%;
            font-size: 32px;
            transform: translate(-20px, -50%) rotate(-90deg);
        }
    }

    .artist-item.active h3 {
        opacity: 0;
        top: 200%;
    }

    .section-content {
        position: relative;
        z-index: 30;
        opacity: 0;
        align-self: flex-end;
        width: 100%;
        transition: all 0.35s 0.1s ease-out;
    }

    .artist-item.active .section-content {
        opacity: 1;
    }

    .section-content .inner {
        position: absolute;
        display: grid;
        grid-auto-flow: row;
        grid-template-columns: 1fr;
        grid-column-gap: 20px;
        align-items: flex-end;
        left: 0;
        bottom: 0;
        padding: 20px;
        opacity: 0;
        transition: opacity 0.25s ease-out;
    }

    @media only screen and (min-width: 768px) {
        .section-content .inner {
            grid-auto-flow: column;
            grid-template-columns: calc(100% - 340px) 300px;
            grid-column-gap: 40px;
            padding: 40px;
        }
    }

    @media only screen and (min-width: 1280px) {
        .section-content .inner {
            grid-auto-flow: column;
            grid-template-columns: 460px 200px;
            grid-column-gap: 40px;
            padding: 40px;
        }
    }

    .artist-item.active .section-content .inner {
        opacity: 1;
    }

    .artist-profile-link {
        pointer-events: none;
    }

    .artist-item.active .artist-profile-link {
        pointer-events: all;
    }

    .artist-item {
    position: relative; /* To position the pseudo-element */
    overflow: hidden; /* Ensure the pseudo-element doesn't overflow */
}

.artist-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: inherit; /* Inherit the background image */
    background-size: cover;
    filter: blur(8px); /* Adjust the blur level */
    z-index: 1; /* Position it below the text */
}

.inner {
    position: relative; /* Ensure content is above the blurred background */
    z-index: 2; /* Position it above the pseudo-element */
}

</style>
{{-- <section class="plan py-3">
    <div class="container">
        <div class="notification text-center bg-light p-4 rounded">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-left">
                        <div class="col-lg-4 col-md-12 text-left">
                            <h3 class="mb-3 text-danger font-weight-bold">
                                How CareerMap can help you ?
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
</section> --}}
<section class="plan py-100">
    <ul class="artist-list" id="artist-list">
        @foreach (App\Models\Careerplan::all() as $data)
            <li class="artist-item active"
                style="background-image: url('{{ asset('careerplan/' . $data->image) }}');" role="button">
                <h3 style="color: #fff"> {{ $data->title }} </h3>
                <div class="section-content">
                    <div class="inner">
                        <div class="bio">
                            <h2 style="color: #fff">{{ $data->title }}</h2>
                            <p>{{ $data->description }}</p>
                            <a href="{{ $data->link }}"
                                target="_blank" class="artist-profile-link">
                                <img src="https://assets.codepen.io/152347/spotify-badge.svg" alt="Explore Us"
                                    width="176" loading="lazy" />
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let active = 0;
        const artistListItems = document.querySelectorAll('#artist-list li');

        function updateActiveClass() {
            artistListItems.forEach((item, index) => {
                item.classList.toggle('active', index === active);
            });
        }

        artistListItems.forEach((item, i) => {
            item.addEventListener('click', () => {
                active = i;
                updateActiveClass();
            });
        });

        updateActiveClass();
    });
</script>
<!--========================== Plan End ==========================-->
