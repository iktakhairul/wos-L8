<div class="mt-4">
    <marquee behavior="scroll" direction="left">
        পুরো প্রেগন্যান্সির সময়টাকে তিন ভাগে ভাগ করা হয়- প্রথম ট্রাইমেস্টার (প্রথম তিন মাস), দ্বিতীয় ট্রাইমেস্টার (মাঝের তিন মাস) ও তৃতীয় ট্রাইমেস্টার (শেষ তিন মাস)। বলাই বাহুল্য, প্রথম দিকে পরিমাণে বেশি না খেলেও চলবে, তবে ধীরে ধীরে বাড়াতে হবে যাতে দ্বিতীয় ও তৃতীয় ট্রাইমেস্টারে যথাক্রমে প্রায় ৩০০ ও ৪৫০ কিলোক্যালোরি অতিরিক্ত খেতে হবে।
    </marquee>
</div>

<div class="container-fluid mt-2">
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
@push('styles')

@endpush

