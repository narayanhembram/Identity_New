@php
    $about = getContent('theme_five_about.content', true);
    $aboutElements = getContent('theme_five_about.element', false, 3);
@endphp

<style>
    .slick-slide {
        width: 150px !important;
        border: 1px solid #c0c0c0;
        border-radius: 5px;
        margin: 2px;
        /* animation: marquee 30s linear infinite; */
    }

    @media (max-width: 768px) {
        .brand img {
            height: 40px;
        }
    }

    @media (max-width: 480px) {
        .brand img {
            height: 30px;
        }
    }

    .brand-slider .slick-track {
        display: flex;
        align-items: center;
    }

    .brand-slider .slick-slide {
        width: auto;
        /* Let the width adjust based on content */
        display: inline-block;
        float: none;
        /* Remove float to avoid alignment issues */
        margin-right: 10px;
        /* Adjust spacing between slides if needed */
    }

    .mt_20{
        margin-top: 20px !important;
    }
</style>

<section class="brand"
    style="padding: 5px; height: 70px; position: fixed; bottom: 0; left: 0; right: 0; z-index: 999; background-color: #fff; width: 100%;">
    <div class="container">
        <div class="brand-slider">
            @foreach (App\Models\Brand::all() as $data)
                <div class="px-2">
                    <a href="">
                        <img src="{{ asset('brand/' . $data->logo) }}"
                            style="height: 50px; max-width: 100%; object-fit: contain;" alt="@lang('image')">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!--========================== About Start ==========================-->
<section class="about mt-3 mb-3 bg-img" data-background="{{ asset($activeTemplateTrue . 'images/about_bg.png') }}">
    <div class="shape1">
        <img src="{{ asset($activeTemplateTrue . 'images/shape/shape5.png') }}" alt="@lang('shape')">
    </div>
    <div class="shape2 d-lg-block d-none">
        <img src="{{ asset($activeTemplateTrue . 'images/shape/shape6.png') }}" alt="@lang('shape')">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12 my-auto thumb">
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <img src="{{ getImage(getFilePath('frontend') . '/theme_five_about' . '/' . @$about->data_values->about_image) }}"
                        alt="@lang('image')">
                    <div class="experience">
                        <h1>{{ $about->data_values->experience_count ?? 0 }}</h1>
                        <p>@lang('Years of excelence')</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-12 my-auto mt_20">
                <div class="title mt-3 mt-lg-0">
                    <h6>{{ __(@$about->data_values->top_heading) }}</h6>
                    <h4>{{ __(@$about->data_values->heading) }}</h4>
                    <p>{{ __(@$about->data_values->short_description) }}</p>
                </div>
                <div class="info">
                    @foreach ($aboutElements as $item)
                        <p>{{ __($item->data_values->content) }}</p>
                    @endforeach
                </div>
                <div>
                    <a href="{{ route('user.login') }}" class="btn btn--base">@lang('Discover More')</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
    jQuery(document).ready(function($) {
        $('.brand-slider').slick({
            slidesToShow: 5, // Number of logos to show at once
            slidesToScroll: 1, // Scroll one logo at a time
            infinite: true, // Enable infinite scrolling
            arrows: false, // Hide arrows
            autoplay: true, // Enable autoplay
            autoplaySpeed: 0, // No delay between slides
            speed: 3000, // Control the speed of the sliding motion
            cssEase: 'linear', // Smooth, continuous scrolling
            pauseOnHover: false, // Do not pause on hover
            variableWidth: true, // Allow variable width for slides to avoid gaps
        });
    });
</script>
