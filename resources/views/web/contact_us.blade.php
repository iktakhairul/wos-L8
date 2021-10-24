@extends('web.index')
@section('title', config('app.name') . ' - Contact')
@section('web_content')

@php $appInfo = appInfo() @endphp

<main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <div class="mb-3"><a href="{{ route('home') }}">Home</a> / <span>Contact</span></div>
                <h1>Contact</h1>
            </div>

            <hr>

            @include('web.inc.message')

            <div class="row">
                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4 class="text-secondary">Location:</h4>
                            {!! $appInfo->address !!}
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4 class="text-secondary">Email:</h4>
                            <p>{!! $appInfo->email !!}</p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4 class="text-secondary">Call:</h4>
                            <p>{!! $appInfo->contact_no !!}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">
                    <form action="{{ route('message-submission') }}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required="" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required="" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required="" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required=""></textarea>
                            <div class="validate"></div>
                        </div>
                        <!-- <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div> -->
                        <div class="text-center"><button type="submit" class="btn btn-primary">Send Message</button></div>
                    </form>
                </div>
            </div>

            @if($appInfo->map)

            <div class="mt-4">
                {!! $appInfo->map !!}
            </div>

            @endif
        </div>
    </section>
    <!-- End Contact Section -->
</main>
<!-- End #main -->


@endsection
