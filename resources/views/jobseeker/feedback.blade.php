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
    <title>Feedback</title>
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


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
 <!-- breadcrumb -->
 <section class="w3l-feedback-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-feedback">
        <div class="container py-lg-5 py-sm-4">
            <div class="w3breadcrumb-gids text-center">
                <div class="w3breadcrumb-info mt-5">
                    <h2 class="w3ltop-title pt-4">Feedback</h2>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="/">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//breadcrumb-->

    
<div class="container my-5">
    <h2 class="text-center mt-5 mb-4" >We Value Your Feedback!</h2>
        
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            
            <!-- Star Rating -->
            <div class="mb-3">
                <label class="form-label fw-bold">Rate Your Experience</label>
                <div class="star-rating">
                    <input type="radio" name="rating" value="5" id="star5"><label for="star5">★</label>
                    <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
                    <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
                    <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
                    <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
                </div>
            </div>

            <!-- Message Field -->
            <div class="mb-3">
                <label class="form-label fw-bold">Your Thoughts</label>
                <textarea class="form-control rounded-3 shadow-sm" name="message" rows="4" placeholder="Write your feedback here..." required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Submit Feedback</button>
            </div>
        </form>
</div>



    <!-- footer -->
    @include('jobseeker.common.footer')
    <!-- //footer -->
    <!-- Js scripts -->
    <!-- Template JavaScript -->
    <script src="{{asset('user/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('user/assets/js/theme-change.js')}}"></script>
     <script src="{{asset('user/assets/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>

</body>

</html>