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
<div>

 <!-- breadcrumb -->
 <section class="w3l-login-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-login">
        <div class="container py-lg-5 py-sm-4">
            <div class="w3breadcrumb-gids text-center">
                <div class="w3breadcrumb-info mt-5">
                    <h2 class="w3ltop-title pt-4">Login</h2>
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
    <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-6" style="font-size: 30px">
        <b>{{ __('Login') }}</b>
    </h2>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Field -->
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
      @if ($errors->has('email'))
        <div class="text-danger">{{ $errors->get('email') }}</div>
    @endif
    </div>

    <!-- Password Field -->
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
      @if ($errors->has('password'))
        <div class="text-danger">{{ $errors->get('password') }}</div>
    @endif
    </div>

    <!-- Button -->
    <div class="flex items-center mt-6">
        <a class="text-sm text-indigo-600 hover:underline" href="{{ route('register') }}">
            {{ __('New to TalentHunt?') }}
        </a>
        <button type="submit" class="btn btn-primary text-end">Login</button>

    </div>
</form>

</div>
</div>
    <!-- footer -->
    @include('jobseeker.common.footer')
    <!-- //footer -->

    <!-- Template JavaScript -->
    <script src="{{asset('jobseeker/user/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('jobseeker/user/assets/js/theme-change.js')}}"></script>
    <script src="{{asset('jobseeker/user/assets/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('jobseeker/user/assets/js/bootstrap.min.js')}}"></script>

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

</body>

</html>