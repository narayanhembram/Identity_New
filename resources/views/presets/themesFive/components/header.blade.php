<link rel="stylesheet" href="{{ asset('assets/presets/themesFive/nav/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/presets/themesFive/nav/style.css') }}">
@php
    $languages = App\Models\Language::all();
    $pages = App\Models\Page::where('tempname', $activeTemplate)->get();
@endphp
<style>
    @media(max-width:960px) {
        .circle-container {
            margin-top: 100px;
        }
    }


    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .rotate-image {
        animation: rotate 2s linear infinite;
    }

    .grecaptcha-badge {
        width: 256px;
        height: 60px;
        display: block;
        transition: right 0.3s ease 0s;
        position: fixed;
        bottom: 14px;
        right: -186px;
        box-shadow: gray 0px 0px 5px;
        border-radius: 2px;
        overflow: hidden;
        opacity: 0;
    }

    .side-icon-bar {
        position: fixed;
        right: 0;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        z-index: 10;
    }

    .side-icon-bar a {
        display: block;
        text-align: center;
        padding: 16px;
        transition: all 0.3s ease;
        color: white;
        font-size: 20px;
    }

    .side-icon-bar a:hover {
        background-color: #000;
    }

    .side-icon-bar-call {
        background: #3986dd;
        color: white;
        border-radius: 10px 0 0 0;
    }

    .side-icon-bar-whatsapp {
        background: #12af66;
        color: white;
    }

    .side-icon-bar-inquiry {
        background: #bb0000;
        color: white;
        border-radius: 0 0 0 10px;
    }

    .side-icon-bar-lightbox {
        display: none;
        position: fixed;
        top: 50%;
        right: 50px;
        transform: translateY(-50%);
        width: 300px;
        padding: 20px;
        background: white;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        z-index: 1000;
    }

    .side-icon-bar-lightbox-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .close-side-icon-bar-lightbox {
        cursor: pointer;
        font-size: 24px;
        color: #bbb;
    }

    .close-side-icon-bar-lightbox:hover {
        color: #000;
    }

    .side-icon-bar-lightbox-content {
        font-size: 16px;
        color: #333;
    }

    @media (max-width: 425px) {
        .side-icon-bar a {
            padding: 10px !important;
        }
    }
</style>

<style>
    .lightbox-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1000;
    }

    .lightbox-content {
        background: #fff;
        padding: 10px;
        margin: 100px auto;
        width: 100%;
        max-width: 500px;
        border-radius: 15px;
        text-align: center;
    }

    .lightbox-header {
        text-align: right;
    }

    .close-lightbox {
        cursor: pointer;
        font-size: 24px;
    }

    .lightbox-logo {
        width: 20%;
        margin: 20px 0;
    }

    .lightbox-button {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        font-size: 15px;
        /* background-color: #091e3e; */
        color: #fff;
        border-radius: 7px;
        text-decoration: none;
        margin: 10px;
    }

    .lightbox-button i {
        color: #c4c4c4;
        font-size: 20px;
        padding-right: 5px;
    }

</style>

<!-- ==================== Header End Here ==================== -->
{{-- <div class="header" id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="logo-area">
                <a class="navbar-brand logo" href="{{ route('home') }}"><img
                        src="{{ getImage(getFilePath('logoIcon') . '/logo_white.png', '?' . time()) }}"
                        alt="{{ config('app.name') }}" alt="@lang('logo')">
                    <div class="logo-bg"></div>
                </a>
            </div>
            <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span id="hiddenNav"><i class="las la-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu mx-auto ps-lg-4 ps-0">
                    @foreach ($pages as $page)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::url() == url('/') . '/' . $page->slug ? 'active' : '' }}"
                                aria-current="page" href="{{ route('pages', [$page->slug]) }}">{{ __($page->name) }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="nav-end d-lg-flex d-md-flex d-block align-items-center py-lg-0 py-1">
                    <div class="d-flex mx-2">
                        <div class="icon">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <select class="select-dir langSel">
                            @foreach ($languages as $language)
                                <option value="{{ $language->code }}" @if (Session::get('lang') === $language->code) selected @endif>
                                    {{ __($language->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    @auth
                        <a class="btn--base mt-2 mt-lg-0" href="{{ route('user.home') }}">@lang('Dashboard')</a>
                    @else
                        <a class="btn--base mt-2 mt-lg-0" href="{{ route('user.login') }}">@lang('Sign In')</a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</div> --}}



<div class="side-icon-bar">
    <a href="tel:+91-9108510058" class="side-icon-bar-call"><i class="fa fa-phone-alt"></i></a>
    <a id="whatsappLink" class="side-icon-bar-whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
    <a id="contactForm" class="side-icon-bar-inquiry"><i class="fa fa-info"></i></a>
</div>

<div id="side-icon-bar-lightbox" class="side-icon-bar-lightbox" style="display:none;">
    <div class="side-icon-bar-lightbox-header">
        <span>
            <b style="font-size:22px">How can we help?</b><br>
            <p style="font-size: 12px;">Post your enquiry</p>
        </span>
        <span id="closeside-icon-bar-lightbox" class="close-side-icon-bar-lightbox">&times;</span>
    </div>

    <div class="side-icon-bar-lightbox-content">
        <div id="formContainer" class="form-containerr">
            {{-- <script src="https://www.google.com/recaptcha/api.js?render=6Lckir0mAAAAABcq7fsKxtLiCBPb58DXEHNqJR7p" async defer></script> --}}

            <!-- Form -->
            <form id="enquiry" method="Post" enctype="multipart/form-data" action="" >
                <div class="field-control-group">
                    <input type="text" placeholder="Full Name" name="name" maxlength="100" required>
                </div>
                <div class="field-control-group">
                    <input type="email" placeholder="Email ID" name="email" maxlength="100" required>
                </div>
                <div class="field-control-group">
                    <input type="text" placeholder="Phone No." name="phone" maxlength="10" required>
                </div>
                <div class="field-control-group">
                    <textarea placeholder="Anything we need to know?" name="note" maxlength="2000" style="height: 100px;"></textarea>
                </div>
                <button id="form-submit-button" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<div class="container-fluid topbar px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-10 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i> Koramangala, Bangalore </small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+91-9108510058</small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>connect@careermap.in</small>
            </div>
        </div>
        <div class="col-lg-2 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                        class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                        class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                        class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                        class="fab fa-instagram fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="#"><i
                        class="fab fa-youtube fw-normal"></i></a>
            </div>
        </div>
    </div>
</div>

<header id="header" class="header d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <a class="navbar-brand logo" href="{{ route('home') }}"><img style="max-height: 60px;"
                src="{{ getImage(getFilePath('logoIcon') . '/logo_white.png', '?' . time()) }}"
                alt="{{ config('app.name') }}" alt="@lang('logo')">
            <div class="logo-bg"></div>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                @foreach ($pages->where('menu_id', null) as $page)
                    <li class="nav-item dropdown">
                        <a class="nav-link {{ Request::url() == url('/') . '/' . $page->slug ? 'active' : '' }}"
                            aria-current="page" href="{{ route('pages', [$page->slug]) }}">{{ __($page->name) }}</a>
                        <ul class="sub-dropdown-content">
                            @foreach ($pages->where('menu_id', $page->id) as $data)
                                <li><a href="{{ route('pages', [$data->slug]) }}">{{ $data->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                {{-- <li><a class="nav-link scrollto " href="index.html">Home</a></li>
                <li class="dropdown "><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li class="dropdown">
                            <a href="career-counselling-and-guidance.html">
                                <span>Career Counselling</span>
                                <i class="bi bi-chevron-right"></i>
                            </a>
                            <ul class="dropdown-content">
                                <li class="dropdown">
                                    <a href="#"><span>Students</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul class="sub-dropdown-content">
                                        <li><a href="career-guidance-for-class-8th-students.html">8th Std Students</a>
                                        </li>
                                        <li><a href="career-counselling-for-9th-students.html">9th Std Students</a>
                                        </li>
                                        <li><a href="career-counselling-after-10th.html">10th Std Students</a></li>
                                        <li><a href="career-counselling-for-11th-class-students.html">11th Std
                                                Students</a></li>
                                        <li><a href="career-counselling-after-12th.html">12th Std Students</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#">
                                        <span>Graduates</span>
                                        <i class="bi bi-chevron-right"></i>
                                    </a>
                                    <ul class="sub-dropdown-content">
                                        <li><a href="career-counselling-after-graduation.html">Undergraduates</a></li>
                                        <li><a href="career-guidance-after-post-graduation.html">Postgraduates</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="career-counselling-for-working-professionals.html">
                                        <span>Working Professionals</span>
                                        <i class="bi bi-chevron-right"></i>
                                    </a>
                                    <ul class="sub-dropdown-content">
                                        <li><a href="currently-working-executives.html">Currently
                                                Working<br>Professionals</a></li>
                                        <li><a href="restart-your-career-after-break.html">On Career Break</a></li>
                                        <!-- <li><a href="../entrepreneurship-counselling.php">Aspiring<br>Entrepreneurs</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="psychological-counselling.html">Psychological Counselling</a></li>
                        <li><a href="coaching-and-mentoring.html">Coaching & Mentoring</a></li>
                        <li><a href="personality-development.html">Personality Development</a></li>
                        <li class="dropdown">
                            <a href="#">
                                <span>Others</span>
                                <i class="bi bi-chevron-right"></i>
                            </a>
                            <ul class="dropdown-content">
                                <li><a href="job-interview-skills.html">Job Interview Skills</a></li>
                                <li><a href="cv-writing.html">CV Writing</a></li>
                                <li><a href="discuss_a_career.html">Discuss Your Dream <br> Career</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a class="dropdown " href="testimonials.html">Testimonials</li></a>
                <li class="dropdown "><a href="#"><span>Resources</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>


                        <li><a class="dropdown" href="webinar-and-events.html"><span>Webinar & Events</span> </a>
                        </li>

                        <li><a class="dropdown" href="e-book.html"><span>E-Book</span> </a></li>
                        <li><a class="dropdown" href="blog.html"><span>Blog</span> </a></li>
                        <li><a class="dropdown" href="gallery.html"><span>Gallery</span> </a></li>
                        <li><a class="dropdown" href="career-bank.html"><span>Career Bank</span> </a></li>



                    </ul>
                </li>
                <li class="dropdown "><a href="about-us.html"><span>About Us</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li class="dropdown"><a href="about-us.html#ourcorevalues"><span>Our Core
                                    Values</span> </a></li>
                        <li class="dropdown"><a href="about-us.html#visionmission"><span>Our Vision &
                                    Mission</span> </a></li>
                        <li class="dropdown"><a href="about-us.html#ourteam"><span>Our Team</span> </a>
                        </li>
                    </ul>
                </li>
                <li><a class="dropdown " href="contact-us.html">Contact Us</a></li>
                <li><a href="tel:9167887863784"><button
                            style="background-color: #fff; color: rgb(54, 54, 54); font-weight: bold;"
                            class="dropdown btn btn-primary"><i class="fa fa-phone-alt"
                                style="font-size: 20px; font-weight: 800; padding: 5px; color: #ab2931;"></i>
                            9108510058</button> </a></li> --}}
            </ul>
            &nbsp; &nbsp; &nbsp;&nbsp;
            <div class="auth-buttons">
                <a class="btn btn-primary mt-2 mt-lg-0 login-btn" style="color: #fff" href="{{ route('user.login') }}" onclick="toggleLightbox(event)">Log
                    In</a>
                {{-- @auth
                    <a class="btn--base mt-2 mt-lg-0" href="{{ route('user.home') }}"
                        onclick="toggleLightbox(event)">Dashboard</a>
                @else
                    <a class="btn--base mt-2 mt-lg-0" href="{{ route('user.login') }}" onclick="toggleLightbox(event)">Sign
                        In</a>
                @endauth --}}
            </div>
            {{-- <i class=" bi bi-list mobile-nav-toggle"></i>&nbsp; &nbsp; --}}

        </nav>
    </div>

    <div id="lightbox" class="lightbox-overlay">
        <div class="lightbox-content">
            <div class="lightbox-header">
                <span class="close-lightbox" onclick="toggleLightbox()"><i class="fas fa-times"></i></span>
            </div>
            <div class="lightbox-body text-center">
                <a class="navbar-brand logo" href="{{ route('home') }}"><img style="max-height: 60px;"
                        src="{{ getImage(getFilePath('logoIcon') . '/logo_white.png', '?' . time()) }}"
                        alt="{{ config('app.name') }}" alt="@lang('logo')">
                    <div class="logo-bg"></div>
                </a>
                <h5 style="margin-top: 15px; margin-bottom:15px; color:#ab2931">Welcome To SetMyCareer</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{ route('admin.login') }}" class="btn btn-primary custom-btn" style="background-color: #ab2931; color: white; padding: 10px 20px; text-align: center; border-radius: 5px; border: 1px solid #ab2931;">
                            <h5 style="margin: 0; color:#fff">Institute Login</h5>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('user.login') }}" class="btn btn-secondary custom-btn" style="background-color: #ab2931; color: white; padding: 10px 20px; text-align: center; border-radius: 5px; border: 1px solid #ab2931;">
                            <h5 style="margin: 0; color:#fff">Student Login</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Tag Manager -->
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KDVDK9N');
    </script>

    <script>
        function toggleLightbox(event) {
            // Prevent default link action if event is passed
            if (event) {
                event.preventDefault();
            }

            // Toggle the visibility of the lightbox
            const lightbox = document.getElementById('lightbox');
            lightbox.style.display = (lightbox.style.display === 'block') ? 'none' : 'block';
        }
    </script>

    <!-- End Google Tag Manager -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // Show the form when the icon is clicked
            $("#contactForm").click(function() {
                $("#side-icon-bar-lightbox").fadeIn();
            });

            // Close the form when the close button is clicked
            $("#closeside-icon-bar-lightbox").click(function() {
                $("#side-icon-bar-lightbox").fadeOut();
            });
        });
    </script>

</header>

<!-- ==================== Header End Here ==================== -->
