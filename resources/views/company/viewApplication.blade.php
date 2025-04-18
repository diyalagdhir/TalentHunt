<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Manage Job Applications</title>
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
                    <h3 class="mb-5">Application</h3>
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
            <div class="container mb-4">
                
                <!--begin::Row-->
            <div class="row">
                <div class="container">
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                
                    <table class="table table-hover">
                        <tr>
                            <td>Application ID</td>
                            <td>{{$record->app_id}}</td>
                        </tr>
                        <tr>
                            <td>Candidate Name</td>
                            <td>{{$record->candidate_name}}</td>
                        </tr>
                        <tr>
                            <td>Candidate Email</td>
                            <td>{{$record->candidate_email}}</td>
                        </tr>
                        <tr>
                            <td>Candidate Contact</td>
                            <td>{{$record->candidate_contact}}</td>
                        </tr>
                        <tr>
                            <td>Candidate Experience</td>
                            <td>{{$record->experience}}</td>
                        </tr>
                        <tr>
                            <td>Candidate Resume</td>
                            <td colspan="2">
                                <a href="{{ route('DownloadResume', ['filename' => basename($record->resume)]) }}" class="btn btn-primary">
                                    Download Resume
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Application Date</td>
                            <td>{{$record->application_date}}</td>
                        </tr>
                        <tr>
                            <td>Application Cover Message</td>
                            <td>{{$record->message}}</td>
                        </tr>
                        <tr>
                            <td>Application Status</td>
                            <td>{{$record->application_status}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">
                               
                                <button class=" btn btn-primary updateStatusBtn" data-id="{{$record->app_id}}"
                                    data-application_status="{{$record->application_status}}">
                                    Edit
                                  </button>
                                <a href="{{route('manageApplications')}}"><button class="btn btn-danger">Back</button></a>
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>
            <!--end::Row-->
            
            </div>
        </div>
    </div>

    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    @include('admin.common.footer')
    <!--end::Footer-->
  </div>
  <!--end::App Wrapper-->

<!-- begin::Edit Modal -->
<div class="modal fade" id="statusUpdateModal" tabindex="-1" aria-labelledby="statusUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusUpdateModalLabel">Update Application Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="statusUpdateForm" action="{{ route('jobApplication.edit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="app_id" id="app_id">
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Job Status</label>
                        <select class="form-control" id="application_status" name="application_status" required>
                          <option value="Viewed">Viewed</option>
                          <option value="Approved">Approved</option>
                          <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>
  </div>
  <!-- end::Edit Modal -->
  
  <!-- begin::script -->
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.updateStatusBtn').click(function() {
          var appId = $(this).data('id');
          var appStatus = $(this).data('application_status');
  
          console.log("App ID:", appId);  // Debugging: Check if appId is fetched
          console.log("application_status:", appStatus);
  
          // Set values in the modal
          $('#statusUpdateModal').modal('show');
          $('#app_id').val(appId);
          $('#application_status').val(appStatus);
  
      });
  });
  </script>
  
  <!-- end::script -->

</body>
<!--end::Body-->
</html>