
<nav id="topNavbar" class="navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container-fluid">
        @auth
        <a href="#menu-toggle" class="btn theme-link" id="menu-toggle"><img src="{{ asset('img/angleLeft.png') }}" alt="ToggleMenu"></a>
        @endauth
        <a class="navbar-brand smooth-red" href="{{ route('/') }}">
            {{ config('app.name', 'Laravel') }}
            <!-- <img src="" alt="{{ config('app.name') }}" class="title-logo-img"> -->
        </a>
        <button class="navbar-toggler" type="button" id="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <!-- <ul class="navbar-nav mr-auto">

            </ul> -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <!-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif -->
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="avatar-box">
                                <img src="{{ asset('img/img_avatar.png') }}" alt="{{ Auth::user()->name }}" class="img-fluid avatar">
                            </span>{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->weight >= 9.99)

                            <a class="dropdown-item" href="{{ route('dashboard./') }}">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </a>

                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>