<footer class="main-footer" role="contentinfo">
    <div class="footer-middle">
        <div class="container pt-2">
            <div class="row mb-4">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>{{ config('app.name')}}</h4>
                        <ul class="list-unstyled">
                            <li><a href="#"></a></li>
                            <li><a href="#">© 2022-2023 {{config('app.name')}}, LLC</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 mt-4" id="footer-services-div">
                    <!--Column3-->
                    <div class="footer-pad">
                        <h5>ARTICLES</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('baby.index') }}">Baby Profile - শিশুর প্রোফাইল</a></li>
                            <li><a href="{{ route('baby.diet-chart') }}">Diet Chart - গর্ভকালীন ডায়েট চার্ট</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 copy">
                    <p class="text-center">&copy; Copyright 2022 - {{config('app.name')}}.  All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
