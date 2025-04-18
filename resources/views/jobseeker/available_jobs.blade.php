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
    <title>All Jobs</title>
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
<section class="w3l-available-jobs-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-available-jobs">
        <div class="container py-lg-5 py-sm-4">
            <div class="w3breadcrumb-gids text-center">
                <div class="w3breadcrumb-info mt-5">
                    <h2 class="w3ltop-title pt-4">All Jobs</h2>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="/">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white mt-4 mb-6">All Jobs Here</h1>
<p class="text-center">Explore a wide range of career opportunities and find your ideal job on our platform today!</p>

<!-- Search Form -->
<div class="container my-5">
<form method="GET" action="{{ route('available_jobs') }}" class="mb-4">
    <div class="input-group" style="border-radius: 30px; overflow: hidden; border: 1px solid #ccc;">
        <span class="input-group-text bg-white border-0">
            <i class="fas fa-search text-dark"></i>
        </span>
        
        <input type="text" name="search" placeholder="Search by Job Title..." value="{{ request('search') }}" 
            class="form-control border-0" style="border-radius: 30px;">
        
        <span class="input-group-text bg-white border-0">
            <i class="fas fa-times text-secondary" style="cursor: pointer;" onclick="clearSearch()"></i>
        </span>
    </div>
</form>


<table class="table mt-4 w-full">
    <thead>
        <tr>
            <th class="text-center">Job ID</th>
            <th class="text-center">Job Title</th>
            <th class="text-center">Job Description</th>
            <th class="text-center">Job Vacancies</th>
            <th class="text-center">Job Experience</th>
            <th class="text-center">Action</th>  <!-- Align Action column to the right -->
        </tr>
    </thead>
    <tbody>
        @foreach ($jobs as $job)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $job->title }}</td>
                <td class="text-center">{{ $job->description }}</td>
                <td class="text-center">{{ $job->num_of_vacancy }}</td>
                <td class="text-center">{{ $job->experience }}</td>
                <td class="text-center">
                    <a href="{{ route('available_jobs.details', ['id' => $job->job_id]) }}" class="btn btn-success">
                        <i class="fa-solid fa-eye"></i>
                    </a> &nbsp;    
                    <button onclick="setJobId({{ $job->job_id }})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal">Apply</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- Pagination Links --}}
<div class="d-flex justify-content-center mt-4">
    {{ $jobs->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
</div>


</div>

<!-- Modal -->
<!-- Bootstrap Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Apply for Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <form action="{{ route('job.apply') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" id="job_id">
                    
                    <!-- Resume Field -->
                    <div class="mb-3 mt-3">
                        <label for="resume">Upload Your Resume:</label>
                        <span class="error" style="color:red;">*</span>
                        <input type="file" class="form-control" id="resume" name="resume" value="{{ old('resume') }}" required>
                        <!-- Display Validation Error if Any -->
                        @error('resume')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                        <!-- Experience Field -->
                        <div class="mb-3 mt-3">
                            <label for="experience">Enter Your Experience:</label>
                            <span class="error" style="color:red;">*</span>
                            <input type="text" class="form-control" id="experience" name="experience" value="{{ old('experience') }}" required>
                            <!-- Display Validation Error if Any -->
                            @error('experience')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                   <!-- Cover Message Field -->
                   <div class="mb-3 mt-3">
                    <label for="message">Enter Your Cover Message:</label>
                    <span class="error" style="color:red;">*</span>
                    <textarea class="form-control" id="message" name="message" required>{{ old('message') }}</textarea>
                    <!-- Display Validation Error if Any -->
                    @error('message')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Apply Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




 <!-- footer -->
 @include('jobseeker.common.footer')
 <!-- //footer -->
 <!-- Js scripts -->
 <!-- Template JavaScript -->
 <script src="{{asset('user/assets/js/jquery-3.3.1.min.js')}}"></script>
 <script src="{{asset('user/assets/js/theme-change.js')}}"></script>
 <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>


 <script>
    function setJobId(jobId) {
        document.getElementById('job_id').value = jobId;
    }

    function clearSearch() {
        document.querySelector('input[name="search"]').value = '';
    }
</script>

<!-- Success & Error Alerts -->
@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

</body>

</html>
