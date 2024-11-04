@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $banner = getContent('theme_five_banner.content', true);
        $highlightedText = $banner->data_values->highlighted_heading_text;
    @endphp
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.8.0/tsparticles.bundle.min.js"></script> --}}

    {{-- <style>
        .swiper {
            position: relative;
            width: 650px;
            height: 350px;
        }

        .swiper-slide {
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.3);
            user-select: none;
            border-radius: 20px;
        }

        .cost {
            position: absolute;
            top: 8px;
            right: 6px;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            border-radius: 30px;
            padding: 6px 10px;
            color: #fff;
            font-size: clamp(0.8rem, 4vw, 0.9rem);
            font-weight: 600;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            border-radius: 20px;
        }


        @media (max-width: 890px) {
            .logo {
                right: -10px;
                bottom: -20px;
            }

            .logo img {
                width: 80px;
            }
        }

        @media (max-width: 1050px) {
            .swiper {
                width: 350px;
                height: 450px;
            }
        }

        @media (max-width: 930px) {
            section {
                grid-template-columns: 100%;
                grid-template-rows: 55% 40%;
                grid-template-areas:
                    "slider"
                    "content";
                place-items: center;
                gap: 64px;
                padding: 60px;
            }

            .swiper {
                grid-area: slider;
            }

            .content {
                grid-area: content;
                text-align: center;
            }

            .content h1 {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 470px) {
            section {
                padding: 40px 40px 60px;
            }

            .swiper {
                width: 300px;
                height: 400px;
            }
        }
    </style> --}}

    <style>
        /* .content h1 {
                                font-family: "Comfortaa", sans-serif;
                                font-size: clamp(2rem, 4vw, 3.5rem) !important;
                                font-weight: 700 !important;
                                line-height: 1.2 !important;
                                letter-spacing: 1px !important;
                                margin-bottom: 36px !important;
                                color: #fff !important;
                            } */

        /* .content p {
                                font-size: clamp(0.9rem, 3vw, 1.25rem);
                                font-weight: 300;
                                line-height: 1.5;
                                margin-bottom: 30px;
                                color: #fff;
                            } */

        /* .content button {
                                background: #eaeaea;
                                color: #202134;
                                font-size: clamp(0.9rem, 4vw, 1rem);
                                font-weight: 600;
                                border: 0;
                                outline: 0;
                                padding: 8px 14px;
                                border-radius: 7px;
                                transform: scale(1);
                                transition: all 0.4s ease-in;
                                cursor: pointer;
                            } */
        /*
                            .content button:is(:hover, :focus) {
                                transform: scale(0.98);
                                background-color: #6f7aa6;
                                color: #eaeaea;
                            } */

        /* SLIDER */

        .swiper {
            position: relative;
            width: 500px;
            height: 425px;
        }

        .swiper-slide {
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.3);
            user-select: none;
            border-radius: 20px;
        }

        .cost {
            position: absolute;
            top: 8px;
            right: 6px;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            border-radius: 30px;
            padding: 6px 10px;
            color: #fff;
            font-size: clamp(0.8rem, 4vw, 0.9rem);
            font-weight: 600;
        }

        .dark-text {
            color: #202134;
        }

        .swiper-slide img {
            width: 500px !important;
            height: 350px;
            border-radius: 20px;
        }

        .overlay {
            position: absolute;
            display: flex;
            flex-direction: column;
            justify-content: center;
            left: 0;
            bottom: 0;
            width: 500px;
            height: 150px;
            padding: 5px 10px;
            background: rgba(109, 38, 35, 0.2);
            backdrop-filter: blur(50px);
            -webkit-backdrop-filter: blur(20px);
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            border-radius: 0 0 20px 20px;
        }

        .overlay h1 {
            font-size: 20px;
            font-weight: 500;
        }

        .overlay p {
            font-size: 12px;
            font-weight: 300;
            line-height: 1.3;
        }

        .ratings {
            display: flex;
            column-gap: 10px;
            margin-top: -6px;
        }

        .ratings span {
            font-size: clamp(0.8rem, 4vw, 0.9rem);
            font-weight: 300;
        }

        .star {
            color: #afe312;
        }

        /* .logo {
                            position: fixed;
                            right: -20px;
                            bottom: -30px;
                            z-index: 10;
                        }

                        .logo img {
                            width: 120px;
                        } */

        @media (max-width: 890px) {
            .logo {
                right: -10px;
                bottom: -20px;
            }

            .logo img {
                width: 80px;
            }
        }

        @media (max-width: 1050px) {
            .swiper {
                width: 350px;
                height: 450px;
            }
        }

        @media (max-width: 930px) {
            section {
                grid-template-columns: 100%;
                grid-template-rows: 55% 40%;
                grid-template-areas:
                    "slider"
                    "content";
                place-items: center;
                gap: 64px;
                padding: 60px;
            }

            .swiper {
                grid-area: slider;
            }

            .content {
                grid-area: content;
                text-align: center;
            }

            .content h1 {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 470px) {
            section {
                padding: 40px 40px 60px;
            }

            .swiper {
                width: 300px;
                height: 400px;
            }
        }
    </style>

    <!--========================== Banner Section Start ==========================-->
    {{-- <section class="banner-section">
        <div class="banner-thumb bg-img" style="height: 500px;"
            data-background="{{ asset($activeTemplateTrue . 'images/banner_bg.png') }}">
            <div class="shape1 d-xl-block d-none">
                <svg viewBox="0 0 278 627" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_d_132_23510)">
                        <path d="M138.074 240.106L216.805 201.22L211.118 288.848L138.074 240.106Z" fill="#FFB41D" />
                        <path d="M125.353 338.28L131.04 250.649L204.083 299.394L125.353 338.28Z" />
                        <path d="M130.965 349.643L209.695 310.757L204.01 398.387L130.965 349.643Z" />
                        <path d="M229.385 301.032L308.115 262.146L302.428 349.777L229.385 301.032Z" />
                        <path d="M222.345 311.579L295.387 360.322L216.656 399.208L222.345 311.579Z" />
                        <path d="M138.147 141.11L211.191 189.855L132.46 228.741L138.147 141.11Z" />
                        <path d="M222.271 410.573L301.002 371.687L295.316 459.316L222.271 410.573Z" />
                        <path d="M386.698 421.25L307.968 460.136L313.653 372.506L386.698 421.25Z" />
                        <path d="M293.891 481.224L288.205 568.855L215.16 520.11L293.891 481.224Z" />
                        <path d="M379.585 530.791L300.855 569.677L306.542 482.046L379.585 530.791Z" />
                        <path d="M208.137 530.65L281.169 579.4L202.439 618.287L208.137 530.65Z" />
                    </g>
                    <defs>
                        <filter id="filter0_d_132_23510" x="121.354" y="141.11" width="466.182" height="485.177"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="4" />
                            <feGaussianBlur stdDeviation="2" />
                            <feComposite in2="hardAlpha" operator="out" />
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_132_23510" />
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_132_23510" result="shape" />
                        </filter>
                    </defs>
                </svg>
            </div>
            <div class="shape2 d-lg-block d-none">
                <svg viewBox="0 0 321 362" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M-41.234 88.7875H46.5762L2.67215 164.837L-41.234 88.7875Z" />
                    <path d="M13.6527 183.85H101.463L57.5568 259.901L13.6527 183.85Z" />
                    <path d="M211.23 183.85L167.326 259.901L123.414 183.85H211.23Z" />
                    <path d="M266.117 266.238H178.301L222.211 190.189L266.117 266.238Z" />
                    <path d="M68.5375 266.238L112.444 190.189L156.348 266.238H68.5375Z" />
                    <path d="M2.67215 190.189L46.5762 266.238H-41.234L2.67215 190.189Z" />
                    <path d="M2.67215 0.0600891L46.5762 76.1115H-41.234L2.67215 0.0600891Z" />
                    <path d="M-41.234 278.914H46.5762L2.67215 354.963L-41.234 278.914Z" />
                    <path d="M156.348 278.914L112.444 354.963L68.5375 278.914H156.348Z" fill="#FFB41D" />
                    <path d="M222.211 354.963L178.301 278.914H266.117L222.211 354.963Z" />
                    <path d="M321 361.302H233.184L277.09 285.251L321 361.302Z" />
                    <path d="M101.463 361.302H13.6527L57.5568 285.251L101.463 361.302Z" />
                </svg>
            </div>
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 col-12 my-auto">
                        <div class="content">
                            <h5>{{ __(@$banner->data_values->top_heading) }}</h5>
                            <h1>
                                {!! str_replace(
                                    __(@$highlightedText),
                                    "<span class='text--base'>$highlightedText</span>",
                                    __(@$banner->data_values->heading),
                                ) !!}
                            </h1>
                        </div>
                        <div class="d-block d-md-flex d-lg-flex mt-4">
                            <div class="mb-lg-0 mb-3">
                                <a href="{{ route('user.login') }}" class="btn--base">@lang('Discover')</a>
                            </div>
                            <div>
                                <a href="{{ route('contact') }}" class="btn--base btn--base-two">@lang('Contact Us')</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper col-lg-6 col-12">
                        <div class="swiper-wrapper d-flex justify-content-md-center justify-content-lg-start">
                            <div class="swiper-slide ">
                                <img
                                    src="https://media.istockphoto.com/id/507009337/photo/students-helping-each-other.jpg?s=612x612&w=0&k=20&c=993wW_Qvl_LW27TaeXJy2KHYd5tUix3n1dFZXPSkEBU=" />
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://img.freepik.com/free-psd/realistic-poster-graduation-template_23-2149237592.jpg?t=st=1727353755~exp=1727357355~hmac=7032b89847d08ab8ba5109bccdb0621b5ff9070768f746edc803e825290d4fdd&w=740" />
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://media.istockphoto.com/id/1278975233/photo/high-school-students-doing-exam-in-classroom.jpg?s=612x612&w=0&k=20&c=YxR9rTScBny8zJuZchXhKx08jxpP354Rv4XD6q-0xS8=" />
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://media.istockphoto.com/id/1198221819/photo/young-designers-discussing-new-color-scheme-for-project.jpg?s=612x612&w=0&k=20&c=nmfOzJgYyBLfgEBhLis7xo8p87iUJX25DbHfQShB13k=" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <section class="banner-section bckground" style="position: relative;">
        {{-- <div id="tsparticles" style="position: absolute; width: 100%; height: 100%;"></div> --}}
        <div class="banner-thumb bg-img" style="height: 500px; background-color: hsl(var(--base) / 0.05);">
            <div class="container ">
                <div class="row gy-4">
                    <div class="col-lg-5 col-12 my-auto">
                        <h1>{{ __(@$banner->data_values->top_heading) }}</h1>
                        <p style="color: black;">
                            {!! str_replace(
                                __(@$highlightedText),
                                "<span class='text--base'>$highlightedText</span>",
                                __(@$banner->data_values->heading),
                            ) !!}
                        </p>
                        <button class="btn--base">Explore Us</button>
                        </<div class="banner-thumb bg-img" style="height: 500px;"div>
                    </div>
                    <div class="swiper col-lg-7 col-12">
                        <div class="swiper-wrapper">
                            @foreach (App\Models\Bannerslider::all() as $data)
                                <div class="swiper-slide">
                                    <img src="{{ asset('banner/' . $data->image) }}" />
                                    <a class="overlay" href="http://localhost/identity/public/user/scholarship/view">
                                        <div class="overlay">
                                            <h1>{{ $data->title }}</h1>
                                            <p>
                                                {{ $data->description }}
                                            </p>
                                            <div class="ratings">
                                                <div class="stars">
                                                    <ion-icon class="star" name="star"></ion-icon>
                                                    <ion-icon class="star" name="star"></ion-icon>
                                                    <ion-icon class="star" name="star"></ion-icon>
                                                    <ion-icon class="star" name="star"></ion-icon>
                                                    <ion-icon class="star" name="star-half-outline"></ion-icon>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
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

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
