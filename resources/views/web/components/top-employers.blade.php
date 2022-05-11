<section class="section-main" style=" padding-top: 50px; padding-bottom: 100px; background-color: #ffffff">
    <div class="container mb-4 text-center">
        <h1>Check Out Top <span class="text-success">Employers</span></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>

   @if(count($topEmployers) == 4)
        <div class="row1-container">
            <div class="box box-down cyan" >
                <h4>{{ ($topEmployers[0]) ? $topEmployers[0]->full_name : 'Name Not Found' }}</h4>
                <p><i class="fa-solid fa-location-dot"></i> {{ ($topEmployers[0]) ? $topEmployers[0]->present_address : 'Address Not Found' }} </p>
                <div class="row p-0 flex justify-content-between">
                    <div class="col-9">
                        <p class="mb-2"> Ratings:
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star"></span>
                        </p>
                        <a href="" class="web-open-jobs">Open Jobs: 28</a>
                    </div>
                    <div class="col-3 p-0">
                        <img class="top-employers-img rounded-circle" src="{{ asset('img/glasses-profile.jpg')}}" alt="" style="max-height: 80px">
                    </div>
                </div>
            </div>
            <div class="box red">
                <h4>{{ ($topEmployers[1]) ? $topEmployers[1]->full_name : 'Name Not Found' }}</h4>
                <p><i class="fa-solid fa-location-dot"></i> {{ ($topEmployers[1]) ? $topEmployers[1]->present_address : 'Address Not Found' }} </p>
                <div class="row p-0 flex justify-content-between">
                    <div class="col-9">
                        <p class="mb-2"> Ratings:
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                        </p>
                        <a href="" class="web-open-jobs">Open Jobs: 13</a>
                    </div>
                    <div class="col-3 p-0">
                        <img class="top-employers-img rounded-circle" src="{{ asset('web/images/avatars/avatar3.jpg')}}" alt="" style="max-height: 80px">
                    </div>
                </div>
            </div>

            <div class="box box-down blue">
                <h4>{{ ($topEmployers[2]) ? $topEmployers[2]->full_name : 'Name Not Found' }}</h4>
                <p><i class="fa-solid fa-location-dot"></i> {{ ($topEmployers[2]) ? $topEmployers[2]->present_address : 'Address Not Found' }} </p>
                <div class="row p-0 flex justify-content-between">
                    <div class="col-9">
                        <p class="mb-2"> Ratings:
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star"></span>
                        </p>
                        <a href="" class="web-open-jobs">Open Jobs: 13</a>
                    </div>
                    <div class="col-3 p-0">
                        <img class="top-employers-img rounded-circle" src="{{ asset('web/images/avatars/avatar2.jpg')}}" alt="" style="max-height: 80px">
                    </div>
                </div>
            </div>
        </div>
        <div class="row2-container">
            <div class="box orange">
                <h4>{{ ($topEmployers[3]) ? $topEmployers[3]->full_name : 'Name Not Found' }}</h4>
                <p><i class="fa-solid fa-location-dot"></i> {{ ($topEmployers[3]) ? $topEmployers[3]->present_address : 'Address Not Found' }} </p>
                <div class="row p-0 flex justify-content-between">
                    <div class="col-9">
                        <p class="mb-2"> Ratings:
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star"></span>
                        </p>
                        <a href="" class="web-open-jobs">Open Jobs: 09</a>
                    </div>
                    <div class="col-3 p-0">
                        <img class="top-employers-img rounded-circle" src="{{ asset('web/images/avatars/avatar2.jpg')}}" alt="" style="max-height: 80px">
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row1-container">
            <div class="box box-down cyan" >
                <h4>Jon Doe</h4>
                <p><i class="fa-solid fa-location-dot"></i> {{ '4/C Ave, NY, United States' }} </p>
                <div class="row p-0 flex justify-content-between">
                    <div class="col-9">
                        <p class="mb-2"> Ratings:
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star"></span>
                        </p>
                        <a href="" class="web-open-jobs">Open Jobs: 28</a>
                    </div>
                    <div class="col-3 p-0">
                        <img class="top-employers-img rounded-circle" src="{{ asset('img/glasses-profile.jpg')}}" alt="" style="max-height: 80px">
                    </div>
                </div>
            </div>
            <div class="box red">
                <h4>Jonathon John</h4>
                <p><i class="fa-solid fa-location-dot"></i> {{ '4/C Ave, NY, United States' }} </p>
                <div class="row p-0 flex justify-content-between">
                    <div class="col-9">
                        <p class="mb-2"> Ratings:
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                        </p>
                        <a href="" class="web-open-jobs">Open Jobs: 13</a>
                    </div>
                    <div class="col-3 p-0">
                        <img class="top-employers-img rounded-circle" src="{{ asset('web/images/avatars/avatar3.jpg')}}" alt="" style="max-height: 80px">
                    </div>
                </div>
            </div>

            <div class="box box-down blue">
                <h4>Rockstar Smith</h4>
                <p><i class="fa-solid fa-location-dot"></i> {{ '4/C Ave, NY, United States' }} </p>
                <div class="row p-0 flex justify-content-between">
                    <div class="col-9">
                        <p class="mb-2"> Ratings:
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star"></span>
                        </p>
                        <a href="" class="web-open-jobs">Open Jobs: 13</a>
                    </div>
                    <div class="col-3 p-0">
                        <img class="top-employers-img rounded-circle" src="{{ asset('web/images/avatars/avatar2.jpg')}}" alt="" style="max-height: 80px">
                    </div>
                </div>
            </div>
        </div>
        <div class="row2-container">
            <div class="box orange">
                <h4>Ven Jonson</h4>
                <p><i class="fa-solid fa-location-dot"></i> {{ '4/C Ave, NY, United States' }} </p>
                <div class="row p-0 flex justify-content-between">
                    <div class="col-9">
                        <p class="mb-2"> Ratings:
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star" style="color: orange;"></span>
                            <span class="fa fa-star"></span>
                        </p>
                        <a href="" class="web-open-jobs">Open Jobs: 09</a>
                    </div>
                    <div class="col-3 p-0">
                        <img class="top-employers-img rounded-circle" src="{{ asset('web/images/avatars/avatar2.jpg')}}" alt="" style="max-height: 80px">
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
