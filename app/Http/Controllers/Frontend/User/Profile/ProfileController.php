<?php

namespace App\Http\Controllers\Frontend\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile\Profile;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        return view('web.user.profile.profile', compact('profile'));
    }

    public function address()
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        return view('web.user.profile.address', compact('profile'));
    }

    public function selling()
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        return view('web.user.profile.selling', compact('profile'));
    }

    public function orders()
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        return view('web.user.profile.orders', compact('profile'));
    }

    public function wishlist()
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        return view('web.user.profile.wishlist', compact('profile'));
    }

    public function setting()
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        return view('web.user.profile.setting', compact('profile'));
    }

}
