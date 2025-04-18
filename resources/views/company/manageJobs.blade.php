@php 
$count = 1;
@endphp
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Manage Jobs</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/adminlte.css')}}" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      @include('admin.common.header')
      <!--end::Header-->
      <!--begin::Sidebar-->
      @include('admin.common.sidebar')
      <!--end::Sidebar-->
      <!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h3 class="mb-5"> Jobs</h3>
                    <button class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#addJobModal">ADD</button>
                </div>
                <div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->



    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-12">
                <!-- Validation Error Display -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center"> ID</th>
                                <th class="text-center"> Title</th>
                                <th class="text-center"> Description</th>
                                <th class="text-center"> Vacancies</th>
                                <th class="text-center"> Experience</th>
                                <th class="text-center"> Skills Required</th>
                                <th class="text-center"> Contact</th>
                                <th class="text-center">Actions</th>  <!-- Align Action column to the right -->
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
                                    <td class="text-center">{{ $job->job_skill_required }}</td>
                                    <td class="text-center">{{ $job->contact_email }}</td>
                                    <td class="text-center">
                                        <button class="EditRecord btn btn-success" data-id="{{$job->job_id}}" 
                                            data-title="{{$job->title}}"
                                            data-description="{{$job->description}}"
                                            data-num_of_vacancy="{{$job->num_of_vacancy}}"
                                            data-experience="{{$job->experience}}"
                                            data-job_skill_required="{{$job->job_skill_required}}"
                                            data-status="{{$job->status}}"
                                            data-job_working_hours="{{$job->job_working_hours}}"
                                            data-posted_date="{{$job->posted_date}}"
                                            data-closing_date="{{$job->closing_date}}"
                                            data-contactemail="{{$job->contact_email}}" 
                                            data-category_id="{{$job->category_id}}"
                                            data-department_id="{{$job->department_id}}"
                                            data-country_id="{{$job->country_id}}"
                                            data-state_id="{{$job->state_id }}"
                                            data-city_id="{{$job->city_id }}">Edit</button>
                                        <form action="{{ route('deleteJob', $job->job_id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>



                    </table>


                </div>
                <!--end::Col-->
                <!-- Pagination link-->
                <nav aria-label="..." style="float:right;">
                    <ul class="pagination" style="float:right;">
                      @if ($jobs->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                      @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $jobs->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                      @endif
  
                      @foreach ($jobs->links()->elements[0] as $page => $url)
                        @if ($page == $jobs->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                      @endforeach
  
                      @if ($jobs->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $jobs->nextPageUrl() }}">Next</a>
                        </li>
                      @else
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                      @endif
                    </ul>
                </nav>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
  <!--end::App Main-->



<!-- begin::Add Job Modal -->
<div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addJobModalLabel">Add New Job</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">




              <form action="{{ route('jobs.store') }}" method="POST">
                  @csrf

                  <div class="mb-3">
                      <label for="title" class="form-label">Job Title</label>
                      <input type="text" class="form-control" id="title" name="title" required>
                  </div>

                  <div class="mb-3">
                      <label for="description" class="form-label">Job Description</label>
                      <textarea class="form-control" id="description" name="description" required></textarea>
                  </div>

                  <div class="mb-3">
                      <label for="num_of_vacancy" class="form-label">Number of Vacancies</label>
                      <input type="number" class="form-control" id="num_of_vacancy" name="num_of_vacancy" required>
                  </div>

                  <div class="mb-3">
                      <label for="status" class="form-label">Job Status</label>
                      <select class="form-control" id="status" name="status" required>
                          <option value="Open">Open</option>
                          <option value="Closed">Closed</option>
                      </select>
                  </div>

                  <div class="mb-3">
                      <label for="working_hours" class="form-label">Working Hours</label>
                      <input type="text" class="form-control" id="working_hours" name="working_hours" required>
                  </div>

                  <div class="mb-3">
                    <label for="experience" class="form-label">Experience</label>
                    <input type="text" class="form-control" id="experience" name="experience" required>
                  </div>

                  <div class="mb-3">
                    <label for="job_skill_required" class="form-label">Job Skill Required</label>
                    <input type="text" class="form-control" id="job_skill_required" name="job_skill_required" required>
                  </div>

                  <div class="mb-3">
                    <label for="contact_email" class="form-label"> Email</label>
                    <input type="email" class="form-control" id="contact_email" name="contact_email" required>
                  </div>

                  <div class="mb-3">
                      <label for="posted_date" class="form-label">Posted Date</label>
                      <input type="date" class="form-control" id="posted_date" name="posted_date" required>
                  </div>

                  <div class="mb-3">
                      <label for="closing_date" class="form-label">Closing Date</label>
                      <input type="date" class="form-control" id="closing_date" name="closing_date" required>
                  </div>

                   <!-- Job Category -->
                   <div class="mb-3">
                        <label for="category_id" class="form-label">Job Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="dd">Choose Job Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        
                    </div>

                      <!-- Department -->
                      <div class="mb-3">
                        <label for="department_id" class="form-label">Department</label>
                        <select class="form-control" id="department_id" name="department_id" required>
                            <option value="">Choose Department</option>
                            @foreach($departments as $department)
                                <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                            @endforeach
                        </select>
                    </div>

                  <div class="mb-3">
                    <label for="country_id"class="form-label">Choose Your Country</label>
                    <select class="form-control" name="country_id" id="country_id" required>
                        <option value="" disabled selected>Select Country</option>
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
                        <option value="" disabled selected>Select State</option>
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
                        <option value="" disabled selected>Select City</option>
                    </select>
                    <div class="invalid-feedback">
                        @error('city_id')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                  <button type="submit" class="btn btn-primary">Add Job</button>
              </form>
          </div>
      </div>
  </div>
</div>
<!--end::Add Job Modal -->


<!-- begin::Edit Job Modal -->
<div class="modal fade" id="editJobModal" tabindex="-1" aria-labelledby="editJobModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editJobModalLabel">Edit Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editJobForm" action="{{ route('jobs.edit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="edit_job_id" id="edit_job_id">  
                    <div class="mb-3">
                        <label for="edit_title" class="form-label">Job Title</label>
                        <input type="text" class="form-control" id="edit_title" name="title" value="" required>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Job Description</label>
                        <textarea class="form-control" id="edit_description" name="description" required></textarea>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_num_of_vacancy" class="form-label">Number of Vacancies</label>
                        <input type="number" class="form-control" id="edit_num_of_vacancy" name="num_of_vacancy" value="" required>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_status" class="form-label">Job Status</label>
                        <select class="form-control" id="edit_status" name="status" required>
                            <option value="Open" {{ old('status', $job->status ?? '') == 'Open' ? 'selected' : '' }}>Open</option>
                            <option value="Closed" {{ old('status', $job->status ?? '') == 'Closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_working_hours" class="form-label">Working Hours</label>
                        <input type="text" class="form-control" id="edit_working_hours" name="working_hours" value="" required>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_experience" class="form-label">Experience</label>
                        <input type="text" class="form-control" id="edit_experience" name="experience" value="" required>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_job_skill_required" class="form-label">Job Skill Required</label>
                        <input type="text" class="form-control" id="edit_job_skill_required" name="job_skill_required" value="" required>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_contact_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_contact_email" name="contact_email" value="" required>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_posted_date" class="form-label">Posted Date</label>
                        <input type="date" class="form-control" id="edit_posted_date" name="posted_date" value="" required>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_closing_date" class="form-label">Closing Date</label>
                        <input type="date" class="form-control" id="edit_closing_date" name="closing_date" value="" required>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_category_id" class="form-label">Job Category</label>
                        <select class="form-control" id="edit_category_id" name="category_id" required>
                            <option value="">Choose Job Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->category_id}}"  >{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_department_id" class="form-label">Department</label>
                        <select class="form-control" id="edit_department_id" name="department_id" required>
                            <option value="">Choose Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->department_id }}" 
                                    >
                                    {{ $department->department_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_country_id" class="form-label">Choose Your Country</label>
                        <select class="form-control" name="edit_country_id" id="edit_country_id" required>
                            <option value="" disabled selected>Select Country</option>
                        </select>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_state_id" class="form-label">Choose Your State</label>
                        <select class="form-control" name="edit_state_id" id="edit_state_id" required>
                            <option value="" disabled selected>Select State</option>
                        </select>
                    </div>
  
                    <div class="mb-3">
                        <label for="edit_city_id" class="form-label">Choose Your City</label>
                        <select class="form-control" name="edit_city_id" id="edit_city_id" required>
                            <option value="" disabled selected>Select City</option>
                        </select>
                    </div>
  
                    <button type="submit" class="btn btn-primary">Update Job</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end::Edit Job Modal -->



  <!--begin::Footer-->
  @include('admin.common.footer')
  <!--end::Footer-->
</div>
<!--end::App Wrapper-->


<!--begin::Script-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function(){
    function loadCountries(selectId, CountryId = '') {
        $.ajax({
            url: "/get_country",
            type: 'GET',
            success: function(data) {
                $(selectId).empty().append('<option value="">Select a Country</option>');
                data.forEach(country => {
                    $(selectId).append(`<option value="${country.country_id}" ${country.country_id == CountryId ? 'selected' : ''}>${country.country_name}</option>`);
                });
                if (CountryId) {
                    $(selectId).trigger('change');
                }
            }
        });
    }

    function loadStates(countrySelect, stateSelect, StateId = '') {
        $(countrySelect).change(function(){
            let countryId = $(this).val();
            $(stateSelect).empty().append('<option value="">Select a State</option>');
            if(countryId) {
                $.ajax({
                    url: `/get_state/${countryId}`,
                    type: "GET",
                    success: function(data) {
                        data.forEach(state => {
                            $(stateSelect).append(`<option value="${state.state_id}" ${state.state_id == StateId ? 'selected' : ''}>${state.state_name}</option>`);
                        });
                        if (StateId) {
                            $(stateSelect).trigger('change');
                        }
                    }
                });
            }
        });
    }

    function loadCities(stateSelect, citySelect, CityId = '') {
        $(stateSelect).change(function(){
            let stateId = $(this).val();
            $(citySelect).empty().append('<option value="">Select a City</option>');
            if(stateId) {
                $.ajax({
                    url: `/get_city/${stateId}`,
                    type: 'GET',
                    success: function(data) {
                        data.forEach(city => {
                            $(citySelect).append(`<option value="${city.city_id}" ${city.city_id == CityId ? 'selected' : ''}>${city.city_name}</option>`);
                        });
                        if (CityId) {
                            $(citySelect).trigger('change');
                        }
                    }
                });
            }
        });
    }

    // Load data for both modals
    loadCountries("#country_id");
    loadCountries("#edit_country_id", "{{$country_id}}");

    loadStates("#country_id", "#state_id");
    loadStates("#edit_country_id", "#edit_state_id", "{{$state_id}}");

    loadCities("#state_id", "#city_id");
    loadCities("#edit_state_id", "#edit_city_id", "{{$city_id}}");
  });

  //edit job
      $('.EditRecord').click(function (e) {
      e.preventDefault();

      var jobid = $(this).data('id');
      var title = $(this).data('title');
      var description = $(this).data('description');
      var experience = $(this).data('experience');
      var num_of_vacancy = $(this).data('num_of_vacancy');
      var job_skill_required = $(this).data('job_skill_required');
      var status = $(this).data('status');
      var job_working_hours = $(this).data('job_working_hours');
      var posted_date = $(this).data('posted_date'); 
      var closing_date = $(this).data('closing_date');
      var contact_email = $(this).data('contactemail');
      var category_id = $(this).data('category_id');
      var department_id = $(this).data('department_id');
      var country_id = $(this).data('country_id');
      var state_id = $(this).data('state_id');
      var city_id = $(this).data('city_id');

      
      $('#edit_job_id').val(jobid);
      $('#title').val(title);
      $('#description').val(description);
      $('#num_of_vacancy').val(num_of_vacancy);
      $('#experience').val(experience);
      $('#job_skill_required').val(job_skill_required.split(','));  
      $('#working_hours').val(job_working_hours);
      $('#posted_date').val(posted_date);
      $('#closing_date').val(closing_date);
      $('#contact_email').val(contact_email);
      $('#category_id').val(category_id);
      $('#department_id').val(department_id);
      $('#status').val(status).trigger('change');
      $('#edit_country_id').val(country_id);
      $('#edit_state_id').val(state_id);
      $('#edit_city_id').val(city_id);

    // Show the modal
    $('#editJobModal').modal('show');
});

</script>
<!--end::Script-->

</body>
<!--end::Body-->
</html>