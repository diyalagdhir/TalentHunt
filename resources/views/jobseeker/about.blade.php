<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TalentHunt - About Us</title>
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('jobseeker/user/assets/css/style-starter.css')}}">
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
    
    <section class="w3l-feature-with-photo-1">
        <div class="feature-with-photo-hny py-5">
            <div class="container py-lg-5">
                <div class="feature-with-photo-content">
                    <div class="row mb-lg-5 mb-3">
                        <div class="col-lg-7 ab-right pl-lg-5">
                            <h6 class="title-subhny mb-2"><span>About TalentHunt</span></h6>
                            <h3 class="title-w3l mb-4">Connecting Job Seekers with Top Employers</h3>
                            <p class="mt-4">TalentHunt is dedicated to bridging the gap between talented job seekers and leading employers. Our platform provides a seamless experience for individuals looking for their dream job and companies searching for the right talent. With our cutting-edge technology and industry insights, we simplify the hiring process for everyone.</p>
                            <div class="w3l-buttons mt-sm-5 mt-4">
                                <a class="btn btn-primary btn-style me-2" href="{{ route('available_jobs') }}">Find Jobs</a>
                                <a class="btn btn-outline-primary btn-style" href="{{ route('available_jobs') }}">Hire Talent</a>
                            </div>
                        </div>
                        <div class="col-lg-5 ab-left ps-lg-5">
                            <img src="jobseeker/user/assets/images/ab1.jpg" class="img-fluid radius-image" alt="About Us">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="w3l-servicesblock w3l-servicesblock1 py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="row">
                <div class="col-lg-6 mb-lg-0 mb-5 pe-lg-5">
                    <h6 class="title-subhny mb-2">Our Mission</h6>
                    <h3 class="title-w3l">Empowering Careers, Enabling Businesses</h3>
                    <p class="mt-md-4 mt-3">Our mission is to create opportunities for professionals by offering an intuitive and dynamic job portal that meets the evolving demands of the job market. We strive to make recruitment efficient, transparent, and accessible for both job seekers and employers.</p>
                </div>
                <div class="col-lg-6 align-self pe-lg-4">
                    <div class="progress-info">
                        <h6 class="progress-tittle">Successful Placements <span>85%</span></h6>
                        <div class="progress">
                            <div class="progress-bar" style="width:85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress-info">
                        <h6 class="progress-tittle">Employer Satisfaction <span>90%</span></h6>
                        <div class="progress">
                            <div class="progress-bar" style="width:90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="w3l-team-main py-5" id="team">
        <div class="container py-md-5 py-3">
            <div class="header-secw3 text-center">
                <h6 class="title-subhny mb-2">Meet Our Team</h6>
                <h3 class="title-w3l mb-3">The TalentHunt Experts</h3>
            </div>
            <div class="row w3ls_team_grids text-center">
                <div class="col-md-3 col-6 w3_agile_team_grid mt-md-5 mt-4">
                    <img src="jobseeker/user/assets/images/team1.jpg" class="img-fluid radius-image" alt="Team Member">
                    <h4>John Doe</h4>
                    <p>CEO & Founder</p>
                </div>
                <div class="col-md-3 col-6 w3_agile_team_grid mt-md-5 mt-4">
                    <img src="jobseeker/user/assets/images/team2.jpg" class="img-fluid radius-image" alt="Team Member">
                    <h4>Jane Smith</h4>
                    <p>Head of Recruitment</p>
                </div>
                <div class="col-md-3 col-6 w3_agile_team_grid mt-md-5 mt-4">
                    <img src="jobseeker/user/assets/images/team3.jpg" class="img-fluid radius-image" alt="Team Member">
                    <h4>Robert Brown</h4>
                    <p>HR Consultant</p>
                </div>
                <div class="col-md-3 col-6 w3_agile_team_grid mt-md-5 mt-4">
                    <img src="jobseeker/user/assets/images/team4.jpg" class="img-fluid radius-image" alt="Team Member">
                    <h4>Emily Wilson</h4>
                    <p>Tech Lead</p>
                </div>
            </div>
        </div>
    </div>
    
    <section class="w3l-project-main">
        <div class="container">
            <div class="w3l-project py-md-5 py-4">
                <div class="row py-5 align-items-center">
                    <div class="col-lg-8 w3l-project-right">
                        <h3 class="title-w3l">Looking for a Job or Hiring Talent?</h3>
                    </div>
                    <div class="col-lg-4 w3l-project-left">
                        <div class="w3l-buttons d-sm-flex">
                            <a class="btn btn-primary btn-style me-2" href="{{ route('register') }}">Sign Up</a>
                            <a class="btn btn-outline-primary btn-style" href="{{ route('contact') }}">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @include('jobseeker.common.footer')

 <!-- Template JavaScript -->
 <script src="{{asset('jobseeker/user/assets/js/jquery-3.3.1.min.js')}}"></script>
 <script src="{{asset('jobseeker/user/assets/js/theme-change.js')}}"></script>
  <script src="{{asset('jobseeker/user/assets/js/jquery-1.9.1.min.js')}}"></script>

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