<header class="section-header position-sticky fixed-top">
    <section class="header-main border-bottom p-0">

        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="min-height: 100px;">
            <div class="container">

                <a href="/" class="brand-wrap navbar-brand">
                    <span id="web-header-project-title" class="text-success font-weight-bold" style="font-size: 30px">{{ config('app.name', 'Find Job') }}</span>
                </a>

                <button class="navbar-toggler"  id="web-header-nav-toggler-btn"type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{--*** If Need Nav Items Left Then Add "mr-auto" To Bellow Line ***--}}
                    <ul class="navbar-nav ml-auto">
{{--                        <li class="nav-item dropdown">--}}
{{--                            <div class="widget-header mr-3">--}}
{{--                                <a class="nav-link dropdown-toggle pt-1" data-toggle="dropdown" href="#">Services Categories</a>--}}
{{--                                <div class="dropdown-menu dropdown-large">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories One</a></p>--}}
{{--                                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Two</a></p>--}}
{{--                                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Three</a></p>--}}
{{--                                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Four</a></p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories One</a></p>--}}
{{--                                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Two</a></p>--}}
{{--                                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Three</a></p>--}}
{{--                                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Four</a></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <div class="widget-header mr-3">
                                <a href="{{ route('test.baby') }}" class="widget-view nav-link">Baby Service</a>
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
{{--                        <li class="nav-item">--}}
{{--                            <div class="widget-header mr-3">--}}
{{--                                <a class="nav-link" href="#">Get the app</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <div class="widget-header mr-2">--}}
{{--                                <a class="nav-link dropdown-toggle" href="/" data-toggle="dropdown">English</a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                    <a class="dropdown-item" href="#">Russian</a>--}}
{{--                                    <a class="dropdown-item" href="#">French</a>--}}
{{--                                    <a class="dropdown-item" href="#">Spanish</a>--}}
{{--                                    <a class="dropdown-item" href="#">Chinese</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
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
                                                <div class="row">
                                                    <div class="col">
                                                        <a class="text-muted" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                    </div>
                                                    <div class="col">
                                                        <a class="text-muted" href="#"><i class="fa fa-arrows-alt nav-header-mn-icon"></i></a>
                                                    </div>
                                                    <div class="col">
                                                        <a class="text-muted" href="#"><i class="fa fa-pencil nav-header-mn-icon"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--Message List--}}
                                        <div class="col-md-12 scroll-div nm-div-padding">

                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar2.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="card-job-post-title p-0 pt-2 m-0 nm-list-title">Md. Hasan</p>
                                                    <p class="card-job-post-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquam aut commodi consectetur debitis eaque eum eveniet libero nulla quaerat quibusdam quisquam quos recusandae sunt suscipit voluptas voluptate voluptatem.</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar3.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="card-job-post-title p-0 pt-2 m-0 nm-list-title">Samun Mollik</p>
                                                    <p class="card-job-post-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquam aut commodi consectetur debitis eaque eum eveniet libero nulla quaerat quibusdam quisquam quos recusandae sunt suscipit voluptas voluptate voluptatem.</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar1.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="card-job-post-title p-0 pt-2 m-0 nm-list-title">Fariha Jabin</p>
                                                    <p class="card-job-post-title p-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquam aut commodi consectetur debitis eaque eum eveniet libero nulla quaerat quibusdam quisquam quos recusandae sunt suscipit voluptas voluptate voluptatem.</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar2.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="card-job-post-title p-0 pt-2 m-0 nm-list-title">Md. Hasan</p>
                                                    <p class="card-job-post-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquam aut commodi consectetur debitis eaque eum eveniet libero nulla quaerat quibusdam quisquam quos recusandae sunt suscipit voluptas voluptate voluptatem.</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar3.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="card-job-post-title p-0 pt-2 m-0 nm-list-title">Samun Mollik</p>
                                                    <p class="card-job-post-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquam aut commodi consectetur debitis eaque eum eveniet libero nulla quaerat quibusdam quisquam quos recusandae sunt suscipit voluptas voluptate voluptatem.</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar1.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="card-job-post-title p-0 pt-2 m-0 nm-list-title">Fariha Jabin</p>
                                                    <p class="card-job-post-title p-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquam aut commodi consectetur debitis eaque eum eveniet libero nulla quaerat quibusdam quisquam quos recusandae sunt suscipit voluptas voluptate voluptatem.</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar2.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="card-job-post-title p-0 pt-2 m-0 nm-list-title">Md. Hasan</p>
                                                    <p class="card-job-post-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquam aut commodi consectetur debitis eaque eum eveniet libero nulla quaerat quibusdam quisquam quos recusandae sunt suscipit voluptas voluptate voluptatem.</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar3.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="card-job-post-title p-0 pt-2 m-0 nm-list-title">Samun Mollik</p>
                                                    <p class="card-job-post-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquam aut commodi consectetur debitis eaque eum eveniet libero nulla quaerat quibusdam quisquam quos recusandae sunt suscipit voluptas voluptate voluptatem.</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar1.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="card-job-post-title p-0 pt-2 m-0 nm-list-title">Fariha Jabin</p>
                                                    <p class="card-job-post-title p-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquam aut commodi consectetur debitis eaque eum eveniet libero nulla quaerat quibusdam quisquam quos recusandae sunt suscipit voluptas voluptate voluptatem.</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                        <div id="messenger-open" align="center">
                                            <a href="#">Open Messenger</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item mr-3">
                                <div class="text-center">
                                    <a class="nav-link text-success nav-header-notification-icon" data-toggle="dropdown" href="#" style="padding-top: 3px !important;"><i class="fa fa-bell fa-lg"></i></a>
                                    <div class="dropdown-menu dropdown-large nav-header-mn-plate">
                                        <div class="row">
                                            <div class="col-11">
                                                <a href="#"><h2 class="nav-header-mn-title">Notifications</h2></a>
                                            </div>
                                            <div class="col-1">
                                                <div class="row p-0">
                                                    <div class="col p-0">
                                                        <a class="text-muted" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--Notification List--}}
                                        <div class="col-md-12 scroll-div nm-div-padding">

                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar2.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0">Mr. Hasan, You have a new job proposal!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar1.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0">Dear Fariha Jabin, You have a new job!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar3.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0 ">Hi Samun Mollik, A new job post near you!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar2.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0">Mr. Hasan, You have a new job proposal!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar1.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0">Dear Fariha Jabin, You have a new job!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar3.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0">Hi Samun Mollik, A new job post near you!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar2.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0">Mr. Hasan, You have a new job proposal!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar1.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0">Dear Fariha Jabin, You have a new job!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar3.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0">Hi Samun Mollik, A new job post near you!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar2.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0">Mr. Hasan, You have a new job proposal!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar1.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0">Dear Fariha Jabin, You have a new job!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-2">
                                                    <img class="rounded-circle message-list-avatar" src="{{ asset('web/images/avatars/avatar3.jpg') }}" width="75px" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <p class="notification-list-text p-0 pt-2 m-0">Hi Samun Mollik, A new job post near you!</p>
                                                </div>
                                                <div class="col-2">
                                                    <a class="text-muted pt-2" href="#"><i class="fa fa-ellipsis-h nav-header-mn-icon"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                        <div id="messenger-open" align="center">
                                            <a href="#">See All Notifications</a>
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
