<footer class="main-footer" role="contentinfo">
    <div class="footer-middle">
        <div class="container pt-2">
            <div class="row mb-4">
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>{{ config('app.name', 'Find Job') }}</h4>
                        <ul class="list-unstyled">
                            <li><a href="#"></a></li>
                            <li><a href="#">© 2021-2022 Find Job, LLC</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6" id="footer-site-map-div">
                    <!--Column2-->
                    <div class="footer-pad">
                        <h5>SITE MAP</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('jobs.find-jobs') }}">All Jobs</a></li>
                            <li><a href="{{ route('profile./') }}">My Profile</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6" id="footer-services-div">
                    <!--Column3-->
                    <div class="footer-pad">
                        <h5>SERVICES</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Biting A Job</a></li>
                            <li><a href="#">Job Owners And Workers Platform</a></li>
                            <li><a href="#">Find Local And International Jobs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <h5>CONTACT</h5>
                    <ul class="social-network social-circle">
                        <li><a href="https://www.facebook.com/Find-Job-111760624695415" target="_blank" class="icoFacebook" title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 copy">
                    <p class="text-center">&copy; Copyright 2021 - Find Job.  All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
