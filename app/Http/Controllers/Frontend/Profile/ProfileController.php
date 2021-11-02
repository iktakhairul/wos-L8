<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile\Profile;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        return view('web.user.profile', compact('profile'));
    }
}
