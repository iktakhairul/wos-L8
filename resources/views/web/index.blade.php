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
        <link href="{{ asset('web/css/bootstrap-4.5.2.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('web/css/animate.css') }}" rel="stylesheet" />
        <link href="{{ asset('web/css/custom.css') }}" rel="stylesheet" />

        @stack('styles')

    </head>

    <body>
        <div id="app">

            @include('web.inc.header')

            @include('web.inc.sidebar')

            <main id="page-content" class="page-content">
                
                @yield('web_content')
                
            </main>

            @include('web.inc.footer')

            <!-- The Modal -->
            <div class="modal fade" id="proceedModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="p-3">
                                To apply you need a complete profile. Do you want to proceed?
                            </h3>
                            <br>
                            <div class="text-center">
                                <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">No</button>
                                <a id="proceedBtn" href="" class="btn btn-md btn-info">Yes</a>
                            </div>
                        </div>
                        <!-- <div class="modal-footer">
                            eiojresog'ijrsijsgo'isrjg'osrijgsrgovio nsreo;vners;vioun;srnfv;srnjvs;revnujsv;onsdf;vonsdf;vosdfnv;on
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div> -->
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-sm" id="toTop"><i class="fa fa-angle-up fa-2x text-light"></i></button>

        </div>

        <div id="loader" class="modalx"><!-- Place at bottom of page --></div>

        <!-- Scripts -->
        <script src="{{ asset('web/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('web/js/jquery-migrate-3.0.0.min.js') }}"></script>
        <script src="{{ asset('web/js/popper.min.js') }}"></script>
        <script src="{{ asset('web/js/bootstrap-4.5.2.min.js') }}"></script>

        <script type="text/javascript">

            $(document).ready(function () {

                // $(window).load(function() {
                //     // Animate loader off screen
                //     $("#loader").show();
                //     $("#loader").fadeOut();
                // });

                $('[data-toggle="tooltip"]').tooltip({
                    trigger : 'hover'
                });

                $(window).scroll(function() {
                    if ($(this).scrollTop() > 300) {
                        $('#toTop').fadeIn('slow');
                    } else {
                        $('#toTop').fadeOut('slow');
                    }
                });

                $('#toTop').on('click', function(e){
                    var body = $("html, body");
                    body.stop().animate({scrollTop:0}, 500, 'swing');
                });

                $("#sidebar-toggle").click(function () {
                    $("#sidebar, #sidebar-toggle").toggleClass('active');
                });

                $('.navbar, .page-content, footer').click(function(){
                    $("#sidebar, #sidebar-toggle").removeClass('active');
                });

                function hideSidebar(){
                    $("#sidebar, #sidebar-toggle").removeClass('active');
                }

                $('.quantity_class').attr('onkeyup',"this.value=this.value.replace(/[^0-9:]/g,'');");

                // validate email
                function isEmail(email) {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    return regex.test(email);
                }

                $('#subscription').val('');

                $('#subscription').keyup(function() {
                    if (isEmail($('#subscription').val())) {
                        $('#subscriptionBtn').prop('disabled',false);
                    } else {
                        $('#subscriptionBtn').prop('disabled',true);
                    }
                });

                $('#subscriptionBtn').click(function(e){
                    e.preventDefault();
                    var email = $('#subscription').val();
                    $.ajax({
                        url: '',
                        method: 'GET',
                        data: {
                            email: email
                        },
                        beforeSend: function(){
                            // Show image container
                            $("#loader").show();
                        },
                        success: function(response){
                            $('#subscription').val('');
                            $('#subscribeAlert').removeClass('hide');
                            $('#subscribeAlert').fadeOut(5000);
                        },
                        complete:function(data){
                            // Hide image container
                            $("#loader").hide();
                        },
                        error: function(error){
                            //console.log(error);
                        }
                    });
                });
            });
        </script>

        @stack('scripts')

    </body>
</html>