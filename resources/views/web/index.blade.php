@php $appInfo = appInfo() @endphp

<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{ !empty($appInfo->name) ? $appInfo->name : config('app.name') }}, Financial Service, @yield('meta_keywords')">
        <meta name="description" content="{{ !empty($appInfo->name) ? $appInfo->name : config('app.name') }}, Financial Service, @yield('meta_description')">
        <meta name="author" content="mosharof.bdzones@gmail.com">

        <!-- title -->
        <title>@yield('title', !empty($appInfo->name) ? $appInfo->name : config('app.name'))</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('web/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('web/css/animate.css') }}" rel="stylesheet" />
        <link href="{{ asset('web/css/ui.css') }}" rel="stylesheet" />
        <link href="{{ asset('web/css/responsive.css') }}" rel="stylesheet" />

        <!-- font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">



        @stack('styles')

    </head>

    <body>
        <div id="app">

            @include('web.inc.header')

            <main id="page-content" class="page-content">
                
                @yield('web_content')
                
            </main>

            @include('web.inc.footer')

        </div>

        <!-- Scripts -->
        <script src="{{ asset('web/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('web/js/jquery-migrate-3.0.0.min.js') }}"></script>
        <script src="{{ asset('web/js/popper.min.js') }}"></script>
        <script src="{{ asset('web/js/bootstrap-4.5.2.min.js') }}"></script>

        <script type="text/javascript">
        </script>

        @stack('scripts')

    </body>
</html>