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
    <title>My Jobs</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    

</head>

<body>
    <!--/Header-->
   @include('jobseeker.common.header')
    <!--//Header-->

    <!-- breadcrumb -->
    <section class="w3l-about-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about">
            <div class="container py-lg-5 py-sm-4">
                <div class="w3breadcrumb-gids text-center">
                    <div class="w3breadcrumb-info mt-5">
                        <h2 class="w3ltop-title pt-4">My Jobs</h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="/">Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//breadcrumb-->

<h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white mt-4 mb-6">Explore Career Opportunities</h1>
<p class="text-center">Discover a wide range of job openings and find the perfect position for you on our platform today!</p>

<div class="container my-5">
    <table class="table mt-4 w-full">
        <thead>
            <tr>
                <th class="text-left p-2">Application ID</th>
                <th class="text-left p-2">Application Title</th>
                <th class="text-left p-2">Application Description</th>
                <th class="text-left p-2">Application Cover Message</th>
                <th class="text-left p-2">Application Status</th>
                <th class="text-left p-2">Application Experience</th>
                <th class="text-left p-2">Application Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appliedJobs as $job)
            <tr>
                <td class="p-2 text-center">{{ $loop->iteration }}</td>
                <td class="p-2">{{ $job->title }}</td>
                <td class="p-2">{{ $job->description }}</td>
                <td class="p-2">{{ $job->message }}</td>
                <td class="p-2">{{ $job->application_status }}</td>
                <td class="p-2">{{ $job->experience }}</td>
                <td class="p-2">{{ $job->application_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

        {{-- Pagination Links --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $appliedJobs->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
        </div>

</div>

<!-- footer -->
@include('jobseeker.common.footer')
<!-- //footer -->

<!-- Js scripts -->
<!-- Template JavaScript -->
<script src="{{ asset('user/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('user/assets/js/theme-change.js') }}"></script>
<!--/Tabs-->
<script src="{{ asset('user/assets/js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('user/assets/js/easyResponsiveTabs.js') }}"></script>
<script src="{{ asset('user/assets/js/bootstrap.min.js') }}"></script>

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