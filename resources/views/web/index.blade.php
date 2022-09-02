@php $appInfo = appInfo() @endphp
<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{ !empty($appInfo->name) ? $appInfo->name : config('app.name') }}, Softstarz, @yield('meta_keywords')">
        <meta name="description" content="{{ !empty($appInfo->name) ? $appInfo->name : config('app.name') }}, Softstarz, @yield('meta_description')">
        <meta name="author" content="Softstarz">

        <!-- Favicon -->
        <link rel="icon" href="{{ url('img/favicon.png') }}">

        <!-- title -->
        <title>@yield('title', !empty($appInfo->name) ? $appInfo->name : config('app.name'))</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('web/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
{{--        <link href="{{ asset('web/css/animate.css') }}" rel="stylesheet" />--}}
{{--        <link href="{{ asset('web/css/responsive.css') }}" rel="stylesheet" />--}}
        <link href="{{ asset('web/css/web.css') }}" rel="stylesheet" />
        <!-- font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">

        @stack('styles')
    </head>

    <body>
        <div id="app">

            @include('web.inc.header')

            <main id="page-content" class="page-content" style="width: 100%;">

                @include('web.inc.message')

                @yield('web_content')

            </main>

            @include('web.inc.footer')

        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        @stack('scripts')

    </body>
</html>
