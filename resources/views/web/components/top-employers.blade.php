<style>
    :root {
        --red: hsl(0, 78%, 62%);
        --cyan: hsl(180, 62%, 55%);
        --orange: hsl(34, 97%, 64%);
        --blue: hsl(212, 86%, 64%);
        --varyDarkBlue: hsl(234, 12%, 34%);
        --grayishBlue: hsl(229, 6%, 66%);
        --veryLightGray: hsl(0, 0%, 98%);
        --weight1: 200;
        --weight2: 400;
        --weight3: 600;
    }

    body {
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        background-color: var(--veryLightGray);
    }

    .attribution a {
        color: hsl(228, 45%, 44%);
    }

    h1:first-of-type {
        font-weight: var(--weight1);
        color: var(--varyDarkBlue);

    }

    h1:last-of-type {
        color: var(--varyDarkBlue);
    }

    @media (max-width: 400px) {
        h1 {
            font-size: 1.5rem;
        }
    }

    .header p {
        margin: 0 auto;
        line-height: 2;
        color: var(--grayishBlue);
    }


    .box p {
        color: var(--grayishBlue);
    }

    .box {
        border-radius: 5px;
        box-shadow: 0px 30px 40px -20px var(--grayishBlue);
        padding: 30px;
        margin: 20px;
    }

    img {
        float: right;
    }

    .web-main-hero-title {
        font-family: Times New Roman, Times, serif;
        font-size: 65px
    }

    .web-hero-search-background {
        min-height: 150px;
        background-color: #e7faeb
    }
    #web-header-nav-toggler-btn {
        border: none;
        outline: none;
    }

    @media (max-width: 308px) {
        .box {
            height: 260px;
        }
        #web-header-project-title {
            font-size: 24px !important;
        }
        .navbar-brand{
            margin-right: 0;
        }
        #main-nav-login {
            margin-bottom: 15px;
        }
        #main-nav-login-span {
            padding: 0 !important;
        }
        #main-nav-sign-up-span {
            padding: 6px 50px 6px 50px !important;
        }
        .web-main-hero-title {
            font-size: 35px
        }
        .web-main-hero-sub-title {
            font-size: 20px;
        }
        #web-header-nav-toggler-btn {
            font-size: 15px !important;
            border: none;
        }
        .search-job-component {
            width: 100%;
            height: 40px;
        }
        .web-all-jobs-div {
            margin-top: 0 !important;
        }
        #web-all-jobs-btn{
            padding: 13px 35% 13px 35%;
        }
        .web-hero-search-background {
            min-height: 250px;
        }
    }

    @media (max-width: 450px) and (min-width: 309px) {
        .box {
            height: 220px;
        }
        #main-nav-login {
            margin-bottom: 15px;
        }
        #main-nav-login-span {
            padding: 0 !important;
        }
        #main-nav-sign-up-span {
            padding: 6px 70px 6px 70px !important;
        }
        .web-main-hero-title {
            font-size: 45px
        }
        .web-main-hero-sub-title {
            font-size: 20px;
        }
        .search-job-component {
            width: 100%;
            height: 40px;
        }
        .web-all-jobs-div {
            margin-top: 0 !important;
        }
        #web-all-jobs-btn{
            padding: 13px 38% 13px 38%;
        }
        .web-hero-search-background {
            min-height: 250px;
        }
    }

    @media (max-width: 767px) and (min-width: 450px) {
        .box {
            text-align: center;
            height: 220px;
        }
        #main-nav-login {
            margin-bottom: 15px;
        }
        #main-nav-login-span {
            padding: 0 !important;
        }
        #main-nav-sign-up-span {
            padding: 6px 70px 6px 70px !important;
        }
        .web-main-hero-title {
            font-size: 55px
        }
        .web-all-jobs-div {
            margin-top: 0 !important;
        }
        .web-main-hero-sub-title {
            font-size: 20px;
        }
        .web-hero-search-background {
            min-height: 350px;
        }
    }


    @media (max-width: 950px) and (min-width: 450px) {
        .box {
            text-align: center;
            height: 220px;
        }
        #main-nav-login {
            margin-bottom: 15px;
        }
        #main-nav-login-span {
            padding: 0 !important;
        }
        #main-nav-sign-up-span {
            padding: 6px 40px 6px 40px !important;
        }
        .web-main-hero-title {
            font-size: 55px
        }

        .search-job-component {
            width: 100%;
        }
    }

    .cyan {
        border-top: 3px solid var(--cyan);
    }
    .red {
        border-top: 3px solid var(--red);
    }
    .blue {
        border-top: 3px solid var(--blue);
    }
    .orange {
        border-top: 3px solid var(--orange);
    }

    h2 {
        color: var(--varyDarkBlue);
        font-weight: var(--weight3);
    }


    @media (min-width: 950px) {
        .row1-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .row2-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box-down {
            position: relative;
            top: 150px;
        }
        .box {
            width: 20%;

        }
        .header p {
            width: 30%;
        }

    }
    .web-open-jobs{
        color: green !important;
    }

    .web-open-jobs:hover{
        color: #ff6a00 !important;
        transition-duration: .3s;
    }
</style>
<section class="section-main" style=" padding-top: 50px; padding-bottom: 100px; background-color: #ffffff">
    <div class="container mb-4 text-center">
        <h1>Check Out Top <span class="text-success">Employers</span></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="row1-container">
        <div class="box box-down cyan" >
            <h4>Md. Samun Mollik</h4>
            <p><i class="fa-solid fa-location-dot"></i> {{ '65b Kemal Ataturk Ave, Dhaka 1213, Bangladesh' }} </p>
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
                    <img class="rounded-circle" src="{{ asset('web/images/avatars/avatar2.jpg')}}" alt="" style="max-height: 80px">
                </div>
            </div>
        </div>
        <div class="box red">
            <h4>Md. Mosharof Hossain</h4>
            <p><i class="fa-solid fa-location-dot"></i> {{ '65b Kemal Ataturk Ave, Dhaka 1213, Bangladesh' }} </p>
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
                    <img class="rounded-circle" src="{{ asset('web/images/avatars/avatar3.jpg')}}" alt="" style="max-height: 80px">
                </div>
            </div>
        </div>

        <div class="box box-down blue">
            <h4>Shazzadur Rahman</h4>
            <p><i class="fa-solid fa-location-dot"></i> {{ '65b Kemal Ataturk Ave, Dhaka 1213, Bangladesh' }} </p>
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
                    <img class="rounded-circle" src="{{ asset('web/images/avatars/avatar2.jpg')}}" alt="" style="max-height: 80px">
                </div>
            </div>
        </div>
    </div>
    <div class="row2-container">
        <div class="box orange">
            <h4>Fariha Jabin</h4>
            <p><i class="fa-solid fa-location-dot"></i> {{ '65b Kemal Ataturk Ave, Dhaka 1213, Bangladesh' }} </p>
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
                    <img class="rounded-circle" src="{{ asset('web/images/avatars/avatar1.jpg')}}" alt="" style="max-height: 80px">
                </div>
            </div>
        </div>
    </div>
</section>
