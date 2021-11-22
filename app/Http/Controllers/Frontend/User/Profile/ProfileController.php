<?php

namespace App\Http\Controllers\Frontend\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = User::with('profile')->where('id', Auth::user()['id'])->first();

        return view('web.user.profile.profile', compact('user'));
    }
}
