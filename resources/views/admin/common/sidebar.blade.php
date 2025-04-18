<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
      <!--begin::Brand Link-->
      <a href="{{route('dashboard')}}" class="brand-link">
        <!--begin::Brand Image-->
        <img
          src="{{asset('admin/assets/img/AdminLTELogo.png')}}"
          alt="AdminLTE Logo"
          class="brand-image opacity-75 shadow"
        />
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">TalentHunt </span>
        <!--end::Brand Text-->
      </a>
      <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="menu"
          data-accordion="false">
            <li class="nav-item ">
                <a href="{{route('dashboard')}}" class="nav-link ">
                  <i class="bi bi-speedometer"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>

            <li class="nav-item ">
              <a href="{{ route('manageJobs') }}" class="nav-link ">
                <i class="bi bi-briefcase"></i>  
                <p>
                  Manage Jobs
              </p>
              </a>
          </li>

          <li class="nav-item ">
            <a href="{{route('manageApplications')}}" class="nav-link ">
              <i class="bi bi-envelope"></i> 
            <p>
                Manage Job Applications
            </p>
            </a>
        </li>

        <li class="nav-item ">
          <a href="{{route('manageInterviews')}}" class="nav-link ">
            <i class="bi bi-clipboard-check"></i>
            <p>
              Manage Interviews
          </p>
          </a>
      </li>

      <li class="nav-item ">
        <a href="{{route('CompanyFeedback')}}" class="nav-link ">
          <i class="bi bi-chat-square-dots"></i>
        <p>
            Give Feedback
        </p>
        </a>
    </li>

        </ul>
            <!--end::Sidebar Menu-->
      </aside>
      <!--end::Sidebar-->