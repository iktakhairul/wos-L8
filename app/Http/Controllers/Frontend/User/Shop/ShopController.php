<?php

namespace App\Http\Controllers\Frontend\User\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Business\Shop\Shop;

class ShopController extends Controller
{
    public function index($businessId, $id)
    {
        $shop = Shop::select('id','user_id','business_id','shop_name','type','shop_contact_numbers','shop_email','division_id','district_id','thana_id','postal_code','address','shop_code','map_location')->with(['business','division','district','thana'])->find($id);
        return view('web.user.shop.dashboard', compact('businessId','id','shop'));
    }

    public function settings($businessId, $id)
    {
        //return groups();
        $shop = Shop::select('id','user_id','business_id','shop_name','type','shop_contact_numbers','shop_email','division_id','district_id','thana_id','postal_code','address','shop_code','map_location')->with(['business','division','district','thana'])->find($id);
        return view('web.user.shop.settings', compact('businessId','id','shop'));
    }
}
