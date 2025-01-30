@php
    $plan = getContent('plan.content', true);
    $plans = App\Models\Plan::where('status', 1)->latest()->limit(3)->get();
@endphp

<style>
    .testimonial {
        display: flex;
        padding: 15px 35px;
        align-items: center;
        justify-content: center;
        /* min-height: 100vh; */
    }

    .wrapper {
        width: 100%;
        position: relative;
    }

    .wrapper i {
        top: 50%;
        height: 50px;
        width: 50px;
        cursor: pointer;
        font-size: 1.25rem;
        position: absolute;
        text-align: center;
        line-height: 50px;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
        transform: translateY(-50%);
        transition: transform 0.1s linear;
    }

    .wrapper i:active {
        transform: translateY(-50%) scale(0.85);
    }

    .wrapper i:first-child {
        left: -22px;
        /* left: -35px; */
        z-index: 1;
    }

    .wrapper i:last-child {
        right: -22px;
        z-index: 1;
    }

    .wrapper .carousel {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: calc((100% / 3) - 12px);
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        gap: 16px;
        border-radius: 8px;
        scroll-behavior: smooth;
        scrollbar-width: none;
    }

    .carousel::-webkit-scrollbar {
        display: none;
    }

    .carousel.no-transition {
        scroll-behavior: auto;
    }

    .carousel.dragging {
        scroll-snap-type: none;
        scroll-behavior: auto;
    }

    .carousel.dragging .card {
        cursor: grab;
        user-select: none;
    }

    .carousel :where(.card, .img) {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel .card {
        border: 1px solid #ab2931;
        scroll-snap-align: start;
        /* height: 375px; */
        list-style: none;
        background: #d6565629;
        cursor: pointer;
        padding-bottom: 15px;
        flex-direction: column;
        border-radius: 10px;
    }

    .carousel .card .img {
        background: #00a85a;
        height: 148px;
        width: 148px;
        border-radius: 50%;
        margin-top: 15px;
    }

    .card .img img {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #fff;
    }

    .carousel .card h2 {
        font-weight: 500;
        font-size: 1.56rem;
        margin: 30px 0 5px;
        font-family: "Playfair Display", serif;
    }

    .carousel .card span {
        color: #6a6d78;
        font-size: 1.31rem;
        font-family: "Playfair Display", serif;
    }

    .carousel .card p {
        color: #050505;
        font-size: 16px;
        text-align: center;
        padding-left: 20px;
        padding-right: 20px;
        max-height: 150px;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .wrapper .left svg {
        margin-top: 15px;
    }

    .wrapper .right svg {
        margin-top: 15px;
    }

    @media screen and (max-width: 900px) {
        .wrapper .carousel {
            grid-auto-columns: calc((100% / 2) - 9px);
        }
    }

    @media screen and (max-width: 600px) {
        .wrapper .carousel {
            grid-auto-columns: 100%;
        }
    }

    .client {
        text-align: center;
        font-family: "Playfair Display", serif;
        font-weight: 500;
    }

    .testimonial .card {
        position: relative;
        overflow: hidden;
        border-radius: 5px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .testimonial .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .testimonial .card:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        clip-path: polygon(0 100%, 100% 0%, 100% 100%);
        background-image: linear-gradient(-86deg, #1E1E1E 0%, #1E1E1E 100%);
        opacity: 0.5;
        transform: scale(0);
        transform-origin: bottom right;
        transition: transform 500ms linear;
        pointer-events: none;
        z-index: 1;
    }

    .testimonial .card:after {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        clip-path: polygon(0 0, 100% 0%, 0% 100%);
        background-image: linear-gradient(-86deg, #E4C590 0%, #E4C590 100%);
        opacity: 0.5;
        transform: scale(0);
        transform-origin: top left;
        transition: transform 500ms linear;
        pointer-events: none;
        z-index: 1;
    }

    .testimonial .card:hover:before,
    .testimonial .card:hover:after {
        transform: scale(1);
    }

    .testimonial .card .myimage img {
        display: block;
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 5px;
        position: relative;
        z-index: 2;
    }

    .testimonial .card h2,
    .testimonial .card p {
        position: relative;
        z-index: 2;
        margin: 10px 0;
        padding: 0 15px;
        color: #030f27;
    }

    .testimonial .card h2 {
        font-size: 20px;
        font-weight: bold;
    }

    .testimonial .card p {
        font-size: 16px;
        line-height: 1.5;
        font-weight: 400;
    }
</style>
<div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                 <div class="mt-6 mt-lg-0">
                    <h4 style="text-align: left;">Our Services</h4>
                    <p style="text-align: left;">We offer a variety of professionally designed mentoring options:</p>
                </div>
                </div>
                </div>
                </div>

<section class="testimonial">
    <div class="wrapper">
        <i id="left" class="left"><svg width="16" height="16" fill="currentColor" class="bi bi-arrow-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg></i>
        <ul class="carousel">
            @foreach (App\Models\Careerplan::all() as $plans)
                <li class="card">
                    <div class="myimage" style="width: 100%;">
                        <img src="{{ asset('careerplan/' .$plans->image) }}"
                            style="width: 100%; height:250px;" alt="">

                    </div>
                    <h2>{{$plans->title}}</h2>

                    <p>{{ Str::limit($plans->description, 30) }}</p>
                </li>
            @endforeach
        </ul>
        <i id="right" class="right"><svg width="16" height="16" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
            </svg></i>
    </div>

</section>

<script>
    const wrapper = document.querySelector(".wrapper");
    const carousel = document.querySelector(".carousel");
    const firstCardWidth = carousel.querySelector(".card").offsetWidth;
    const arrowBtns = document.querySelectorAll(".wrapper i");
    const carouselChildrens = [...carousel.children];

    let isDragging = false,
        isAutoPlay = true,
        startX,
        startScrollLeft,
        timeoutId;

    // Get the number of cards that can fit in the carousel at once
    let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

    // Insert copies of the last few cards to beginning of carousel for infinite scrolling
    carouselChildrens
        .slice(-cardPerView)
        .reverse()
        .forEach((card) => {
            carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
        });

    // Insert copies of the first few cards to end of carousel for infinite scrolling
    carouselChildrens.slice(0, cardPerView).forEach((card) => {
        carousel.insertAdjacentHTML("beforeend", card.outerHTML);
    });

    // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove("no-transition");

    // Add event listeners for the arrow buttons to scroll the carousel left and right
    arrowBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
        });
    });

    const dragStart = (e) => {
        isDragging = true;
        carousel.classList.add("dragging");
        // Records the initial cursor and scroll position of the carousel
        startX = e.pageX;
        startScrollLeft = carousel.scrollLeft;
    };

    const dragging = (e) => {
        if (!isDragging) return; // if isDragging is false return from here
        // Updates the scroll position of the carousel based on the cursor movement
        carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    };

    const dragStop = () => {
        isDragging = false;
        carousel.classList.remove("dragging");
    };

    const infiniteScroll = () => {
        // If the carousel is at the beginning, scroll to the end
        if (carousel.scrollLeft === 0) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.scrollWidth - 2 * carousel.offsetWidth;
            carousel.classList.remove("no-transition");
        }
        // If the carousel is at the end, scroll to the beginning
        else if (
            Math.ceil(carousel.scrollLeft) ===
            carousel.scrollWidth - carousel.offsetWidth
        ) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.offsetWidth;
            carousel.classList.remove("no-transition");
        }

        // Clear existing timeout & start autoplay if mouse is not hovering over carousel
        clearTimeout(timeoutId);
        if (!wrapper.matches(":hover")) autoPlay();
    };

    const autoPlay = () => {
        if (window.innerWidth < 800 || !isAutoPlay)
            return; // Return if window is smaller than 800 or isAutoPlay is false
        // Autoplay the carousel after every 2500 ms
        timeoutId = setTimeout(() => (carousel.scrollLeft += firstCardWidth), 2500);
    };
    autoPlay();

    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("scroll", infiniteScroll);
    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
    wrapper.addEventListener("mouseleave", autoPlay);
</script>
