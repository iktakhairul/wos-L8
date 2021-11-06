<?php

namespace App\Http\Controllers\Frontend\User\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Business\Business;
use App\Models\Business\Shop\Shop;
use App\Models\Business\Shop\ShopUser;

class BusinessController extends Controller
{
    public function __construct() {

        $this->middleware('business', ['only' => ['edit','show','delete']]);
    }

    public function index()
    {
        $businesses = Business::where('user_id',Auth::user()->id)->get();
        return view('web.user.business.business_list', compact('businesses'));
    }

    public function create()
    {
        return view('web.user.business.business_inputs');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'business_name' => 'required',
            'owner_type' => 'required',
            'business_type' => 'required',
            'shop_contact_numbers' => 'required',
            'shop_email' => 'nullable',
            'shop_type' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'thana_id' => 'required',
            'postal_code' => 'required',
            'address' => 'required',
            'map_location' => 'nullable',
        ]);

        $business = new Business;
        $business->user_id = Auth::user()->id;
        $business->business_name = $request->business_name;
        $business->slug = str_replace(' ', '-', strtolower($request->business_name));
        $business->owner_type = $request->owner_type;
        $business->business_type = strtolower($request->business_type);
        $business->status = 'ACTIVE';
        $business->save();

        $shop = new Shop;
        $shop->user_id = Auth::user()->id;
        $shop->business_id = $business->id;
        $shop->shop_name = $request->shop_name ? $request->shop_name : $business->business_name ;
        $shop->type = $request->shop_type;
        $shop->shop_contact_numbers = implode(',', $request->shop_contact_numbers);
        $shop->shop_email = $request->shop_email;
        $shop->division_id = $request->division_id;
        $shop->district_id = $request->district_id;
        $shop->thana_id = $request->thana_id;
        $shop->postal_code = $request->postal_code;
        $shop->address = $request->address;
        $shop->map_location = $request->map_location;
        $business->status = 'ACTIVE';
        $shop->save();

        $shop_user = new ShopUser;
        $shop_user->user_id = Auth::user()->id;
        $shop_user->shop_id = $shop->id;
        $shop_user->role = 'owner';
        $shop_user->permissions = 'all';
        $shop_user->status = 'active';
        $shop_user->save();

        return redirect()->route('profile.businesses.index')->with('message_success','Business has been created successfully.');
    }

    public function show($id)
    {
        if(check_business_user($id))
        {
            $business = Business::with(['shop'])->find($id);
            return view('web.user.business.business_details',compact('business'));
        }else{
            return redirect()->back()->with('message_warning','Sorry, you are not permitted!.');
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
}
