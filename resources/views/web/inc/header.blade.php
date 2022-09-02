<header class="section-header position-sticky fixed-top">
    <section class="header-main border-bottom p-0">

        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="min-height: 100px;">
            <div class="container">

                <a href="{{ route('/') }}" class="brand-wrap navbar-brand">
                    <span id="web-header-project-title" class="font-weight-bold" style="font-size: 30px">{{ config('app.name') }}</span>
                </a>

                <button class="navbar-toggler"  id="web-header-nav-toggler-btn"type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{--*** If Need Nav Items Left Then Add "mr-auto" To Bellow Line ***--}}
                    <ul class="navbar-nav ml-auto">
                        @auth
                        {{--Auth Menus--}}
                            @if(auth()->user()['type'] === 'system_admin')
                                <li class="nav-item">
                                    <div class="widget-header mr-3">
                                        <a href="{{ route('dashboard./') }}" class="widget-view nav-link @if (request()->routeIs(['dashboard'])) active-hover @endif">Dashboard</a>
                                    </div>
                                </li>
                            @endif
                        @endauth

                        @guest
                        {{--No Auth/Public Menus--}}
                            <li class="nav-item">
                                <div class="widget-header">
                                    <a class="widget-view nav-link" href="{{ route('login') }}"><span id="main-nav-sign-up-span">Log In</span></a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="widget-header">
                                    <a class="widget-view nav-link" href="{{ route('register') }}"><span id="main-nav-sign-up-span">Sign Up</span></a>
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
<style>
    .add-shadow {
        box-shadow: 0 20px 40px rgb(0 0 0 / 15%);
        transition: box-shadow .6s ease-in-out;
    }
</style>
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
