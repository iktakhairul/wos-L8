<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php $route = Route::current() @endphp
{{--@php $appInfo = appInfo() @endphp--}}
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Find Job, Recruiter" />
    <meta name="keywords" content="Find Job, Find Job Service" />
    <meta name="author" content="Find Job" />
    <meta name="robots" content="follow" />
    <meta name="googlebot" content="index" />

    <!-- open graph protocol start -->

    <meta property="og:title" content="Find Job" />
    <meta property="og:url" content="https://www.findjob.work/" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="Find Job Services For All Skilled Persons" />
    <meta property="og:image" content="https://findjob/img/is-200x200.png" />
    <meta property="fb:app_id" content="103022351700559" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-4.5.2.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}" crossorigin="anonymous"></script>

    <!-- font awesome -->
    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

@stack('dataTableAssets')

<!-- Styles -->
    <link href="{{ asset('css/bootstrap-4.5.2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- linked resources start-->

    <title>Instant Salaries</title>
    <link rel="icon" href="{{asset('need_header_icon.png')}}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

    @stack('styles')

</head>
<body>

@include('system.inc.header-and-sidebar')

<div id="app">
    @auth
        <main class="b2b-dashboard">

            <div class="breadcrumb-box">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item system-breadcrumb-item {{ $route->getName() == 'test.system.dashboard' ? 'active' : '' }}"><a href="{{ $route->getName() == 'patient.dashboard' ? '#' : route('test.system.dashboard') }}">Patient Dashboard</a></li>
                    @yield('breadcrumbs')
                </ul>
            </div>

            <div id="wrapper">

                <!-- Page Content -->
                <div id="page-content-wrapper">

                @include('system.inc.message')
                <!-- /#page-content-wrapper -->
            @yield('patient_content')
        </main>
    @endauth
</div>
<hr>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('js/partner/function.js') }}"></script>

@stack('scripts')

</body>
</html>
