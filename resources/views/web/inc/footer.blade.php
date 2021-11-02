<footer  class="bg-custom mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 ">
                <div class="">
                    <h3>
                        <a href="{{ route('/') }}" class="text-dark">
                            <img src="{{ !empty($appInfo->logo) ? asset('img/'.$appInfo->logo) : asset('img/sample_logo.jpg') }}" alt="Logo" class="footer-logo">
                        </a>
                    </h3>
                    <p class="text-dark">
                        {!! !empty($appInfo->address) ? $appInfo->address : config('app.name') !!}
                        <br />
                        <strong>Call Us:</strong>
                        {{ !empty($appInfo->contact_no) ? $appInfo->contact_no : config('app.name') }}<br />
                        <strong>Email:</strong>
                        {{ !empty($appInfo->email) ? $appInfo->email : config('app.name') }}<br />
                        <!-- <div class="fb-share-button" data-href="https://instantsalaries.com" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Finstantsalaries.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div> -->
                    </p>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6 mb-2">
                <div class="fw-500 font-md text-dark mb-2">Important Links</div>
                <ul class="list-group text-left">
                    <!-- <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}">Home</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about-us') }}">About us</a></li> -->
                    {{-- <li class="list-group-item"><i class="bx bx-chevron-right"></i> <a href="{{ route('fraud-list') }}">Fraud List</a></li> --}}
                    <li class="list-group-item"><i class="bx bx-chevron-right"></i> <a href="{{ route('contact') }}">Contact</a></li>
                    <li class="list-group-item"><i class="bx bx-chevron-right"></i> <a href="{{ route('faq') }}">FAQ</a></li>
                    <li class="list-group-item"><i class="bx bx-chevron-right"></i> <a href="{{ route('terms-conditions') }}">Terms & Conditions</a></li>
                    <li class="list-group-item"><i class="bx bx-chevron-right"></i> <a href="{{ route('privacy-policy') }}">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 text-xs-center">
                <form action="" method="get" id="subscriptionForm">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Email" id="subscription" name="email" />
                        <div class="input-group-append">
                            <button id="subscriptionBtn" class="btn btn-basic text-white fw-500" type="submit"
                                disabled="">Subscribe</button>
                        </div>
                    </div>
                    <div id="subscribeAlert" class="text-dark text-center hide">subscription successful <i class="fa fa-check"></i></div>
                </form>
            </div>
        </div>
        <div class="row text-center justify-content-center">
            <span class="text-dark">{{ date('Y') }} &copy All rights reserved by {{ config('app.name') }}</span>
        </div>
    </div>
</footer>