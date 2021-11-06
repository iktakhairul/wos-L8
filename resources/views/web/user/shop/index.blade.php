<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}"> -->

    <title>@yield('title', config('app.name'))</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-4.5.2.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}" crossorigin="anonymous"></script>

    <!-- font awesome -->
    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap-4.5.2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/nav-sidebar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>
    <div id="app">
        
        @include('web.user.shop.inc.header')

        <main>

            @auth

            <div id="wrapper">

                <!-- Sidebar -->
                @include('web.user.shop.inc.sidebar')
                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->
                <div id="page-content-wrapper">

                    <div class="breadcrumb-box">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="">Dashboard</a></li>
                            @yield('breadcrumbs')
                        </ul>
                    </div>

                    @include('web.user.shop.inc.message')

                    <div class="page-content">
                        
                        @yield('shop_content')

                    </div>

                    <hr>

                    @include('web.user.shop.inc.footer')

                </div>
                <!-- /#page-content-wrapper -->

            </div>

            @endauth

        </main>
    </div>

    <div id="loader" class="modalx"><!-- Place at bottom of page --></div>

    <!-- Menu Toggle Script -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip({
                trigger : 'hover'
            });
            // remove char from numaric type text field
            $('.quantity_class').attr('onkeyup',"this.value=this.value.replace(/[^0-9:]/g,'');");

            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
                $('#navbarSupportedContent').collapse('hide');
            });
            $('#navbar-toggler').click(function(){
                //e.preventDefault();
                $("#wrapper").removeClass('toggled');
                $('#navbarSupportedContent').collapse('toggle');
            });
            $('#page-content-wrapper').click(function(){
                $("#wrapper").removeClass("toggled");
                $('#navbarSupportedContent').collapse('hide');
            });
            $('.d-alert').fadeOut(3000);
        });
    </script>

    @stack('scripts')

</body>
</html>
