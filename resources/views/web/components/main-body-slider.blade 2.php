<section class="section-main padding-y" style="background-color: #ffffff">
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-6 text-md-left">
                <h1 class="text-success web-main-hero-title" >Join the worldwide find job marketplace</h1>
                <h4 class="text-muted web-main-hero-sub-title">Find great talent. Build your business. Take your career to the next level.</h4>
                <div class="mt-4 pt-4 mb-4 web-all-jobs-div">
                    <a href="{{ route('jobs.find-jobs') }}" id="web-all-jobs-btn">All Jobs</a>
                </div>
            </div>
            <div class="col-md-6 text-md-right">
                <div id="carousel1_indicator" class="slider-home-banner carousel slide"
                     data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel1_indicator" data-slide-to="1"></li>
                        <li data-target="#carousel1_indicator" data-slide-to="2"></li>
                        <li data-target="#carousel1_indicator" data-slide-to="3"></li>
                        <li data-target="#carousel1_indicator" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('web/images/banners/slide5.jpg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('web/images/banners/slide15.jpg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('web/images/banners/slide8.jpg')}}" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('web/images/banners/slide12.jpg')}}" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('web/images/banners/slide10.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel1_indicator" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel1_indicator" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="web-hero-search-background">
        <div class="container">
            <div class="row" style="padding-top: 46px">
                <div class="col-md-1">
                </div>
                <div class="col-md-3 text-md-center p-0 justify-content-between" style="background-color: white; width: 100%; border-top-left-radius: 5px; border-bottom-left-radius: 5px">
                    <span class="search-job-input pl-2"><i class="fa fa-search"></i></span>
                    <input type="text" class="search-job-component search-job-input l-radius b-0 b-r" placeholder="Job Title or Keywords" style="width:85%;border-right: 1px solid #e5e7ea !important">
                </div>
                <div class="col-md-3 p-0 justify-content-between" style="background-color: white; width: 100%">
                    <span class="search-job-input"><i class="fa-solid fa-location-dot ml-2"></i></span>
                    <input type="text" class="search-job-component search-job-input b-0 b-r" placeholder="San Francisco, CA" style="width:86%;border-right: 1px solid #e5e7ea !important">
                </div>
                <div class="col-md-2 justify-content-between" style="background-color: white; width: 100%">
                    <select id="jb-category" class="js-states search-job-component search-job-options b-0" style="background-color: white; width: 100%">
                        <option value="">Select Category &nbsp;</option>
                        @forelse($categories as $key  => $item)
                            <option value="{{ $item ? $item->id : ''}}">{{ $item ? $item->name : ''}}</option>
                        @empty
                            <option value="1">Accounting & Finance</option>
                            <option value="2">Telecommunications</option>
                            <option value="3">IT Companies</option>
                            <option value="4">Art & Design</option>
                            <option value="5">Automotive Jobs</option>
                            <option value="6">Banking Jobs</option>
                            <option value="7">Education Training</option>
                            <option value="8">Designing & Multimedia</option>
                        @endforelse
                    </select>
                </div>
                <div class="col-md-2 p-0 justify-content-between">
                    <button type="button" class="search-job-component btn btn-dark r-radius full-width">Find Jobs</button>
                </div>
                <div class="col-md-1">
                </div>
            </div>
        </div>
    </div>
</section>