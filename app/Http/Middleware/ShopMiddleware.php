<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ShopMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $shops = DB::table('shops')->where('user_id',Auth::user()->id)->where('business_id',$request->route('businessId'))->pluck('id')->toArray();
        if (in_array($request->route('id'), $shops))
        {
            return $next($request);
        }
        return redirect('/')->with('message_warning','Sorry, you are not permitted to enter here. Please contact to your System Admin.');
    }
}
