@php 
$count_id = $user_profile->country_id;
$state_id = $user_profile->state_id;
$city_id = $user_profile->city_id;
 
@endphp

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
    <title>Profile</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.1/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.1/dist/js/bootstrap-select.min.js"></script>
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include jQuery (required by Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Keep only this version -->

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> <!-- Correct Select2 version -->

    <!-- Bootstrap JS (optional, depending on the features used) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    

</head>

<body>
    <!--/Header-->
   @include('jobseeker.common.header')
    <!--//Header-->
<!-- breadcrumb -->
<section class="w3l-available-jobs-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-available-jobs">
        <div class="container py-lg-5 py-sm-4">
            <div class="w3breadcrumb-gids text-center">
                <div class="w3breadcrumb-info mt-5">
                    <h2 class="w3ltop-title pt-4">Update Profile</h2>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="/">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="w3l-contact-1 w3hny-form-btm py-3" id="login">
    <div class="contacts-9 py-lg-2 py-md-4">
        <div class="container">
            <div class="header-sec text-center mb-5">
                <h3 class="title-w3l">
                    Elevate your profile by refreshing your details below and let your personality shine through!
                </h3>
            </div>
            <div class="contactct-fm map-content-9">
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
                <form action="{{route('UpdateProfile')}}" class="pt-lg-4" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                    <label for="number" class="form-label">Enter Your Contact Number</label>
                        <input type="number" class="form-control" name="contact" id="contact" placeholder="Enter your contact" value="{{ $user_profile->contact }}" required>
                        @error('contact')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="objective"class="form-label">Enter Your Objective </label>
                        <textarea name="objective" id="objective" class="form-control" placeholder="Enter your objective" required>{{ $user_profile->objective }}</textarea>
                        @error('objective') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="address"class="form-label">Enter Your Address </label>
                        <textarea name="address" id="address" class="form-control" placeholder="Enter your address" required>{{ $user_profile->address }}</textarea>
                        @error('address') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="designation"class="form-label">Enter Your Designation </label>
                        <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter your Designation" value="{{ $user_profile->designation }}" required>
                        @error('designation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                   <!-- Resume Upload Section -->
                    <div class="mb-3">
                        <label for="resume"class="form-label">Upload your resume</label>
                        <input type="file" class="form-control" name="resume" id="resume" placeholder="Enter your resume">
                        @error('resume')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Image Upload Section -->
                    <div class="mb-3">
                        <label for="image"class="form-label">Upload your pic</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter your image">
                        {{-- @if ($user_profile->user_image)
                            <img src="{{asset('user/upload/img/'.$user_profile->user_image)}}" style="height:50px;   ">
                        @else
                            <img src="" id="imagePreview" style="height:50px;" />
                        @endif --}}
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                     <!-- Multi-Select Course Dropdown -->
                    <div class="mb-3">
                    <label for="courses"class="form-label">Enter Your Course </label>
                        <div class="dropdown-wrapper">
                            <select class="form-control selectpicker" name="courses[]" id="courses" multiple>
                                <option value="" disabled selected>-----Select Course-----</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->course_name }}" 
                                            @if(in_array($course->course_name, explode(',', $user_profile->course))) selected @endif>
                                        {{ $course->course_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('courses')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Multi-Select Skill Dropdown -->
                    <div class="mb-3">
                    <label for="skill_id"class="form-label">Enter Your Skill </label>
                        <div class="dropdown-wrapper">
                            <select class="form-control selectpicker" name="skill_id[]" id="skill_id" multiple required>
                                <option value="" disabled selected>-----Select Skill Set-----</option>
                                @foreach($skills as $skill)
                                    <option value="{{ $skill->skill_name }}" 
                                            @if(in_array($skill->skill_name, explode(',', $user_profile->skills))) selected @endif>
                                        {{ $skill->skill_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('skill_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <!-- Country Dropdown -->
                    <div class="mb-3">
                    <label for="count_id"class="form-label">Enter Your Country </label>
                        <div class="dropdown-wrapper">
                            <select class="form-control" name="count_id" id="count_id" required="">
                                <option value="" disabled selected>-----Select a Country-----</option>
                                
                            </select>
                            @error('count_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- State Dropdown -->
                    <div class="mb-3">
                    <label for="state_id"class="form-label">Enter Your State </label>
                        <div class="dropdown-wrapper">
                            <select class="form-control" name="state_id" id="state_id" required>
                                <option value="" disabled selected>-----Select a State-----</option>   
                            </select>
                            @error('state_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- City Dropdown -->
                    <div class="mb-3">
                    <label for="city_id"class="form-label">Enter Your City </label>
                        <div class="dropdown-wrapper">
                            <select class="form-control" name="city_id" id="city_id" required="">
                                <option value="" disabled selected>-----Select a City-----</option>
                                
                            </select>
                            @error('city_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                   

                    <div class="text-lg-center">
                        <!-- Submit Button -->
                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-style mt-lg-5 mt-4">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<!-- footer -->
@include('jobseeker.common.footer')
<!-- //footer -->
 <!-- Js scripts -->
 <script src="{{asset('user/assets/js/jquery-3.3.1.min.js')}}"></script>
 <script src="{{asset('user/assets/js/theme-change.js')}}"></script>
 <!-- Template JavaScript -->
 <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
 <script type="text/javascript">
$(document).ready(function() {
    var CountryId = "{{$count_id}}";
    var StateId = "{{$state_id}}";
    var CityId = "{{$city_id}}";
    

    // Fetch countries first
    $.ajax({
        url: "/get_country",
        type: 'GET',
        success: function(data) {
            $('#country_id').empty();
            $('#country_id').append('<option value="">-----Select a Country-----</option>');
            data.forEach(function(country) {
                var selected = (country.country_id == CountryId) ? 'selected' : '';
                $('#count_id').append('<option value="' + country.country_id + '" ' + selected + '>' + country.country_name + '</option>');
            });

            // If a country is already selected, fetch states
            if (CountryId) {
                $('#count_id').trigger('change');
            }
        }
    });

    // Fetch states when country is selected
    $('#count_id').change(function() {
        var countryId = $(this).val();
        $('#state_id').empty().append('<option value="" disabled selected>-----Select a State-----</option>');
        $('#city_id').empty().append('<option value="" disabled selected>-----Select a City-----</option>');

        if (countryId) {
            $.ajax({
                url: "/get_state/" + countryId,
                type: "GET",
                success: function(data) {
                    data.forEach(function(state) {
                        var selected = (state.state_id == StateId) ? 'selected' : '';
                        $('#state_id').append('<option value="' + state.state_id + '" ' + selected + '>' + state.state_name + '</option>');
                    });

                    // If a state is already selected, fetch cities
                    if (StateId) {
                        $('#state_id').trigger('change');
                    }
                }
            });
        }
    });

    // Fetch cities when state is selected
    $('#state_id').change(function() {
        var stateId = $(this).val();
        $('#city_id').empty().append('<option value="" disabled selected>-----Select a City-----</option>');

        if (stateId) {
            $.ajax({
                url: "/get_city/" + stateId,
                type: "GET",
                success: function(data) {
                    data.forEach(function(city) {
                        var selected = (city.city_id == CityId) ? 'selected' : '';
                        $('#city_id').append('<option value="' + city.city_id + '" ' + selected + '>' + city.city_name + '</option>');
                    });

                    // If a city is already selected, set it
                    if (CityId) {
                        $('#city_id').val(CityId);
                    }
                }
            });
        }
    });
});

</script>

</body>

</html>