<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TalentHunt</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('jobseeker/user/assets/css/style-starter.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    <!--/Header-->
   @include('jobseeker.common.header')
    <!--//Header-->
    <section class="w3l-main-content" id="home">
        <div class="container">
            <div class="row align-items-center w3l-slider-grids">
                <div class="col-lg-6 w3l-slider-left-info pe-lg-5">
                    <h6 class="title-subhny mb-2">Find Your Dream Job</h6>
                    <h3 class="mb-2 title"> <span>Your</span> Career </h3>
                    <h3 class="mb-4 title">Starts Here</h3>
                    <p class="w3banr-p">Explore top job opportunities that match your skills and ambitions. Connect with recruiters and take your career to new heights.</p>
                    <div class="w3l-buttons mt-sm-5 mt-4">
                        <a class="btn btn-primary btn-style me-2" 
                            href="{{ auth()->check() ? route('available_jobs') : route('register') }}">
                            Find Jobs
                        </a>
                     <a class="btn btn-outline-primary btn-style" href="{{ route('register') }}">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 w3l-slider-right-info mt-lg-0 mt-5 ps-lg-5 align-items-center">
                    <div class="w3l-main-slider banner-slider">
                        <div class="slider-info">
                            <div class="w3l-slidehny-img banner-top1">
                                <img src="jobseeker/user/assets/images/banner1.jpg" alt="" class="radius-image img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- /job categories -->
    <section class="w3l-grids-3 py-5">
        <div class="container py-md-5 py-3">
            <div class="row align-items-center">
                <div class="col-lg-6 header-sec">
                    <h6 class="title-subhny mb-2">Explore Opportunities</h6>
                    <h3 class="title-w3l">
                        Find the right job that fits your skills.
                    </h3>
                </div>
                <div class="col-lg-6 header-sec-paraw3 ps-lg-4">
                    <p class="">Browse through thousands of job listings across various industries. Apply with a single click and get hired by top employers.</p>
                </div>
            </div>
            <div class="row bottom_grids text-left mt-lg-5 align-items-center">
                <div class="col-lg-4 col-md-6 mt-5">
                    <div class="grid-block">
                        <a href="recruiters.html" class="d-block">
                            <div class="grid-block-infw3">
                                <div class="grid-block-icon"><span class="fas fa-users"></span></div>
                                <h4 class="my-3">Top Recruiters</h4>
                            </div>
                            <p class="">Connect with leading companies looking for talented professionals like you.</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5">
                    <div class="grid-block active">
                        <a href="resume_builder.html" class="d-block">
                            <div class="grid-block-infw3">
                                <div class="grid-block-icon"><span class="far fa-file-alt"></span></div>
                                <h4 class="my-3">Resume Builder</h4>
                            </div>
                            <p class="">Create a professional resume that stands out and increases your chances of getting hired.</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5">
                    <div class="grid-block">
                        <a href="career_tips.html" class="d-block">
                            <div class="grid-block-infw3">
                                <div class="grid-block-icon"><span class="fas fa-lightbulb"></span></div>
                                <h4 class="my-3">Career Advice</h4>
                            </div>
                            <p class="">Get expert tips on job searching, interviews, and career growth.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--/circles-section-->
<section class="w3l-circles-sec" id="circle">
    <div class="midd-w3 py-5">
        <div class="container py-lg-5 py-3">
            <!--/row-2-->
            <div class="w3l-circles">
                <div class="w3l-circles-infhny">
                    <div class="title-content text-left">
                        <h6 class="title-subhny mb-2">Unlock Your Potential</h6>
                        <h3 class="title-w3l two">Find Your Dream Job Today</h3>
                    </div>
                    <p class="mt-md-4 mt-3">
                        Discover top career opportunities in various industries. Connect with top employers, apply for jobs that match your skills, and take the next step in your professional journey.
                    </p>
                </div>
            </div>
            <!--//row-2-->
        </div>
    </div>
</section>
<!--//circles-section-->

<!--/img-grids - Featured Job Categories-->
<section class="w3l-img-grids" id="gridsimg">
    <div class="blog py-5" id="classes">
        <div class="container py-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 item mt-lg-0 mt-5">
                    <div class="w3img-grids-info">
                        <div class="w3img-grids-info-gd position-relative">
                            <a href="{{ route('available_jobs', ['category' => 'IT']) }}">
                                <div class="page">
                                    <div class="photobox photobox_triangular photobox_scale-rotated">
                                        <div class="photobox__previewbox media-placeholder">
                                            <img class="img-fluid photobox__preview media-placeholder__media radius-image" 
                                                 src="jobseeker/user/assets/images/g1.jpg" alt="">
                                        </div>
                                        <div class="photobox__info-wrapper">
                                            <div class="photobox__info"><span>IT & Software</span></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="w3img-grids-info-gd-content mt-4">
                                <a href="{{ route('available_jobs', ['category' => 'IT']) }}" class="titile-img d-block">
                                    <h4 class="mb-2">Tech & IT Jobs</h4>
                                </a>
                                <p>Find jobs in web development, software engineering, data analysis, and more.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 item mt-lg-0 mt-5">
                    <div class="w3img-grids-info">
                        <div class="w3img-grids-info-gd position-relative">
                            <a href="{{ route('available_jobs', ['category' => 'Marketing']) }}">
                                <div class="page">
                                    <div class="photobox photobox_triangular photobox_scale-rotated">
                                        <div class="photobox__previewbox media-placeholder">
                                            <img class="img-fluid photobox__preview media-placeholder__media radius-image" 
                                                 src="jobseeker/user/assets/images/g2.jpg" alt="">
                                        </div>
                                        <div class="photobox__info-wrapper">
                                            <div class="photobox__info"><span>Marketing</span></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="w3img-grids-info-gd-content mt-4">
                                <a href="{{ route('available_jobs', ['category' => 'Marketing']) }}" class="titile-img d-block">
                                    <h4 class="mb-2">Marketing & Sales Jobs</h4>
                                </a>
                                <p>Discover opportunities in digital marketing, content creation, sales, and advertising.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 item mt-lg-0 mt-5">
                    <div class="w3img-grids-info">
                        <div class="w3img-grids-info-gd position-relative">
                            <a href="{{ route('available_jobs', ['category' => 'Finance']) }}">
                                <div class="page">
                                    <div class="photobox photobox_triangular photobox_scale-rotated">
                                        <div class="photobox__previewbox media-placeholder">
                                            <img class="img-fluid photobox__preview media-placeholder__media radius-image" 
                                                 src="jobseeker/user/assets/images/g3.jpg" alt="">
                                        </div>
                                        <div class="photobox__info-wrapper">
                                            <div class="photobox__info"><span>Finance & Banking</span></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="w3img-grids-info-gd-content mt-4">
                                <a href="{{ route('available_jobs', ['category' => 'Finance']) }}" class="titile-img d-block">
                                    <h4 class="mb-2">Finance & Accounting Jobs</h4>
                                </a>
                                <p>Find roles in accounting, banking, financial planning, and investment sectors.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//img-grids - Featured Job Categories-->

<!--/video-section-->
<section class="w3l-video" id="video">
    <div class="video-mid-w3 py-5">
        <div class="container py-md-5 py-3">
            <!--/row-1-->
            <div class="row">
                <div class="col-lg-6 mt-lg-0 mb-5 align-self pe-lg-3">
                    <div class="title-content text-left">
                        <h6 class="title-subhny mb-2">Accelerate Your Career</h6>
                        <h3 class="title-w3l two">Find Your Dream Job Faster</h3>
                    </div>
                    <p class="mt-md-4 mt-3">
                        Looking for the perfect job? Our platform connects you with top recruiters and exciting job opportunities. 
                        Upload your resume, apply for jobs, and take the next step in your career with ease.
                    </p>
                    <div class="w3l-two-buttons mt-4">
                        <a class="btn btn-primary btn-style me-2" 
                            href="{{ auth()->check() ? route('available_jobs') : route('register') }}">
                            Browse Jobs
                        </a>
                        <a class="btn btn-primary btn-style me-2" 
                            href="{{ route('about') }}">
                            About Us
                        </a>                    </div>
                </div>
                <div class="col-lg-6 videow3-right ps-lg-5">
                    <div class="w3l-index5 py-5">
                        <div class="history-info align-self text-center py-5 my-lg-5">
                            <div class="position-relative py-5">
                                <a href="#small-dialog1" class="popup-with-zoom-anim play-view text-center position-absolute">
                                    <span class="video-play-icon">
                                        <span class="fa fa-play"></span>
                                    </span>
                                </a>
                                <!-- Video Popup -->
                                <div id="small-dialog1" class="zoom-anim-dialog mfp-hide">
                                    <iframe src="https://www.youtube.com/embed/Tz0aH2JadqE" frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""></iframe>
                                </div>
                                <!-- Video Popup -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--//row-1-->
        </div>
    </div>
</section>
<!--//video-section-->

<!--/tabs-faqs-->
<section class="w3l-products w3l-faq-block py-5" id="projects">
    <div class="container py-md-5 py-2">
        <div class="header-secw3 text-center mb-5">
            <h6 class="title-subhny mb-2">FAQs</h6>
            <h3 class="title-w3l mb-4">Frequently Asked Questions</h3>
        </div>
        <div class="row">
            <div class="col-lg-6 mx-auto pe-lg-5">
                <div class="w3hny-business-img">
                    <img src="jobseeker/user/assets/images/g8.jpg" alt="Job Search" class="img-fluid radius-image">
                </div>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-sm-5 mt-4">
                <div class="accordion">
                    <div class="accordion-item">
                        <button id="accordion-button-1" aria-expanded="true">
                            <span class="accordion-title">How do I apply for jobs?</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                You can browse jobs in the "Available Jobs" section. Click on a job listing to view details and apply directly through our portal.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-2" aria-expanded="false">
                            <span class="accordion-title">How can I improve my resume?</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                Make sure your resume is up-to-date with relevant skills, experience, and education. Use a clean format and include a professional summary.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-3" aria-expanded="false">
                            <span class="accordion-title">Are the recruiters verified?</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                Yes, we verify all recruiters to ensure authenticity and credibility, providing a safe job search experience for applicants.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-4" aria-expanded="false">
                            <span class="accordion-title">What should I do after applying?</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>
                                After applying, monitor your application status under "My Jobs." You can also follow up with recruiters if needed.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//tabs-faqs-->

<!-- Testimonials Section -->
<section class="w3l-clients" id="clients">
    <div class="cusrtomer-layout py-5">
        <div class="container py-lg-5 py-md-3">
            <div class="testimonial-width">
                <div class="item">
                    <div class="testimonial-content">
                        <div class="testimonial">
                            <blockquote>
                                <i class="fas fa-quote-left"></i>
                                <q> This platform helped me land my dream job within weeks! The application process was smooth, and I connected with top recruiters easily.</q>
                            </blockquote>
                            <div class="testi-des">
                                <div class="peopl align-self">
                                    <h3>Sarah Thompson</h3>
                                    <p class="indentity">Marketing Specialist, New York</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</section>
<!-- //Testimonials Section -->

<!-- Newsletter Subscription Section -->
{{-- <section class="w3l-project-main">
    <div class="container">
        <div class="w3l-project py-md-5 py-4">
            <div class="row py-5 align-items-center">
                <div class="col-lg-6 w3l-project-right">
                    <div class="bottom-info">
                        <div class="header-section pr-lg-5">
                            <h6 class="title-subhny mb-2">Stay Updated!</h6>
                            <h3 class="title-w3l">Subscribe for Job Alerts & Career Tips</h3>
                            <p class="mt-3">Be the first to know about new job openings, hiring trends, and expert career advice.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 w3l-project-left">
                    <form action="{{ route('contact') }}" method="post" class="subscribe-wthree mt-lg-5 mt-4">
                        @csrf
                        <div class="flex-wrap subscribe-wthree-field">
                            <input class="form-control" type="email" placeholder="Enter Your Email" name="email" required>
                            <button class="btn btn-style btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- //Newsletter Subscription Section -->   


    <!--//w3l-project-->
    <!-- footer -->
    @include('jobseeker.common.footer')
    <!-- //footer -->
    <!-- Js scripts -->
    <!-- Template JavaScript -->
    <script src="{{asset('jobseeker/user/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('jobseeker/user/assets/js/theme-change.js')}}"></script>
     <script src="{{asset('jobseeker/user/assets/js/jquery-1.9.1.min.js')}}"></script>
    <script>
        const items = document.querySelectorAll(".accordion button");

        function toggleAccordion() {
            const itemToggle = this.getAttribute('aria-expanded');

            for (i = 0; i < items.length; i++) {
                items[i].setAttribute('aria-expanded', 'false');
            }

            if (itemToggle == 'false') {
                this.setAttribute('aria-expanded', 'true');
            }
        }

        items.forEach(item => item.addEventListener('click', toggleAccordion));

    </script>
    <!-- //faq -->
    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });

    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });

    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!-- //bootstrap -->
    <script src="{{asset('jobseeker/user/assets/js/bootstrap.min.js')}}"></script>

</body>

</html>
