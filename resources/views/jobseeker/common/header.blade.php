<header id="site-header" class="fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light stroke py-lg-0">
            <h1><a class="navbar-brand pe-xl-5 pe-lg-4" href="/">
                    <span class="sublog">Talent</span>Hunt
                </a></h1>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-lg-auto my-2 my-lg-0 navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('feedback') }}">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('available_jobs')}}">Jobs</a>
                    </li>
                    @endif
                </ul>

                <!-- Account Dropdown Button -->

                @if(Auth::check())
                <li class="nav-item me-lg-3">
                    
                    <div class="dropdown">
                        <button class="phone-btn btn btn-primary btn-style ms-2 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href=" {{ route('applied_jobs') }} ">My Jobs </a></li>
                            <li><a class="dropdown-item" href="{{ route('userProfile') }}">Update Profile</a></li>
                            <li><a class="dropdown-item" href="/">Make Resume</a></li>
                            <li class="nav-item me-lg-3">
                                <form action="{{ route('logout') }}" method="POST" class="d-none d-lg-block">
                                    @csrf
                                    <button type="submit" class="phone-btn btn btn-primary btn-style ms-2">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                <li class="nav-item me-lg-3">
                    <a href="{{ route('login') }}" class="phone-btn btn btn-primary btn-style d-none d-lg-block ms-2">Login</a>
                </li>
                @endif

            </div>
        </nav>
    </div>
</header>
