<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
@php 
$country_id = old('country_id','');
$state_id = old('state_id','');
$city_id = old('city_id','');
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Registration</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
    <!-- Include only one version of jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Include jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation/1.19.5/additional-methods.min.js"></script>

    <!-- Include external JS file for validation -->
    <script src="{{ asset('user/assets/js/validation.js') }}"></script> 

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <h3 class="title-w3l" align="center">
        Sign up to access your job opportunities and <br> manage your career anytime
    </h3>

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="contactct-fm map-content-9">
        <!-- Example form in register.blade.php -->
       
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Enter Your Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                <div class="invalid-feedback">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="email"class="form-label">Enter Your Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                <div class="invalid-feedback">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Enter Your Contact</label>
                <input type="number" class="form-control" name="contact" id="contact" placeholder="Enter your contact number" value="{{ old('contact') }}" required>
                <div class="invalid-feedback">
                    @error('contact')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="password"class="form-label">Enter Your Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                <div class="invalid-feedback">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="password_confirmation"class="form-label">Enter Your Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required>
                <div class="invalid-feedback">
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="role_id" class="form-label">Choose Your Role</label>
                <select class="form-control" name="role_id" id="role_id" required>
                    <option value="" disabled selected>-----Select a Role-----</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->role_name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    @error('role_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="country_id"class="form-label">Choose Your Country</label>
                <select class="form-control" name="country_id" id="country_id" required>
                    <option value="" disabled selected>-----Select Country-----</option>
                </select>
                <div class="invalid-feedback">
                    @error('country_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="state_id"class="form-label">Choose Your State</label>
                <select class="form-control" name="state_id" id="state_id" required>
                    <option value="" disabled selected>-----Select State-----</option>
                </select>
                <div class="invalid-feedback">
                    @error('state_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="city_id"class="form-label">Choose Your City</label>
                <select class="form-control" name="city_id" id="city_id" required>
                    <option value="" disabled selected>-----Select City-----</option>
                </select>
                <div class="invalid-feedback">
                    @error('city_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="text-lg-center">
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            
        </form>

        <!-- Message for Users Not Registered -->
 </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var CountryId = "{{$country_id}}";
            var StateId = "{{$state_id}}";
            var CityId = "{{$city_id}}";
            //for country
            $.ajax({
            url: "/get_country",
            type: 'GET',
            success: function(data) {
                $('#country_id').empty();
                $('#country_id').append('<option value="">-----Select a Country-----</option>');
                for (var i = 0; i < data.length; i++)
                {
                    var selected = data[i].country_id == CountryId ? 'selected' : '';
                    $('#country_id').append('<option value="' + data[i].country_id + '" ' + selected + '>' + data[i].country_name + '</option>');
                }
                if (CountryId) {
                    $('#country_id').val(CountryId).trigger('change');
                    
                }
            }
            });
            //for state
            $('#country_id').change(function(){
                var countryId = $(this).val();

                console.log(countryId);
                $('#state_id').empty();
                $('#state_id').append('<option value="">Select a State</option>')
                $('#city_id').empty();
                $('#city_id').append('<option value="">Select a City</option>')
                if(countryId)
                {
                    $.ajax({
                        url: "/get_state/"+countryId,
                        type:"GET",
                        data :{id:countryId},
                        success: function(data) 
                        {
                           console.log("stateid:",data);
                           for(var i=0;i<data.length;i++)
                            {
                                var selected = data[i].state_id == StateId ? 'selected':'';
                                $('#state_id').append('<option value="' + data[i].state_id + '" ' + selected + '>' + data[i].state_name + '</option>');   
                            } 
                            if(StateId)
                            {
                                $('#state_id').val(StateId).trigger('change');
                            }
                        }
                    });   
                }
            });
            //for city
            $('#state_id').change(function(){
                var stateId = $(this).val();
                console.log("stateid:",stateId);
                $('#city_id').empty();
                $('#city_id').append('<option value="">Select an City</option>')
                if(stateId)
                {
                    //console.log('stateid:',stateId);debugger;
                    $.ajax({
                        url: '/get_city/'+stateId,
                        type: 'GET',
                        success: function(data) {
                            for (var i = 0; i < data.length; i++) {
                                var selected = data[i].city_id == CityId ? ' selected' : '';

                                $('#city_id').append('<option value="' + data[i].city_id + '" ' + selected + '>' + data[i].city_name + '</option>');
                            }
                            if (StateId) {
                                $('#city_id').val(CityId).trigger('change');
                            }
                        }
                    });
                }
            });

        });
    </script>

</body>

</html>