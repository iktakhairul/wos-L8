<header class="section-header position-sticky fixed-top">
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3 col-md-12">
                    <a href="/" class="brand-wrap">
                        <span class="text-success font-weight-bold" style="font-size: 30px">Find Work</span>
                    </a>
                </div>
                <div class="col-xl-10 col-lg-4 col-md-12">
                    <div class="widgets-wrap float-md-right">
                        <div class="widget-header mr-3">
                            @auth
                                <a href="{{ route('profile./') }}" class="widget-view">
                                    <div class="icon-area">
                                        <i class="fa fa-user"></i>
                                        <span class="notify">3</span>
                                    </div>
                                    <small class="text"> My profile </small>
                                </a>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}" class="widget-view">
                                    <div class="icon-area">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <small class="text"> Login </small>
                                </a>
                            @endguest

                        </div>
                        @if(Auth::check() && Auth::user()->weight >= 79.99)
                        <div class="widget-header mr-3">
                            <a href="{{ route('dashboard./') }}" class="widget-view">
                                <div class="icon-area text-danger">
                                    <i class="fa fa-store"></i>
                                </div>
                                <small class="text text-danger"> Dashboard </small>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav class="navbar navbar-main navbar-expand-lg border-bottom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> <i
                                class="fa fa-bars text-muted mr-2"></i> Services </a>
                        <div class="dropdown-menu dropdown-large">
                            <nav class="row">
                                <div class="col-6">
                                    <a href="page-index-1.html">Home page 1</a>
                                    <a href="page-index-2.html">Home page 2</a>
                                    <a href="page-category.html">All category</a>
                                </div>
                                <div class="col-6">
                                    <a href="page-profile-main.html">Profile main</a>
                                    <a href="page-profile-orders.html">Profile orders</a>
                                    <a href="page-profile-seller.html">Profile seller</a>
                                </div>
                            </nav>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs(['profile.find-jobs'])) active @endif" href="{{ route('profile.find-jobs') }}">Job Posts</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link @if (request()->routeIs(['profile.profiles.edit-present-info'])) active @endif" href="{{ route('profile.profiles.edit-present-info', auth()->user()['id']) }}">Update My Location</a>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav ml-md-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Get the app</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/" data-toggle="dropdown">English</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Russian</a>
                            <a class="dropdown-item" href="#">French</a>
                            <a class="dropdown-item" href="#">Spanish</a>
                            <a class="dropdown-item" href="#">Chinese</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
