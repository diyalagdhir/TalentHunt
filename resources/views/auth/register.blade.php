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
<section class="w3l-login-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-login">
        <div class="container py-lg-5 py-sm-4">
            <div class="w3breadcrumb-gids text-center">
                <div class="w3breadcrumb-info mt-5">
                    <ul class="breadcrumbs-custom-path">
                        <h2 class="w3ltop-title pt-4">Register</h2>
                        <li><a href="index.html">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div>

    <div class="container my-4">
    <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-6" style="font-size: 30px">
        <b>{{ __('Register Yourself') }}</b>
    </h2>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name Field -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email Field -->
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
      @error('email')
    <div class="text-danger">{{ $message }}</div>
@enderror
    </div>

    <!-- Password Field -->
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
      @error('password')
      <div class="text-danger">{{ $message }}</div>
  @enderror
    </div>

    <!-- Confirm password Field -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        @error('password_confirmation')
    <div class="text-danger">{{ $message }}</div>
@enderror
    </div>

    <!-- Role Dropdown -->
<div class="mb-3">
    <label for="role_id" class="form-label">Register as</label>
    <select id="role_id" name="role_id" class="form-control" required>
        <option value="">-- Select Role --</option>
        <option value="1">Job Seeker</option>
        <option value="2">Recruiter</option>
        @error('role_id')
    <div class="text-danger">{{ $message }}</div>
@enderror
    </select>
</div>


    <!-- Button -->
    <div class="flex items-center justify-between mt-6">
        <a class="text-sm text-indigo-600 hover:underline" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>        
        <button type="submit" class="btn btn-primary">Register</button><br>

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