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
    <title>TalentHunt - Contact Us</title>
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

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

        <!-- breadcrumb -->
        <section class="w3l-contact-breadcrumb">
            <div class="breadcrumb-bg breadcrumb-bg-contact">
                <div class="container py-lg-5 py-sm-4">
                    <div class="w3breadcrumb-gids text-center">
                        <div class="w3breadcrumb-info mt-5">
                            <h2 class="w3ltop-title pt-4">Contact Us</h2>
                            <ul class="breadcrumbs-custom-path">
                                <li><a href="/">Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--//breadcrumb-->


<div class="container my-4">
    <h2 class="text-center mt-5 mb-2" >Get in Touch with Us</h2>
    <p class="text-center text-muted mb-4">
        Feel free to reach out to us with any questions or inquiries. Our team is here to help and will get back to you as soon as possible.
    </p>
        <form method="POST" action="{{ route('contact.store') }}">
            @csrf

            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Your Name</label>
                <input type="text" class="form-control rounded-3 shadow-sm" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email Address</label>
                <input type="email" class="form-control rounded-3 shadow-sm" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Contact Field -->
            <div class="mb-3">
                <label for="contact" class="form-label fw-bold">Phone Number</label>
                <input type="text" class="form-control rounded-3 shadow-sm" id="contact" name="contact" value="{{ old('contact') }}" required>
                @error('contact')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Message Field -->
            <div class="mb-3">
                <label for="message" class="form-label fw-bold">Your Message</label>
                <textarea class="form-control rounded-3 shadow-sm" id="message" name="message" rows="4" placeholder="Write your message here..." required></textarea>
                @error('message')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Send Message</button>
            </div>
        </form>
</div>



    <!-- footer -->
    @include('jobseeker.common.footer')
    <!-- //footer -->
    <!-- Js scripts -->
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