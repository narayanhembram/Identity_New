@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $banner = getContent('theme_five_banner.content', true);
        $highlightedText = $banner->data_values->highlighted_heading_text;
    @endphp
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        .creative-fullpage--slider {
            background-color: #ffffff;
            z-index: 2;
            width: 100%;
            position: relative;
            flex-direction: column;
            height: 100vh;
            font-size: 16px;
            display: flex;
            clip-path: none !important;
        }

        .creative-fullpage--slider .slider-inner {
            background: #000;
            height: 100vh;
            position: relative;
        }

        .creative-fullpage--slider .swiper-slide {
            position: relative;
            display: flex;
            justify-content: center;
            text-align: left;
            flex-direction: column;
            overflow: hidden;
        }

        .creative-fullpage--slider .swiper-slide .slider-inner img {
            object-fit: cover;
            width: 100%;

        }

        .creative-fullpage--slider .swiper-slide .slider-inner video {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .creative-fullpage--slider .swiper-slide .slider-inner .swiper-content {
            position: absolute;
            top: 22%;
            left: 50px;
            z-index: 1;
        }

        .creative-fullpage--slider .swiper-slide .slider-inner::after {
            content: "";
            position: absolute;
            width: 101%;
            height: 100%;
            top: 0;
            left: -1px;
            background-color: transparent;
            background-image: radial-gradient(at center right, #FFFFFF00 50%, #00000096 100%);
        }

        .swiper-slide .slider-inner .swiper-content .title-area .tag {
            color: #ffffff;
            font-weight: 900;
            font-size: 24px;
            margin-bottom: 10px;
            margin-top: 0px;
        }

        .swiper-slide .slider-inner .swiper-content .title-area .title {
            margin-top: 50px;
            color: #fff;
            font-size: 4vw;
            font-family: "Inter", sans-serif;
            font-weight: 900;
            line-height: 1.1;
            text-transform: uppercase;
            margin-bottom: 50px;
            margin-left: -12px;
            text-decoration: none;
        }

        .swiper-slide .slider-inner .swiper-content p.disc {
            font-size: 20px;
            width: 100%;
            margin-top: 15px;
            margin: 20px 0px 40px 0px;
            font-weight: 400;
            line-height: 32px;
            color: #FFFFFFB0;
        }

        .creative-btn--wrap .creative-slide--btn {
            color: #ffffff;
            margin-left: 18px;
            font-size: 1.4em;
            transition: margin-left 300ms cubic-bezier(0.49, 0, 0.01, 1);
            font-weight: 400;
            display: inline-flex;
            position: relative;
            white-space: nowrap;
            text-decoration: none;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            user-select: none;
            outline: none;
            outline-color: transparent;
            box-shadow: none;
            will-change: transform;
            backface-visibility: hidden;
        }

        .creative-btn--circle .circle {
            position: absolute;
            right: calc(100% - 10px);
            top: 0;
            bottom: 0;
            margin: auto;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            clip-path: circle(25% at 50% 50%);
            transition: clip-path 500ms cubic-bezier(0.49, 0, 0.01, 1);
        }

        .creative-btn--circle .circle .circle-fill {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            border-radius: 100%;
            background-color: #ffffff;
            will-change: transform;
            transform: scale(0);
            z-index: 1;
            transition: transform 500ms cubic-bezier(0.49, 0, 0.01, 1), background-color 500ms cubic-bezier(0.49, 0, 0.01, 1);
        }

        .creative-btn--circle .circle-icon {
            transform: translate(-100%, 0%);
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            z-index: 2;
            transition: all 500ms cubic-bezier(0.49, 0, 0.01, 1);
        }

        .creative-btn--circle .circle-icon .icon-arrow {
            width: 20px;
            height: 20px;
            stroke: none;
            fill: #000;
        }

        .creative-btn--circle .circle-outline {
            fill: transparent;
            width: 10px;
            stroke: #ffffff;
        }

        .creative-btn--wrap .creative-slide--btn .creative-btn--label {
            margin-left: 4pt;
            transition: transform 500ms cubic-bezier(0.49, 0, 0.01, 1);
        }

        .creative-btn--wrap .creative-slide--btn .creative-btn__border {
            position: absolute;
            left: 4pt;
            right: 0;
            bottom: 0;
            height: 1px;
            background: currentColor;
            transform-origin: right;
            transition: transform 500ms cubic-bezier(0.49, 0, 0.01, 1);
        }

        .creative-btn--wrap .creative-slide--btn:hover .creative-btn--label {
            transform: translateX(18px);
        }

        .creative-btn--wrap .creative-slide--btn:hover .creative-btn__border {
            transform: scale(0, 1);
        }

        .creative-btn--wrap .creative-slide--btn:hover {
            margin-left: 38px !important;
        }

        .creative-btn--wrap .creative-slide--btn:hover .circle {
            clip-path: circle(50% at 50% 50%);
        }

        .creative-btn--wrap .creative-slide--btn:hover .circle-fill {
            transform: scale(1, 1);
        }

        .creative-btn--wrap .creative-slide--btn:hover .circle-icon {
            transform: translate(0%, 0%);
            opacity: 1;
        }

        .creative-fullpage--slider .swiper-container-h .swiper-button-next,
        .creative-fullpage--slider .swiper-container-h .swiper-button-prev {
            bottom: 5%;
            top: unset;
            transform: scale(1);
            transition: all 0.4s;
            background-color: #FFFFFF00;
            backdrop-filter: blur(20px);
            height: 85px;
            width: 85px;
            line-height: 85px;
            border-radius: 50%;
            transition: all 0.4s;
        }

        .creative-fullpage--slider .swiper-container-h .swiper-button-next {
            right: 50px;
        }

        .creative-fullpage--slider .swiper-container-h .swiper-button-prev {
            left: 50px;
        }

        .swiper-container-h .slider-pagination-area {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: unset;
            right: unset;
            bottom: 80px;
            left: 50% !important;
            transform: translateX(-50%);
            width: 500px;
            z-index: 1;
        }

        .swiper-container-h .slider-pagination-area .slide-range {
            font-size: 16px;
            font-weight: 500;
            margin: 0 15px;
            color: #ffffff;
            line-height: 0;
            position: absolute;
            font-size: 20px;
        }

        .swiper-container-h .slider-pagination-area .slide-range.one {
            left: -50px;
        }

        .swiper-container-h .slider-pagination-area .slide-range.three {
            right: -50px;
        }

        .swiper-container-h .slider-pagination-area .swiper-pagination {
            bottom: 0 !important;
            width: 500px !important;
        }

        .swiper-container-h .slider-pagination-area .swiper-pagination .swiper-pagination-progressbar-fill {
            background: #ffffff;
        }

        .swiper-container-h .swiper-button-next::after {
            content: "\f061";
            font-family: var(--fa-style-family, "Font Awesome 6 Free");
            font-weight: var(--fa-style, 900);
            background: none;
            color: #ffffff;
            font-size: 60px;
        }

        .swiper-container-h .swiper-button-prev::after {
            content: "\f060";
            font-family: var(--fa-style-family, "Font Awesome 6 Free");
            font-weight: var(--fa-style, 900);
            background: none;
            color: #ffffff;
            font-size: 60px;
        }

        .swiper-container-h .swiper-button-next:hover,
        .swiper-container-h .swiper-button-prev:hover {
            background: #FFFFFF0D;
        }


        /* ====================== Responsive Ipad =============================== */
        @media (max-width: 991px) {
            .creative-fullpage--slider .swiper-slide .slider-inner .swiper-content {
                width: 100%;
                text-align: center;
                left: 0;
            }

            .creative-fullpage--slider .swiper-container-h .swiper-button-next,
            .creative-fullpage--slider .swiper-container-h .swiper-button-prev {
                height: 50px;
                width: 50px;
                line-height: 50px;
            }

            .swiper-container-h .slider-pagination-area {
                width: 200px !important;
            }

            .swiper-container-h .swiper-button-next::after,
            .swiper-container-h .swiper-button-prev::after {
                font-size: 30px;
            }

            .creative-fullpage--slider .swiper-container-h .swiper-button-next,
            .creative-fullpage--slider .swiper-container-h .swiper-button-prev {
                background: #ffffff3b;
            }

            .swiper-container-h .slider-pagination-area .swiper-pagination {
                bottom: 0 !important;
                width: 200px !important;
            }
        }

        /* ====================== Responsive Iphone =============================== */
        @media screen and (max-width: 767px) {
            .swiper-slide .slider-inner .swiper-content .title-area .title {
                font-size: 64px;
            }

            .swiper-slide .slider-inner .swiper-content .title-area .tag {
                margin-bottom: 0px;
            }

            .swiper-slide .slider-inner .swiper-content p.disc {
                margin: 20px auto 20px auto;
                font-size: 16px;
                width: 95%;
            }

            .swiper-container-h .slider-pagination-area {
                display: none;
            }

            .swiper-slide .slider-inner .swiper-content p.disc br {
                display: none;
            }
        }
    </style>

    <section class="creative-fullpage--slider" style="background-color: #f8f9fa; padding: 2rem 0;">
        <div class="banner-horizental">
            <div class="swiper swiper-container-h">
                @php
                    $totalSlides = App\Models\Bannerslider::count();
                @endphp
                <div class="swiper-wrapper">
                    @foreach (App\Models\Bannerslider::all() as $index => $slider)
                        <div class="swiper-slide">
                            <div class="slider-inner" data-swiper-parallax="100">
                                <img src="{{ asset('banner/' . $slider->image) }}" alt="full_screen-image">
                                <div class="swiper-content" data-swiper-parallax="2000">
                                    <div class="title-area">
                                        <!-- title-area -->
                                        {{-- <p class="tag">OUR VISION</p> --}}
                                        {{-- <a href="#" class="title"> {{ $slider->title }} </a> --}}
                                        <!-- title area -->
                                    </div>
                                    <p class="disc">
                                        {{-- {{ $slider->description }} --}}
                                    </p>
                                    <div class="creative-btn--wrap">
                                        {{-- <a class="creative-slide--btn" role="button" href="#0">
                                            <div class="creative-btn--circle">
                                                <div class="circle">
                                                    <div class="circle-fill"></div>
                                                    <svg viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg"
                                                        class="circle-outline">
                                                        <circle cx="25" cy="25" r="23"></circle>
                                                    </svg>
                                                    <div class="circle-icon">
                                                        <svg viewBox="0 0 12 10" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg" class="icon-arrow">
                                                            <path
                                                                d="M0 5.65612V4.30388L8.41874 4.31842L5.05997 0.95965L5.99054 0L10.9923 4.97273L6.00508 9.96L5.07451 9.00035L8.43328 5.64158L0 5.65612Z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="creative-btn--label">
                                                <div class="creative-btn__text">Take A Look</div>
                                                <div class="creative-btn__border"></div>
                                            </div>
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </section>

    <section class="mt-3 mb-3" style="position: relative; background-color: #f8f9fa; padding: 3rem 0;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text Section -->
                <div class="col-lg-6 col-12">
                    <h4 class="fw-bold">Why we are the most trusted Career Counseling  organization of Odisha!!</h4>
                    <p class="text-muted" style="text-align: justify;">Since 2016, <span class="text-danger">Career Map,</span> a unit of Identity Group have been Odisha's trusted name in career counselling, helping countless indecisive students and professionals make informed and decisive decisions about their future.<br>Our highly experienced team is passionate about your success and dedicated to providing scientific and structured solutions for career development unlike other unstructured players. </p>
                    <button class="btn--base" onclick="document.location='https://identity.zpsdemo.in/about'">Explore Us</button>
                </div>
                <!-- Image Section -->
                <div class="col-lg-6 col-12 text-center">
                    <img src="https://identity.zpsdemo.in/category/h2.jpg" alt="Digital Agency Banner" class="img-fluid rounded" />
                </div>
            </div>
        </div>
    </section>

    <!--========================== Banner Section End ==========================-->
    @if ($sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include($activeTemplate . 'sections.' . $sec)
        @endforeach
    @endif
@endsection

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var swiper = new Swiper(".swiper-container-h", {
            direction: "horizontal",
            effect: "slide",
            autoplay: {
                delay: 10000,
                disableOnInteraction: false
            },
            parallax: true,
            speed: 1600,
            rtl: true,
            loop: true,
            loopFillGroupWithBlank: !0,

            mousewheel: {
                eventsTarged: ".swiper-slide",
                sensitivity: 1
            },
            keyboard: {
                enabled: true,
                onlyInViewport: true
            },
            scrollbar: {
                el: ".swiper-scrollbar",
                hide: false,
                draggable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar"
            }
        });
        var swiper = new Swiper(".swiper-container-h1", {
            direction: "horizontal",
            effect: "slide",
            autoplay: false,
            parallax: true,
            speed: 1600,
            rtl: true,
            loop: true,
            loopFillGroupWithBlank: !0,
            keyboard: {
                enabled: true,
                onlyInViewport: true
            },
            scrollbar: {
                el: ".swiper-scrollbar",
                hide: false,
                draggable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                type: "bullets",
                clickable: "true"
            }
        });
    });
</script>