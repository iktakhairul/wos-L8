<style>
    #web-logout-btn{
        padding: 5px 30px 5px 30px;
        border: 1px solid green !important;
        border-radius: 25px;
        font-weight: normal;
        color: green
    }
    #web-logout-btn:hover{
        border: 1px solid #ff6a00 !important;
        color: #ff6a00;
        transition-duration: .5s;
    }
    .active-hover {
        color: #ff6a00 !important;
    }
</style>
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
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Services Categories</a>
                            <div class="dropdown-menu dropdown-large">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories One</a></p>
                                        <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Two</a></p>
                                        <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Three</a></p>
                                        <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Four</a></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories One</a></p>
                                        <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Two</a></p>
                                        <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Three</a></p>
                                        <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Four</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(Auth::check() && Auth::user()->weight >= 79.99)
                            <div class="widget-header mr-3">
                                <a href="{{ route('dashboard./') }}" class="widget-view">Dashboard</a>
                            </div>
                        @endif
                        <div class="widget-header mr-3">
                            @auth
                                <a href="{{ route('profile./') }}" class="widget-view @if (request()->routeIs(['profile./'])) active-hover active @endif">My profile</a>
                            @endauth

                        @auth
                            <div class="widget-header mr-3">
                                    <a class="nav-link @if (request()->routeIs(['jobs.find-jobs'])) active-hover active @endif" href="{{ route('jobs.find-jobs') }}">All Jobs</a>
                            </div>
                            <div class="widget-header mr-3">
                                <a class="nav-link @if (request()->routeIs(['profile.profiles.edit-present-info'])) active-hover active @endif" href="{{ route('profile.profiles.edit-present-info', auth()->user()['id']) }}">Update My Location</a>
                            </div>
                        @endauth
                                <div class="widget-header mr-3">
                                    <a class="nav-link" href="#">Get the app</a>
                                </div>
                                <div class="widget-header mr-3">
                                    <a class="nav-link dropdown-toggle" href="/" data-toggle="dropdown">English</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Russian</a>
                                        <a class="dropdown-item" href="#">French</a>
                                        <a class="dropdown-item" href="#">Spanish</a>
                                        <a class="dropdown-item" href="#">Chinese</a>
                                    </div>
                                </div>
                                @guest
                                <a href="{{ route('login') }}" style="font-weight: normal; color: #556B2F;"><span style="padding: 5px 30px 5px 30px;">Log In</span></a>
                                <a class="btn badge-pill badge-success mb-2" href="{{ route('register') }}" style="font-weight: normal; margin-right: 15px; color: white; outline: none"><span style="padding: 6px 20px 6px 20px;">Sign Up</span></a>
                                @endguest
                        </div>
                        @auth
                            <div class="widget-header mr-3">
                                <a class="border-success" id="web-logout-btn" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
