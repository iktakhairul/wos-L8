<div class="mt-4">
    <marquee behavior="scroll" direction="left">
        A full-term pregnancy is 40 weeks, or 280 days. Most babies have a normal delivery usually between 37 and 41 weeks.
        সাধারণত ৩৭ সপ্তাহ থেকে ৪১ সপ্তাহের মধ্যে বেশিরভাগ শিশুর নরমাল ডেলিভারি বা স্বাভাবিক প্রসব হয়। এই ৫ সপ্তাহের যেকোন সময়ে শিশু জন্ম নিলে তাকে স্বাভাবিক বলা যাবে।
    </marquee>
</div>
<div class="container d-flex justify-content-center">
    <div class="wrapper-content">
        <div class="img-area">
            <div class="inner-area">
                <img src="{{asset('web/images/avatars/baby.jpeg')}}" alt="{{$baby ? ucwords($baby->name) : 'Baby Image'}}"/>
            </div>
        </div>
        <div class="name">{{$baby ? ucwords($baby->name) : 'Example Name'}}</div>
        <div class="career"> AI: {{$baby ? ucwords($baby->inseminationDate) : 'Date Not Found'}}</div>
        <hr class="horizon"/>
        @auth
            <button class="updateBaby">Create / Update</button>
        @else
            <a href="{{ route('login') }}">
                <button class="updateBabyAngkor">Create / Update</button>
            </a>
        @endauth

        <div class="info">
            <p>Name: {{$baby ? ucwords($baby->name) : 'Example Name'}}</p>
            <p>Age: @if($babyAge){{$babyAge->m}} months and {{$babyAge->d}} days @else  @endif</p>
            <p>Age in Days: {{$babyAge->days ?? ''}}</p>
            @php
            if ($babyAge) {
                $week = floor($babyAge->days / 7)+1;
                /**
                * Calculate average length for today.
                */
                $lengthForWeek = $babySize->firstWhere('week', $week)['length'];
                $extraDaysLengthInCurrentWeek = number_format((($babySize->firstWhere('week', $week+1)['length'] - $lengthForWeek) / 7) * ($babyAge->days % 7), 2);
                $length = $lengthForWeek + $extraDaysLengthInCurrentWeek;
                /**
                 * Calculate average weight for today.
                */
                $weightForWeek = $babySize->firstWhere('week', $week)['weight'];
                $extraDaysWeightInCurrentWeek = (($babySize->firstWhere('week', $week+1)['weight'] - $weightForWeek) / 7) * ($babyAge->days % 7);
                $weight = $weightForWeek + $extraDaysWeightInCurrentWeek;
            }
            @endphp
            <p>Running Weeks: {{$week ?? ''}}</p>
            <p></p>
            <p></p>
            <p>Mother's Blood: {{$baby ? ucwords($baby->bloodGroup) : ''}}</p>
            @if($babyAge && !empty($length) && !empty($weight))
                <p>Length: @if($length < 0.5) {{number_format($length, 3)}} @else {{ $length ?? '' }} @endif cm / @if($length < 0.5) {{ number_format($length/2.54, 4) }} @else {{ number_format($length/2.54, 2) }} @endif inch</p>
                <p>Weight: @if($weight < .5) {{number_format($weight, 3)}} @else {{ ($weight < 999) ? number_format($weight, 2) : (number_format($weight/1000, 2)) }} @endif @if($weight < 999) gm @else kg @endif</p>
            @else
                <p>Length: </p>
                <p>Weight: </p>
            @endif
            @if(isset($baby->inseminationDate))
            <p>Possible Birth Range: </p>
            <p>{{ Carbon\Carbon::parse($baby->inseminationDate)->addDays(259)->format('F j, Y') }} - {{ Carbon\Carbon::parse($baby->inseminationDate)->addDays(287)->format('F j, Y') }}</p>
            <p></p>
            @endif
        </div>
        @if(!empty($baby))
        <form action="{{ route('baby.destroy', $baby->id) }}" method="POST">
            {{ csrf_field() }}
            @method('DELETE')
            <button class="flow text-danger" type="submit" data-toggle="tooltip" data-placement="top" title="DELETE {{ $baby->name }}" onclick="return confirm('Are you sure?')">DELETE</button>
        </form>
        @endif
        <div class="social-icons">
            <a href="#" target="_blank" class="fb"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank" class="messenger"><i class="fab fa-facebook-messenger"></i></a>
            <a href="#" target="_blank" class="insta"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank" class="telegram"><i class="fab fa-telegram-plane"></i></a>
            <a href="#" target="_blank" class="email"><i class="fas fa-envelope"></i></a>
        </div>
    </div>
</div>
@include('web.baby.components.update-baby-modal')
@push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins';
        }
        body {
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #ecf0f3;
        }
        .wrapper-content,
        .wrapper-content .img-area,
        .social-icons a {
            background: #ecf0f3;
            box-shadow: -3px -3px 7px #ffffff, 3px 3px 5px #ceced1;
        }
        .wrapper-content {
            position: relative;
            width: 350px;
            padding: 30px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin: 15px;
        }
        .wrapper-content .img-area {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .img-area .inner-area {
            height: calc(100% - 25px);
            width: calc(100% - 25px);
            border-radius: 50%;
        }
        .inner-area img {
            height: 100%;
            width: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        .wrapper-content .name {
            font-size: 23px;
            font-weight: 500;
            color: #31344b;
            margin: 10px 0 5px 0;
        }
        .wrapper-content .career {
            color: #44476a;
            font-weight: 450;
            font-size: 16px;
        }
        .wrapper-content .flow {
            color: #44476a;
            font-weight: 450;
            font-size: 16px;
            margin: 10px 0 5px 0;
        }
        .wrapper-content .updateBaby {
            background: #ecf0f3;
            box-shadow: -3px -3px 7px #ffffff, 3px 3px 5px #ceced1;
        }
        .wrapper-content .updateBabyAngkor {
            background: #ecf0f3;
            box-shadow: -3px -3px 7px #ffffff, 3px 3px 5px #ceced1;
        }
        .wrapper-content .updateBaby {
            position: relative;
            width: 150px;
            border: none;
            outline: none;
            padding: 5px;
            color: #31344b;
            font-size: 13px;
            font-weight: 450;
            border-radius: 5px;
            cursor: pointer;
            z-index: 4;
            margin: 10px 0 15px 0;
        }
        .wrapper-content .updateBabyAngkor {
            position: relative;
            width: 150px;
            border: none;
            outline: none;
            padding: 5px;
            color: #31344b;
            font-size: 13px;
            font-weight: 450;
            border-radius: 5px;
            cursor: pointer;
            z-index: 4;
            margin: 10px 0 15px 0;
        }
        .wrapper-content .flow {
            background: #ecf0f3;
            box-shadow: -3px -3px 7px #ffffff, 3px 3px 5px #ceced1;
        }
        .wrapper-content .flow {
            position: relative;
            width: 150px;
            border: none;
            outline: none;
            padding: 5px;
            color: #31344b;
            font-size: 13px;
            font-weight: 450;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            z-index: 4;
            margin: 15px 0 15px 0;
        }
        .wrapper-content .horizon {
            width: 330px;
            height: 2px;
            border-width: 0;
            background-color: #e4e4e4;
            margin: 10px 0 5px 0;
        }
        .wrapper-content .info {
            color: #44476a;
            font-size: 14px;
            font-weight: 500;
            color: #31344b;
            text-align: left;
        }
        .wrapper-content .social-icons {
            text-align: center;
        }
        .social-icons a {
            position: relative;
            height: 35px;
            width: 35px;
            margin: 0 3;
            margin-top: 5;
            display: inline-flex;
            text-decoration: none;
            border-radius: 50%;
        }
        .social-icons a:hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            border-radius: 50%;
            background: #ecf0f3;
            box-shadow: inset -3px -3px 7px #ffffff, inset 3px 3px 5px #ceced1;
        }
        .social-icons a i {
            position: relative;
            z-index: 3;
            text-align: center;
            width: 100%;
            height: 100%;
            line-height: 35px;
        }
        .social-icons a.fb i {
            color: #4267b2;
        }
        .social-icons a.messenger i {
            color: #006aff;
        }
        .social-icons a.insta i {
            color: #dd2a7b;
        }
        .social-icons a.telegram i {
            color: #229ed9;
        }
        .social-icons a.email i {
            color: #34a853;
        }

    </style>
@endpush

