<header id="header">
    <nav class="navbar navbar-expand-sm navbar-light fixed-top">
        <a class="navbar-brand" href="{{ route('/') }}">
            <img src="{{ !empty($appInfo->logo) ? asset('img/'.$appInfo->logo) : asset('img/sample_logo.jpg') }}" alt="Logo" class="header-logo">
            <!-- <strong class="theme-text2">Instant Salary</strong> -->
        </a>
        <ul class="list-group list-group-horizontal ml-auto nav-menu">
            <li class="list-group-item"><a class="text-dark" href="{{ route('about-us') }}">About Us</a></li>
            <li class="list-group-item"><a class="text-dark" href="{{ route('contact') }}">Contact</a></li>
        </ul>

        @auth

            <span class="dropdown user-nav">
                <a type="button" class="dropdown-toggle text-secondary" href="" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu">
                    @auth
                    <a class="dropdown-item" href="{{ route('dashboard./') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    @endauth
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </span>

        @else

            <span class="user-nav">
                <a class="mr-2" href="{{ route('register') }}">Register</a>
                <a href="{{ route('login') }}">Login</a>
            </span>

        @endauth
        
    </nav>
    <button id="sidebar-toggle" class="btn" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </button>
</header>