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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('feedback') }}">Feedback</a>
                    </li>
                </ul>

                <!-- Account Dropdown Button -->
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Auth::check())
                            {{ Auth::user()->name }}
                        @else
                            Account
                        @endif
                    </button>
                    <ul class="dropdown-menu text-center dropdown-menu-end" aria-labelledby="accountDropdown">
                        @if (Auth::check())
                            @if (Auth::user()->role_id == 1) <!-- Assuming role_id 1 is for Job Seekers -->
                                <li><a class="dropdown-item" href="{{ route('available_jobs') }}">All Jobs</a></li>
                                <li><a class="dropdown-item" href="{{ route('applied_jobs') }}">My Jobs</a></li>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        @else
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
