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
    <title>Job Details</title>
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
    <br><br><br>
<h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white mt-4 mb-6">{{ $job->title }}</h1>

<div class="container mb-4">
    <table class="table mt-4 w-full border">
        <tbody>
            <tr>
                <th class="text-left p-2">Description</th>
                <td class="p-2">{{ $job->description }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">Vacancies</th>
                <td class="p-2">{{ $job->num_of_vacancy }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">Experience</th>
                <td class="p-2">{{ $job->experience }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">Skills Required</th>
                <td class="p-2">{{ $job->job_skill_required }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">Status</th>
                <td class="p-2">{{ $job->status }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">Working Hours</th>
                <td class="p-2">{{ $job->job_working_hours }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">Posted Date</th>
                <td class="p-2">{{ $job->posted_date }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">Closing Date</th>
                <td class="p-2">{{ $job->closing_date }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">Contact Email</th>
                <td class="p-2">{{ $job->contact_email }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">Category</th>
                <td class="p-2">{{ $job->category->category_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">Department</th>
                <td class="p-2">{{ $job->department->department_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">Country</th>
                <td class="p-2">{{ $job->country->country_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">State</th>
                <td class="p-2">{{ $job->state->state_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th class="text-left p-2">City</th>
                <td class="p-2">{{ $job->city->city_name ?? 'N/A' }}</td>
            </tr>
        </tbody>
    </table>

    <div class="text-center">
        <a href="{{ route('available_jobs') }}" class="btn btn-secondary">Back</a> &nbsp;
        <button onclick="setJobId({{ $job->job_id }})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal">Apply</button>

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
                    <label for="msg">Enter Your Cover Message:</label>
                    <span class="error" style="color:red;">*</span>
                    <textarea class="form-control" id="msg" name="msg" required>{{ old('msg') }}</textarea>
                    <!-- Display Validation Error if Any -->
                    @error('msg')
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
  <script src="{{asset('user/assets/js/jquery-1.9.1.min.js')}}"></script>
  <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>


 <script>
    function setJobId(jobId) {
    document.getElementById('job_id').value = jobId;
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