<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ config('app.name') }}, Find Work, @yield('meta_keywords')">
    <meta name="description" content="{{ config('app.name') }}, Find Work, @yield('meta_description')">
    <meta name="author" content="Meta Web Builder">

    <!-- title -->
    <title>@yield('title', config('app.name'))</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('baby/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('baby/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('baby/css/footer.css') }}" rel="stylesheet" />
    <link href="{{ asset('baby/css/responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('baby/css/web.css') }}" rel="stylesheet" />
    <!-- font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">

    <style type="text/css" media="screen">
        .pull-right {float: right;}
        .select2 {width: 100% !important;}
    </style>

    @stack('styles')

</head>

<body>
<div id="app">

    @include('web.baby.inc.header')

    <main id="page-content" class="page-content" style="width: 100%;">

        @include('web.baby.inc.message')

        @yield('test_content')

    </main>

    @include('web.baby.inc.footer')

</div>

<!-- Scripts -->
<script src="{{ asset('baby/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('baby/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{ asset('baby/js/popper.min.js') }}"></script>
<script src="{{ asset('baby/js/bootstrap-4.5.2.min.js') }}"></script>
<script src="{{ asset('baby/js/scripts.js') }}"></script>

<script type="text/javascript">
</script>

@stack('scripts')

</body>
</html>