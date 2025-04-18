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
                    <h3 class="mb-5"> Interviews</h3>                    
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

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center"> ID</th>
                                <th class="text-center"> Interview Date</th>
                                <th class="text-center"> Meeting ID</th>
                                <th class="text-center"> Meeting Code</th>
                                <th class="text-center"> Meeting Status</th>
                                <th class="text-center"> Meeting Time</th>
                                <th class="text-center">Actions</th> 
                            </tr>
                        </thead>
                            
                        <tbody>
                           @foreach ($interviews as $interview)
                           <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $interview->schedule_date }}</td>
                                <td class="text-center">{{ $interview->description }}</td>
                                <td class="text-center">{{ $interview->meeting_link }}</td>
                                <td class="text-center">{{ $interview->status }}</td>
                                <td class="text-center">{{ $interview->start_time.""."To"."".$interview->end_time }}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-success">Join</a>
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
                    @if ($interviews->onFirstPage())
                      <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                    @else
                      <li class="page-item">
                          <a class="page-link" href="{{ $interviews->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                    @endif

                    @foreach ($interviews->links()->elements[0] as $page => $url)
                      @if ($page == $interviews->currentPage())
                          <li class="page-item active" aria-current="page">
                              <a class="page-link" href="#">{{ $page }}</a>
                          </li>
                      @else
                          <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                      @endif
                    @endforeach

                    @if ($interviews->hasMorePages())
                      <li class="page-item">
                          <a class="page-link" href="{{ $interviews->nextPageUrl() }}">Next</a>
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
<!--begin::Footer-->
@include('admin.common.footer')
<!--end::Footer-->
</div>
<!--end::App Wrapper-->




</body>
<!--end::Body-->
</html>