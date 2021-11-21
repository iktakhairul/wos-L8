<section class="section-main padding-y" style="background-color: #ffffff">
    <div class="container">
        <div class="row">
            <div class="col-6 float-md-left">

            </div>
            <div class="col-6 float-md-right">
                <div id="carousel1_indicator" class="slider-home-banner carousel slide"
                     data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel1_indicator" data-slide-to="0" class="active bg-primary"></li>
                        <li data-target="#carousel1_indicator" data-slide-to="1" class="bg-primary"></li>
                        <li data-target="#carousel1_indicator" data-slide-to="2" class="bg-primary"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('web/images/banners/slide1.jpg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('web/images/banners/slide2.jpg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('web/images/banners/slide3.jpg')}}" alt="Third slide">
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
</section>