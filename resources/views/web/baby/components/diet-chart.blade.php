
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <h4 style="text-align: center">Your Vitamins and Minerals for This Month</h4>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12" >
            <h5 class="pl-2">{{ now()->format('F j, Y')}}</h5>
            @if($babyAge->m+1 == 1)
            <p class="p-2">এ মাসে ফলিক এসিড বা ফলেট বাচ্চার স্নায়ুতন্ত্রের জন্য খুব খুব জরুরি। তবে অনেকেই টের পান না এত জলদি। তাই সন্তান গ্রহণে ইচ্ছুক নারীর সব সময়ই ফলেট সমৃদ্ধ খাবার, যেমন- সবুজ শাক সবজি, ডাল, বাদাম ইত্যাদি খাওয়া উচিত।</p>
            @elseif($babyAge->m+1 == 2)
                <p class="p-2">এ সময়ে মিসকারেজ ঠেকাতে ভিটামিন-ই জরুরি। এর জন্য বাদাম, ডিমের কুসুম, অলিভ অয়েল, বিভিন্ন বীজ ইত্যাদি খাওয়া দরকার প্রতিদিন।</p>
            @elseif($babyAge->m+1 == 3)
                <p class="p-2">এ সময়ে ডিহাইড্রেশন এর আশংকা থাকায় প্রচুর পানি পান করা দরকার, সেইসাথে ফলমূল ও সবজি। বমি ভাব থাকলে আদা কুচি খেতে পারেন।</p>
            @elseif($babyAge->m+1 == 4)
                <p class="p-2">এই মাস থেকে বিভিন্ন অঙ্গ প্রত্যঙ্গ পরিপূর্ণ রূপে বৃদ্ধি পায় ও রক্ত তৈরি হতে থাকে। তাই এর পর থেকে রোজ উচ্চ-মানের প্রোটিন ও আয়রন সমৃদ্ধ খাবার খাওয়া একদম বাধ্যতামূলক। কেউ নিরামিষাশী হলে উদ্ভিজ্জ উৎস গুলোই বেশি খাবেন।</p>
            @elseif($babyAge->m+1 == 5)
                <p class="p-2">যেহেতু এ সময়ে শিশুর হাড়, দাঁত, হার্ট, স্নায়ু ও মাংসপেশি সুগঠিত হতে থাকে, তাই এখন থেকে ক্যালসিয়াম খুব জরুরি।</p>
            @elseif($babyAge->m+1 == 6)
                <p class="p-2">সুষম খাবার খেতে হবে, প্রোটিন ও শাক-সবজি কোনভাবেই বাদ দেয়া যাবে না। তবে কোষ্ঠকাঠিন্য হলে শাকের পরিমান কমিয়ে দিতে হবে, পানি বেশি খেতে হবে।</p>
            @elseif($babyAge->m+1 == 7)
                <p class="p-2">সুষম খাবার খেতে হবে, প্রোটিন ও শাক-সবজি কোনভাবেই বাদ দেয়া যাবে না। তবে কোষ্ঠকাঠিন্য হলে শাকের পরিমান কমিয়ে দিতে হবে, পানি বেশি খেতে হবে।</p>
            @elseif($babyAge->m+1 == 8)
                <p class="p-2">এ সময়ে ওমেগা-থ্রি ফ্যাটি এসিড জরুরি</p>
            @else
                <p class="p-2">রসুন প্রিম্যাচিউর ডেলিভারির ঝুঁকি কমিয়ে দেয়। এ সময়ে খেজুর খেলে নরমাল ডেলিভারি হওয়ার সম্ভাবনা বাড়ে।</p>
            @endif
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <h4 style="text-align: center">One Day Diet (2500 kcal) | একদিনের খাদ্যতালিকা (২৫০০ কিলোক্যালরি)</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-sm table-striped table-hover table-bordered table-condensed" id="displayTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th style="width: 35%">Time - সময়</th>
                                <th style="width: 65%">What to eat? - কি খাবেন?</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dietChartBn as $key => $item)
                                <tr>
                                    <td>{{ $item['time'] }}</td>
                                    <td>{{ $item['food'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-4">
    <marquee behavior="scroll" direction="left">
        যদি উপরে উল্লেখিত খাবারের পরিমাণ গুলো ঠিক ঠিক নিশ্চিত করতে পারেন, তাহলে ভিটামিন ও মিনারেলের চাহিদা গুলো পূরণ করা সম্ভব হবে। এই পরিবেশনগুলো সব কিছু মাথায় রেখেই হিসেব করে বের করা, তাই কোন ভিটামিন কতটুকু লাগবে, কোন খাবার কতটুকু মিনারেল দিবে এত সব তথ্য মনে রাখতে হবে না।
        পুরো প্রেগন্যান্সির সময়টাকে তিন ভাগে ভাগ করা হয়- প্রথম ট্রাইমেস্টার (প্রথম তিন মাস), দ্বিতীয় ট্রাইমেস্টার (মাঝের তিন মাস) ও তৃতীয় ট্রাইমেস্টার (শেষ তিন মাস)। বলাই বাহুল্য, প্রথম দিকে পরিমাণে বেশি না খেলেও চলবে, তবে ধীরে ধীরে বাড়াতে হবে যাতে দ্বিতীয় ও তৃতীয় ট্রাইমেস্টারে যথাক্রমে প্রায় ৩০০ ও ৪৫০ কিলোক্যালোরি অতিরিক্ত খেতে হবে।
    </marquee>
</div>
<div class="container-fluid mt-4">
    <div class="row mt-2">
        <div class="col-md-12" >
            <p class="ml-2">এ ছাড়া পুরো গর্ভাবস্থায়ই খুব জরুরি কিছু পুষ্টি উপাদান হল-</p>
            <ul>
                <li>ভিটামিন এ ও ক্যারটিনইডস: টিস্যু বৃদ্ধি, ইমিউনিটি, দৃষ্টি শক্তি বৃদ্ধি ইত্যাদি।</li>
                <li>ভিটামিন বি কমপ্লেক্স: শক্তি তৈরি, রক্ত ও স্নায়ু গঠন ইত্যাদি</li>
                <li>ভিটামিন সি: ইমিউনিটি, রক্ত ও হাড় গঠন ইত্যাদি</li>
                <li>ভিটামিন কে: প্রোটিন, হাড় ও স্নায়ু গঠন</li>
                <li>ভিটামিন ডি: ইমিউনিটি, হাড় গঠন ইত্যাদি</li>
                <li>আয়োডিন: বুদ্ধিবৃত্তিক ও হরমোনের উন্নতি ইত্যাদি</li>
                <li>ভিটামিন এ ও ক্যারটিনইডস: টিস্যু বৃদ্ধি, ইমিউনিটি, দৃষ্টি শক্তি বৃদ্ধি ইত্যাদি।</li>
                <li>জিঙ্ক: ডিএনএ ও বিভিন্ন এনজাইম তৈরি, ইমিউনিটি ইত্যাদি</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div style="background-color: #dddbd5; padding: 30px;">
        <span style="font-weight: bold;">লেখাটি রিভিউ করেছেন –</span><br>
        <span style="font-weight: bold; margin-left: 20px">ডাঃ ফাতেমা ইয়াসমিন</span><br>
        <span style="margin-left: 20px">এফসিপিএস (অবস্টেট্রিক্স ও গাইনোকোলজি) কনসালট্যান্ট,</span><br>
        <span style="margin-left: 20px">শেখ ফজিলাতুন্নেছা মুজিব মেমোরিয়াল কেপিজে বিশেষায়িত হাসপাতাল।</span><br>
    </div>
    <div style="background-color: #abb8c3; min-height: 70px">
        <p style="padding-top: 30px; padding-left: 30px"><span style="font-weight: bold;">সম্পাদনায়ঃ </span>হাবিবা মুবাশ্বেরা</p><br>
    </div>

</div>
@push('styles')

@endpush

