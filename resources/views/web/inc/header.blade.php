<header class="section-header position-sticky fixed-top">
    <section class="header-main border-bottom p-0">

        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="min-height: 100px;">
            <div class="container">

                <a href="{{ route('baby.index') }}" class="brand-wrap navbar-brand">
                    <span id="web-header-project-title" class="text-success font-weight-bold" style="font-size: 30px">{{ 'Baby Care' }}</span>
                </a>

                <button class="navbar-toggler"  id="web-header-nav-toggler-btn"type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{--*** If Need Nav Items Left Then Add "mr-auto" To Bellow Line ***--}}
                    <ul class="navbar-nav ml-auto">
                        @auth
                        <li class="nav-item">
                            <div class="widget-header mr-3">
                                <a href="{{ route('baby.index') }}" class="widget-view nav-link @if (request()->routeIs(['baby'])) active-hover @endif">Baby Profile - শিশুর প্রোফাইল</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="widget-header mr-3">
                                <a href="{{ route('baby.diet-chart') }}" class="widget-view nav-link @if (request()->routeIs(['diet-chart'])) active-hover @endif">Diet Chart - গর্ভকালীন ডায়েট চার্ট</a>
                            </div>
                        </li>
                        @endauth

                        @guest
                            <li class="nav-item">
                                <div class="widget-header mr-3">
                                    <a href="{{ route('baby.index') }}" class="widget-view nav-link @if (request()->routeIs(['baby'])) active-hover @endif">Baby Profile - শিশুর প্রোফাইল</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="widget-header mr-3">
                                    <a href="{{ route('baby.diet-chart') }}" class="widget-view nav-link @if (request()->routeIs(['diet-chart'])) active-hover @endif">Diet Chart - গর্ভকালীন ডায়েট চার্ট</a>
                                </div>
                            </li>
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
