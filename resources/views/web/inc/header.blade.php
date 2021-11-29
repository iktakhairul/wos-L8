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
     .add-shadow {
         box-shadow: 0 20px 40px rgb(0 0 0 / 15%);
         transition: box-shadow .6s ease-in-out;
     }
     .nav-header-notification-icon {
         font-size: 20px;
         width: 45px;
     }
     .nav-messenger-icon {
         max-height: 28px;
         border-radius: 40%;
     }
    .nav-header-mn-plate {
        box-shadow: 0 20px 40px rgb(0 0 0 / 15%);
        transition: box-shadow .6s ease-in-out;
        border: none;
    }
    @media (min-width: 950px) {
        .nav-header-mn-plate {
            margin-left: 60%;
            min-height: 750px;
        }
        .nav-header-mn-icon {
            font-size: 25px;
            padding-top: 1rem !important;
        }
    }

    @media (max-width: 950px) and (min-width: 450px) {
        .nav-header-mn-icon {
            font-size: 25px;
            padding-top: 1rem !important;
        }
    }

    @media (max-width: 767px) and (min-width: 450px) {
        .nav-header-mn-icon {
            font-size: 25px;
            padding-top: .8rem !important;
        }
    }

    @media (max-width: 450px) and (min-width: 364px) {
        .nav-header-mn-title {
            font-size: 20px !important;
        }
        .nav-header-mn-icon {
            font-size: 15px !important;
            padding-top: .5rem !important;
        }
    }

    @media (max-width: 364px) {
        .nav-header-mn-title {
            font-size: 20px !important;
        }
        .nav-header-mn-icon {
            padding-top: .5rem !important;
        }
    }
</style>
<header class="section-header position-sticky fixed-top">
    <section class="header-main border-bottom p-0">

        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="min-height: 100px;">
            <div class="container">

                <a href="/" class="brand-wrap navbar-brand">
                    <span id="web-header-project-title" class="text-success font-weight-bold" style="font-size: 30px">Find Work</span>
                </a>

                <button class="navbar-toggler"  id="web-header-nav-toggler-btn"type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{--*** If Need Nav Items Left Then Add "mr-auto" To Bellow Line ***--}}
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <div class="widget-header mr-3">
                                <a class="nav-link dropdown-toggle pt-1" data-toggle="dropdown" href="#">Services Categories</a>
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
                        </li>
                        @if(Auth::check() && Auth::user()->weight >= 79.99)
                            <li class="nav-item">
                                <div class="widget-header mr-3">
                                    <a href="{{ route('dashboard./') }}" class="widget-view nav-link">Dashboard</a>
                                </div>
                            </li>
                        @endif
                        @auth
                            <li class="nav-item">
                                <div class="widget-header mr-3">
                                    <a href="{{ route('profile./') }}" class="widget-view nav-link @if (request()->routeIs(['profile./'])) active-hover @endif">My profile</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="widget-header mr-3">
                                    <a class="nav-link @if (request()->routeIs(['jobs.find-jobs'])) active-hover @endif" href="{{ route('jobs.find-jobs') }}">All Jobs</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="widget-header mr-3">
                                    <a class="nav-link @if (request()->routeIs(['profile.profiles.edit-present-info'])) active-hover @endif" href="{{ route('profile.profiles.edit-present-info', auth()->user()['id']) }}">Update My Location</a>
                                </div>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <div class="widget-header mr-3">
                                <a class="nav-link" href="#">Get the app</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="widget-header mr-2">
                                <a class="nav-link dropdown-toggle" href="/" data-toggle="dropdown">English</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Russian</a>
                                    <a class="dropdown-item" href="#">French</a>
                                    <a class="dropdown-item" href="#">Spanish</a>
                                    <a class="dropdown-item" href="#">Chinese</a>
                                </div>
                            </div>
                        </li>
                        @guest
                            <li class="nav-item" id="main-nav-login">
                                <div class="widget-header mt-2">
                                    <a href="{{ route('login') }}" style="font-weight: normal; color: #556B2F;"><span id="main-nav-login-span" style="padding: 5px 30px 5px 30px;">Log In</span></a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="widget-header">
                                    <a class="btn badge-pill badge-success" href="{{ route('register') }}" style="font-weight: normal; margin-right: 15px; color: white; outline: none"><span id="main-nav-sign-up-span"  style="padding: 6px 20px 6px 20px;">Sign Up</span></a>
                                </div>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item mr-2 p-0">
                                <div class="text-center">
                                    <a class="nav-link p-1" data-toggle="dropdown" href="#"><img class="nav-messenger-icon float-left" src="{{asset('web/images/icons/messenger.png')}}" alt=""></a>
                                    <div class="dropdown-menu dropdown-large nav-header-mn-plate">
                                        <div class="row">
                                            <div class="col-8">
                                                <a href="#"><h2 class="nav-header-mn-title">Messenger</h2></a>
                                            </div>
                                            <div class="col-4">
                                                <a class="float-left mr-3 text-muted" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                <a class="text-muted" href="#"><i class="fa fa-arrows-alt nav-header-mn-icon"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Chat One</a>
                                        </div>
                                        <hr>
                                        <a href="#">Open Messenger</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item mr-3">
                                <div class="text-center">
                                    <a class="nav-link text-success nav-header-notification-icon" data-toggle="dropdown" href="#"><i class="fa fa-bell fa-lg"></i></a>
                                    <div class="dropdown-menu dropdown-large nav-header-mn-plate">
                                        <h2>Notifications</h2>
                                        <div class="col-md-12">
                                            <a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Notification One</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="widget-header mt-2">
                                    <a class="border-success" id="web-logout-btn" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>

            </div>
        </nav>

    </section>
</header>

{{--JS for navbar shadow when scroll--}}
<script>
    window.addEventListener('scroll',(e)=>{
        const nav = document.querySelector('.navbar');
        if(window.pageYOffset>0){
            nav.classList.add("add-shadow");
        }else{
            nav.classList.remove("add-shadow");
        }
    });
</script>
