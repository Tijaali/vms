<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>IUB| Visitor Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('client/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main CSS File -->
    <link href="{{ asset('client/assets/css/main.css') }}" rel="stylesheet">
    <style>
        .call-to-action {
            position: relative;
            width: 100%;
            height: 30dvw;
            overflow: hidden;
        }

        .call-to-action video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            /* Keep the video in the background */
        }
    </style>

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ asset('client/assets/img/logo.png') }}" alt=""> -->
                <h1 class="sitename">VMS</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <div class="user_option">

                </div>
                <ul>
                    <li><a href="#hero" class="">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Events</a></li>
                    <li><a href="#portfolio">Campuses</a></li>
                    <li><a href="#team">Team</a></li>

                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            @if (auth()->user())
                <div class="text-white mx-3">
                    {{ auth()->user()->name }}
                </div>
            @else
                
            @endif
            @if (auth()->user())
                <a href="{{ route('dashboard') }}" class=" mx-3">Dashboard</a>
            @endif

            @if (auth()->user())
                <a href="#" onclick="document.getElementById('form').submit()">Logout</a>
            @else
                <a href="{{ route('login') }}" class="btn-getstarted">Login</a>
            @endif
            <form hidden action="{{ route('logout') }}" method="post" id="form">
                @csrf
            </form>
            {{-- <a class="btn-getstarted" href="#about">Get Started</a> --}}

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
                        data-aos="zoom-out">
                        <h1 class="">IUB Campus Gatekeeper</h1>
                        <p class=""> Advanced Visitor Management System,efficiently manage campus visits with IUB
                            Visitor Manager—streamlining entry, ensuring security, and enhancing operational efficiency.
                        </p>
                        <div class="d-flex">
                            <a href="{{route('visitor.create')}}" class="btn-get-started">Book your visit</a>
                            <a href="https://www.youtube.com/watch?v=kmksyoJn4i4"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('client/assets/img/bwp.jpg') }}" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section">

            <div class="container" data-aos="zoom-in">

                <div class="swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="{{ asset('client/assets/img/abbasia.webp') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('client/assets/img/bagdad.webp') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('client/assets/img/bhn.webp') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('client/assets/img/khawaja.webp') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('client/assets/img/ryk.webp') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('client/assets/img/sports.webp') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('client/assets/img/reseach.webp') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('client/assets/img/cs.webp') }}"
                                class="img-fluid" alt=""></div>
                    </div>
                </div>

            </div>

        </section><!-- /Clients Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 class="">About Us</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <p>
                            Empowering Campus Security and Visitor Management at The Islamia University of Bahawalpur
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-circle"></i> <span>Our Mission: To leverage technology for
                                    enhancing campus security and streamlining visitor management processes.</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Our Vision: A safe, secure, and
                                    technologically advanced campus where visitor management is integrated seamlessly
                                    into daily operations.</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Our System: IUB Visitor Manager, developed by
                                    IT professionals and security experts, features Streamlined Visitor Registration
                                    ,Real-Time Tracking and User-Friendly Interface</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('client/assets/img/features.jpg') }}" alt=""
                            style="width: 600px; height:300px">
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Why Us Section -->
        <section id="why-us" class="section why-us" data-builder="section">

            <div class="container-fluid">

                <div class="row gy-4">

                    <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

                        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class=""><span class="">Enhancing Campus Security and Visitor Experience
                                    with Advanced Technology </span></h3>
                            <p class="">
                                The IUB Visitor Management System is meticulously engineered to streamline the
                                management of visitors while elevating campus security at The Islamia University of
                                Bahawalpur. Our system ensures a seamless integration of technology and user-friendly
                                features, making it a top choice for educational institutions aiming to enhance
                                operational efficiency and visitor satisfaction.
                            </p>
                        </div>

                        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

                            <div class="faq-item faq-active">

                                <h3><span>01</span> How does the system handle visitor registration?</h3>
                                <div class="faq-content">
                                    <p>The IUB Visitor Manager simplifies the registration process by allowing visitors
                                        to pre-register online or onsite through kiosks. The system captures essential
                                        information, ensuring all security protocols are met before granting access.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span>02</span> What technologies are utilized to ensure real-time tracking of
                                    visitors?
                                </h3>
                                <div class="faq-content">
                                    <p>Our system incorporates advanced real-time tracking technologies that monitor
                                        visitor movements, manage access permissions, and maintain detailed logs of all
                                        entries and exits. These capabilities ensure that the campus remains secure
                                        while providing data-driven insights for continuous improvement.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span>03</span> How does the Visitor Management System improve visitor experience?
                                </h3>
                                <div class="faq-content">
                                    <p>The IUB Visitor Manager is designed with the user experience in mind. From easy
                                        navigation on our digital platforms to quick processing at entry points, every
                                        aspect of the visitor journey is optimized. Features such as instant
                                        notifications, digital passes, and streamlined check-ins contribute to a
                                        hassle-free visit.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div>

                    <div class="col-lg-5 order-1 order-lg-2 why-us-img">
                        <img src="{{ asset('client/assets/img/campuses.jpg') }}" class="img-fluid" alt=""
                            data-aos="zoom-in" data-aos-delay="100">
                    </div>
                </div>

            </div>

        </section><!-- /Why Us Section -->

        <!-- Skills Section -->
        <section id="skills" class="skills section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">

                    <div class="col-lg-6 d-flex align-items-center">
                        <img src="{{ asset('client/assets/img/eff.webp') }}" class="img-fluid" alt=""
                            style="height:500px">
                    </div>

                    <div class="col-lg-6 pt-4 pt-lg-0 content">

                        <h3>Maximizing Efficiency and Security with the IUB Visitor Management System</h3>
                        <p class="fst-italic">
                            Our Visitor Management System at The Islamia University of Bahawalpur is crafted with the
                            highest standards of technology to provide unmatched efficiency and enhanced security on
                            campus. Here’s a breakdown of our system’s capabilities:
                        </p>

                        <div class="skills-content skills-animation">

                            <div class="progress">
                                <span class="skill"><span>System Integration</span> <i class="val">100%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div><!-- End Skills Item -->

                            <div class="progress">
                                <span class="skill"><span>User Interface Design</span> <i
                                        class="val">90%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div><!-- End Skills Item -->

                            <div class="progress">
                                <span class="skill"><span>Functionality</span> <i class="val">75%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div><!-- End Skills Item -->

                            <div class="progress">
                                <span class="skill"><span>Digital Documentation Processing</span> <i
                                        class="val">55%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="55"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div><!-- End Skills Item -->

                        </div>

                    </div>
                </div>

            </div>

        </section><!-- /Skills Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Events</h2>
                <p>Stay informed about upcoming events at The Islamia University of Bahawalpur with our Visitor
                    Management System's real-time event listing feature.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row">

                    @foreach ($events as $event)
                        <div class="col-xl-4 col-md-6 mb-4 text-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <div><img src="/storage/{{ $event->brochure }}" alt=""
                                        style="width: 300px; height:200px"></div>
                                <h4>{{ $event->title }}
                                </h4>
                                <p class="text-primary"><i class="fa-solid fa-clock me-2"></i><span
                                        class="me-5">{{ $event->timing }}</span>
                                    <i
                                        class="fa-sharp fa-solid fa-building me-2"></i><span>{{ $event->depart->name }}</span>
                                </p>
                                <p><strong class="me-2">Venue:</strong>{{ $event->venue }}</p>
                                <a href="{{ route('event.eventRegisteration', [$event->id]) }}"
                                    class="btn btn-primary rounded-pill mt-4">Apply for Event</a>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach


                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section">

            <video autoplay muted loop>
                <source src="{{ asset('client/assets/img/main.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <div class="container">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-9 text-center text-xl-start">
                        <h3>Get Started with the IUB Visitor Management System Today</h3>
                        <p>Enhance your campus experience by leveraging the power of the IUB Visitor Management System.
                            Register now to simplify visitor entries, ensure robust security, and stay updated with
                            campus events. Don’t miss out on the convenience and safety that our system offers.</p>
                    </div>
                    <div class="col-xl-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="{{route('visitor.create')}}">Book your visit now</a>
                    </div>
                </div>

            </div>

        </section><!-- /Call To Action Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Campuses</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                    data-sort="original-order">

                    {{-- <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-product">Card</li>
                        <li data-filter=".filter-branding">Web</li>
                    </ul><!-- End Portfolio Filters --> --}}

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('client/assets/img/abbasia.png') }}" class="img-fluid" alt=""
                                style="height: 250px">
                            <div class="portfolio-info">
                                <h4>Abbasia Campus</h4>
                                <p>Historic educational site in central Bahawalpur.</p>
                                <a href="{{ asset('client/assets/img/abbasia.png') }}" title="Abbasia Campus"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link "><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="{{ asset('client/assets/img/features.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Baghdad-ul-Jadeed Campus</h4>
                                <p>Main campus with extensive facilities on Hasilpur Road.</p>
                                <a href="{{ asset('client/assets/img/features.jpg') }}"
                                    title="Baghdad-ul-Jadeed Campus" data-gallery="portfolio-gallery-product"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="{{ asset('client/assets/img/bwn.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Bahawalnagar Campus</h4>
                                <p>Serves the eastern Bahawalpur Division, emphasizing agriculture.</p>
                                <a href="{{ asset('client/assets/img/bwn.jpg') }}" title="Bahawalnagar Campus"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('client/assets/img/khawaja.jpg') }}" class="img-fluid" alt=""
                                style="height: 250px">
                            <div class="portfolio-info">
                                <h4>Khawaja Fareed Campus</h4>
                                <p>Focuses on engineering and technology.</p>
                                <a href="{{ asset('client/assets/img/khawaja.jpg') }}" title="Khawaja Fareed Campus"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="{{ asset('client/assets/img/railway.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Rahim Yar Khan Campus</h4>
                                <p>Caters to the western region with a variety of disciplines.</p>
                                <a href="{{ asset('client/assets/img/railway.jpg') }}" title="Rahim Yar Khan Campus"
                                    data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->



                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->

        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Our Sercurity members</h2>
                <p>Meet our dedicated security team, expertly trained professionals equipped with advanced technology to
                    ensure a safe and secure campus environment at The Islamia University of Bahawalpur.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row">
                    @foreach ($employees as $employee)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member d-flex align-items-start">
                                <div class="pic"><img src="/storage/{{ $employee->image }}" class="img-fluid"
                                        alt="" style="width:200px;height:150px"></div>
                                <div class="member-info">
                                    <h4>{{ $employee->name }}</h4>
                                    <span>Security Officer</span>
                                    <p>{{ $employee->email }}</p>
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter-x"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""> <i class="bi bi-linkedin"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Team Member -->
                    @endforeach




                </div>

            </div>

        </section><!-- /Team Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>Read how our IUB Visitor Management System is transforming campus safety and efficiency, straight
                    from our users.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                    <div class="swiper-wrapper">
                        @foreach ($testmonials as $testmonial)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="storage/{{ $testmonial->image }}" class="testimonial-img"
                                        alt="" style="width: 300px; height:300px">
                                    <h3>{{ $testmonial->name }}</h3>
                                    <h4>{{ $testmonial->designation }}</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>{{ $testmonial->desc }}</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- Faq 2 Section -->
        <section id="faq-2" class="faq-2 section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Frequently Asked Questions</h2>

            </div><!-- End Section Title -->

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="faq-container">

                            <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>How do I register as a visitor in the IUB Visitor Management System?</h3>
                                <div class="faq-content">
                                    <p>Visitors can register by accessing the online portal or using the registration
                                        kiosk at the campus entrance. You'll need to provide some basic personal
                                        information and the purpose of your visit.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>What are the requirements for visitor identification?</h3>
                                <div class="faq-content">
                                    <p>All visitors must present a valid government-issued ID at the registration desk.
                                        The system will capture details such as your name, photo, and ID number.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Can I schedule my visit in advance?</h3>
                                <div class="faq-content">
                                    <p>Yes, the system allows for advance scheduling. You can book your visit through
                                        the IUB Visitor Management System's web portal by selecting your preferred date
                                        and time.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>What happens if I forget to check out on the system after my visit?</h3>
                                <div class="faq-content">
                                    <p>If you forget to check out, the system will automatically check you out at the
                                        closing time of the campus. However, for security reasons, it's important to
                                        manually check out whenever possible.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Are there any restrictions on the areas I can visit within the campus?</h3>
                                <div class="faq-content">
                                    <p>Yes, visitors can only access areas that are relevant to the purpose of their
                                        visit. Access restrictions are enforced through the visitor badges that must be
                                        worn at all times.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /Faq 2 Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>For any inquiries regarding the IUB Visitor Management System, feel free to reach out. Our team is
                    dedicated to ensuring a seamless and secure visit experience and is available to address any
                    questions or concerns you may have.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">

                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Address</h3>
                                    <p>Rabia Hall Rd,Punjab، Bahawalpur, Punjab 63100</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Call Us</h3>
                                    <p>(062) 9250235</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Us</h3>
                                    <p>info@iub.edu.pk</p>
                                </div>
                            </div><!-- End Info Item -->

                            <iframe
                                src="https://www.google.com/maps/place/The+Islamia+University+of+Bahawalpur/@29.3935227,71.6890259,16z/data=!4m20!1m13!4m12!1m4!2m2!1d71.6996608!2d29.392896!4e1!1m6!1m2!1s0x393b90c01e9e6953:0x5892bbb535403548!2siub+address!2m2!1d71.6908067!2d29.398084!3m5!1s0x393b90c01e9e6953:0x5892bbb535403548!8m2!3d29.398084!4d71.6908067!16zL20vMDV2ZjI2?entry=ttu"
                                frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Your Name</label>
                                    <input type="text" name="name" id="name-field" class="form-control"
                                        required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email-field"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Message</label>
                                    <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-6">
                        <h4>Join Our Newsletter</h4>
                        <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                        <form action="forms/newsletter.php" method="post" class="php-email-form">
                            <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                                    value="Subscribe"></div>
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">VMS</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Rabia Hall Rd,</p>
                        <p>NPunjab، Bahawalpur, Punjab 63100</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>(062) 9250235</span></p>
                        <p><strong>Email:</strong> <span>info@iub.edu.pk</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#hero">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#about">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#services">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#team">Team</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Campus Security</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Visitor Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Event Sponsering</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">User friendly Interface</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>Stay connected with Islamia University of Bahawalpur! Follow us on:</p>
                    <div class="social-links d-flex">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">VMS</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                Designed by Khadija Perveen</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('client/assets/js/main.js') }}"></script>

</body>

</html>
