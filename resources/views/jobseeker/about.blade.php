<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>About Us</title>
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    @include('jobseeker.common.header')
    
    <section class="w3l-about-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about">
            <div class="container py-lg-5 py-sm-4">
                <div class="w3breadcrumb-gids text-center">
                    <div class="w3breadcrumb-info mt-5">
                        <h2 class="w3ltop-title pt-4">About Us</h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="/">Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<!-- About Section -->
<section class="w3l-about py-5">
    <div class="container py-md-5 py-4">
        <div class="row">
            <div class="col-lg-6 ab-left ps-lg-5">
                <img src="{{asset('user/assets/images/g3.jpg')}}" class="img-fluid radius-image" alt="Job Portal">
            </div>
            <div class="col-lg-6 mt-lg-0 mt-5">
                <h3 class="title">Connecting Talent with Opportunities</h3>
                <p class="mt-3">
                    Welcome to <strong>TalentHunt</strong>, your go-to job portal dedicated to bridging the gap between job seekers and recruiters. We aim to simplify job searching and hiring, making the process seamless, efficient, and rewarding.
                </p>
                <p class="mt-2">
                    Whether you're looking for your dream job or searching for the perfect candidate, TalentHunt provides the platform to help you succeed. Join us today and take the next step in your career journey.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="w3l-feature-with-photo-1">
    <div class="feature-with-photo-hny py-1">
        <div class="container py-lg-5">
            <div class="feature-with-photo-content">
                <div class="ab-in-flow row mb-lg-5 mb-3">
                    <!-- Left Section - About Us Text -->
                    <div class="col-lg-7 ab-right pl-lg-5">
                        <h3 class="title-w3l mb-4">Your Gateway to the Best Job Opportunities</h3>
                        <p class="mt-4">At TalentHunt, we connect talented professionals with top employers around the globe. Whether you're looking for your next job or the ideal candidate, we offer a wide range of job listings, career resources, and recruitment services tailored to your needs. Our platform simplifies the job search and application process, empowering job seekers and companies alike.</p>

                        <p>From tech to marketing, healthcare to engineering, we provide access to jobs across various industries. Join thousands of other users who have found their dream jobs with us, or post your job vacancies to attract top talent to your organization.</p>

                        <div class="w3l-buttons mt-sm-5 mt-4">
                            <a class="btn btn-primary btn-style me-2" href="{{ route('about') }}">Learn More About Us</a>
                            <a class="btn btn-outline-primary btn-style mr-2" href="{{ route('available_jobs') }}">Browse Jobs</a>
                        </div>
                    </div>

                    <!-- Right Section - Image -->
                    <div class="col-lg-5 ab-left ps-lg-5">
                        <img src="{{asset('user/assets/images/ab1.jpg')}}" class="img-fluid radius-image" alt="Job Portal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="w3l-feature-with-photo-1">
    <div class="feature-with-photo-hny py-1">
        <div class="container py-lg-5">
            <div class="feature-with-photo-content">
                <div class="ab-in-flow row mb-lg-5 mb-3">
                    
                    <!-- Left Section - Image -->
                    <div class="col-lg-5 ab-left pe-lg-5">
                        <img src="{{asset('user/assets/images/ab2.jpg')}}" class="img-fluid radius-image" alt="Career Growth">
                    </div>

                    <!-- Right Section - About Us Text -->
                    <div class="col-lg-7 ab-right pr-lg-5">
                        <h3 class="title-w3l mb-4">Empowering Careers, Connecting Talent</h3>
                        <p class="mt-4">
                            TalentHunt is your trusted partner in career growth and recruitment success. Our platform is designed to help job seekers find meaningful employment and assist employers in hiring the right talent efficiently. 
                        </p>

                        <p>
                            Whether you're a fresh graduate, an experienced professional, or a company looking to build an exceptional team, we offer a seamless job search and recruitment experience. Explore a variety of industries and find the right opportunities that match your skills and aspirations.
                        </p>

                        <div class="w3l-buttons mt-sm-5 mt-4">
                            <a class="btn btn-primary btn-style me-2" href="{{ route('about') }}">Learn More</a>
                            <a class="btn btn-outline-primary btn-style" href="{{ route('available_jobs') }}">Find Jobs</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Services -->
<section class="w3l-services py-5 bg-light">
    <div class="container py-md-5 py-4">
        <h3 class="title text-center">What We Offer</h3>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="service-box">
                    <i class="fas fa-users icon"></i>
                    <h4>For Job Seekers</h4>
                    <p>Access job opportunities across various industries, apply with ease, and track your applications seamlessly.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-box">
                    <i class="fas fa-briefcase icon"></i>
                    <h4>For Recruiters</h4>
                    <p>Find top talent effortlessly, post job listings, and manage applications with our user-friendly dashboard.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="w3l-features py-5">
    <div class="container py-md-5 py-4">
        <h3 class="title text-center">Why Choose TalentHunt?</h3>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-check-circle"></i>
                    <h4>Easy to Use</h4>
                    <p>Our platform offers a smooth and user-friendly experience for both job seekers and recruiters.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Secure & Reliable</h4>
                    <p>We prioritize your data security and ensure a safe job search and hiring experience.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-headset"></i>
                    <h4>24/7 Support</h4>
                    <p>Our dedicated support team is always ready to assist you whenever you need help.</p>
                </div>
            </div>
        </div>
    </div>
</section>


    
    @include('jobseeker.common.footer')

 <!-- Template JavaScript -->
 <script src="{{asset('user/assets/js/jquery-3.3.1.min.js')}}"></script>
 <script src="{{asset('user/assets/js/theme-change.js')}}"></script>
  <script src="{{asset('user/assets/js/jquery-1.9.1.min.js')}}"></script>

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
    <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>
</body>
</html>