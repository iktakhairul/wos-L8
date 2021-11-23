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

    .attribution {
        font-size: 11px; text-align: center;
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

    @media (max-width: 450px) {
        .box {
            height: 200px;
        }
    }

    @media (max-width: 950px) and (min-width: 450px) {
        .box {
            text-align: center;
            height: 220px;
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
    <div class="container text-center">
        <h1>Check Out Top <span class="text-success">Employers</span></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="row1-container">
        <div class="box box-down cyan" >
            <h4>Md. Samun Mollik</h4>
            <p><i class="fa-solid fa-location-dot"></i> {{ '65b Kemal Ataturk Ave, Dhaka 1213, Bangladesh' }} </p>
            <div class="row p-0 flex justify-content-between">
                <div class="col-9">
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
                    <a href="" class="web-open-jobs">Open Jobs: 09</a>
                </div>
                <div class="col-3 p-0">
                    <img class="rounded-circle" src="{{ asset('web/images/avatars/avatar1.jpg')}}" alt="" style="max-height: 80px">
                </div>
            </div>
        </div>
    </div>
</section>
