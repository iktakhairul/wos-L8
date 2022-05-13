<?php

namespace App\Http\Controllers\Frontend\Baby;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class BabyController extends Controller
{
    /**
     * Baby index page data loader.
     *
     * @return View
     */
    public function ourBaby() {
        $baby = DB::table('babies')->where('user_id', auth()->id())->first();
        if ($baby) {
            if ($baby->inseminationDate) {
                $babyAge = Carbon::parse(Carbon::parse($baby->inseminationDate)->format('d-m-Y'))->diff(now()->format('d-m-Y'));
            }else {
                $babyAge = null;
            }
        }else {
            $babyAge = null;
        }
        $babySize = collect([
            [
                'week' => 1,
                'length' => .006,
                'weight' => .001
            ],
            [
                'week' => 2,
                'length' => .03,
                'weight' => .008
            ],
            [
                'week' => 3,
                'length' => .08,
                'weight' => .02
            ],
            [
                'week' => 4,
                'length' => 0.2,
                'weight' => .06
            ],
            [
                'week' => 5,
                'length' => 0.3,
                'weight' => 0.1
            ],
            [
                'week' => 6,
                'length' => 0.6,
                'weight' => 0.2
            ],
            [
                'week' => 7,
                'length' => 1.1,
                'weight' => .6
            ],
            [
                'week' => 8,
                'length' => 1.6,
                'weight' => 1
            ],
            [
                'week' => 9,
                'length' => 2.3,
                'weight' => 2
            ],
            [
                'week' => 10,
                'length' => 3.1,
                'weight' => 4
            ],
            [
                'week' => 11,
                'length' => 4.1,
                'weight' => 7
            ],
            [
                'week' => 12,
                'length' => 5.4,
                'weight' => 14
            ],
            [
                'week' => 13,
                'length' => 7.4,
                'weight' => 23
            ],
            [
                'week' => 14,
                'length' => 8.7,
                'weight' => 43
            ],
            [
                'week' => 15,
                'length' => 10.1,
                'weight' => 70
            ],
            [
                'week' => 16,
                'length' => 11.6,
                'weight' => 100
            ],
            [
                'week' => 17,
                'length' => 13,
                'weight' => 140
            ],
            [
                'week' => 18,
                'length' => 14.2,
                'weight' => 190
            ],
            [
                'week' => 19,
                'length' => 15.3,
                'weight' => 240
            ],
            [
                'week' => 20,
                'length' => 25.6,
                'weight' => 300
            ],
            [
                'week' => 21,
                'length' => 26.7,
                'weight' => 360
            ],
            [
                'week' => 22,
                'length' => 27.8,
                'weight' => 430
            ],
            [
                'week' => 23,
                'length' => 28.9,
                'weight' => 501
            ],
            [
                'week' => 24,
                'length' => 30,
                'weight' => 600
            ],
            [
                'week' => 25,
                'length' => 34.6,
                'weight' => 660
            ],
            [
                'week' => 26,
                'length' => 35.6,
                'weight' => 760
            ],
            [
                'week' => 27,
                'length' => 36.6,
                'weight' => 875
            ],
            [
                'week' => 28,
                'length' => 37.6,
                'weight' => 1000
            ],
            [
                'week' => 29,
                'length' => 38.6,
                'weight' => 1200
            ],
            [
                'week' => 30,
                'length' => 39.9,
                'weight' => 1300
            ],
            [
                'week' => 31,
                'length' => 41.1,
                'weight' => 1500
            ],
            [
                'week' => 32,
                'length' => 42.4,
                'weight' => 1700
            ],
            [
                'week' => 33,
                'length' => 43.7,
                'weight' => 1900
            ],
            [
                'week' => 34,
                'length' => 45,
                'weight' => 2100
            ],
            [
                'week' => 35,
                'length' => 46.2,
                'weight' => 2400
            ],
            [
                'week' => 36,
                'length' => 47.4,
                'weight' => 2600
            ],
            [
                'week' => 37,
                'length' => 48.6,
                'weight' => 2900
            ],
            [
                'week' => 38,
                'length' => 49.8,
                'weight' => 3100
            ],
            [
                'week' => 39,
                'length' => 50.7,
                'weight' => 3300
            ],
            [
                'week' => 40,
                'length' => 51.2,
                'weight' => 3500
            ],
            [
                'week' => 41,
                'length' => 51.8,
                'weight' => 3700
            ],
            [
                'week' => 42,
                'length' => 52.6,
                'weight' => 3900
            ],
        ]);

        return view('web.baby.baby-profile', compact('baby', 'babyAge', 'babySize'));
    }

    /**
     * Baby update method, Store or update baby information to storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function babyUpdate(Request $request)
    {
        DB::beginTransaction();
        $request['rangeStartDate'] = Carbon::parse(now())->subDay(287)->format('d-m-Y');
        $request['rangeEndDate'] = Carbon::parse(now())->subDay(7)->format('d-m-Y');
        /** Validation for right date */
        $this->validate($request, [
            'name'             => 'required|regex:/^[a-zA-Z0-9.,\s]+$/|min:3|max:100',
            'inseminationDate' => 'required|date|date_format:d-m-Y|after_or_equal:rangeStartDate|before_or_equal:rangeEndDate',
            'bloodGroup'       => 'required',
        ]);
        if (empty($request->id)) {
            DB::table('babies')->insert([
                'name' => $request['name'],
                'user_id' => auth()->id(),
                'inseminationDate' => $request['inseminationDate'],
                'bloodGroup' => $request['bloodGroup'],
                'created_at' => now()
            ]);
        }else {
            DB::table('babies')->where('id', $request->id)->update([
                'name' => $request['name'],
                'inseminationDate' => $request['inseminationDate'],
                'bloodGroup' => $request['bloodGroup'],
                'updated_at' => now()
            ]);
        }
        DB::commit();

        return redirect()->route('test.baby')->with('message', 'Baby data has been saved.');
    }

    /**
     * Data generation for diet chart
     *
     * @return View
     */
    public function dietChart()
    {
        $baby = DB::table('babies')->where('user_id', auth()->id())->first();
        if ($baby) {
            if ($baby->inseminationDate) {
                $babyAge = Carbon::parse(Carbon::parse($baby->inseminationDate)->format('d-m-Y'))->diff(now()->format('d-m-Y'));
            }else {
                $babyAge = null;
            }
        }else {
            $babyAge = null;
        }

        $dietChartBn = [
//            [
//                'time' => 'Breakfast',
//                'food' => 'Rice / Wheat bread : 400g, Vegetables : 250g, Egg: 1 piece / Pulses : 250ml',
//            ],
            [
                'time' => 'সকালের নাস্তা',
                'food' => 'ভাত / গমের রুটি : ৪০০ গ্রাম, সবজি : ২৫০ গ্রাম, ডিম : একটি / ডাল : ২৫০ মিলিগ্রাম',
            ],
//            [
//                'time' => 'Breakfast (10-11am)',
//                'food' => 'Seasonal Fruit: 250g',
//            ],
            [
                'time' => 'নাস্তা (সকাল ১০-১১টা)',
                'food' => 'মৌসুমি ফল : ২৫০ গ্রাম',
            ],
//            [
//                'time' => 'Lunch',
//                'food' => 'Rice : 750g, Pulses : 250ml, Vegetables : 250g, Fish / Meat / Eggs : 120g',
//            ],
            [
                'time' => 'দুপুরের খাবার',
                'food' => 'ভাত : ৭৫০ গ্রাম, ডাল : ২৫০ মিলিগ্রাম, শাক সবজি : ২৫০ গ্রাম, মাছ / মাংস / ডিম : ১২০ গ্রাম',
            ],
//            [
//                'time' => 'Breakfast in The Afternoon',
//                'food' => 'Milk / DesArt : 250ml',
//            ],
            [
                'time' => 'বিকালের নাস্তা',
                'food' => 'দুধ/পায়েস/ফিরনি/পিঠা : ২৫০ মিলিগ্রাম',
            ],
//            [
//                'time' => 'Dinner',
//                'food' => 'Rice : 250g, Pulses : 250ml, Vegetables : 400g, Fish / Meat / Eggs : 120g',
//            ],
            [
                'time' => 'রাতের খাবার',
                'food' => 'ভাত : ৫০০ গ্রাম, ডাল : ২৫০ মিলিগ্রাম, শাক সবজি : ৪০০ গ্রাম, মাছ/মাংস/ডিম : ১২০ গ্রাম',
            ],
        ];

        return view('web.baby.diet-chart', compact('dietChartBn', 'baby', 'babyAge'));
    }
}
