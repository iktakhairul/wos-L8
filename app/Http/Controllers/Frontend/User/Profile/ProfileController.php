<?php

namespace App\Http\Controllers\Frontend\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Display User Profile Overview.
     *
     * @return View
     */

    public function profile()
    {
        $user = User::with('user_profile')->where('id', Auth::user()['id'])->first();

        return view('web.user.profile.profile', compact('user'));
    }

    /**
     * Update specified resource in storage.
     *
     * @param Request $request
     * @return null
     * @throws ValidationException
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'fullName'      => 'required|string|min:3|max:160',
            'name'          => 'required|string|min:3|max:100',
            'email'         => 'required|email|unique:users,email,'.$id,
            'contactNumber' => 'required|min:8|max:20|unique:users,contact_number,'.$id,
            'fatherName'    => 'string',
            'motherName'    => 'string',
            'dob'           => 'required|date_format:Y-m-d|before:today',
            'gender'        => 'required',
        ]);

        DB::beginTransaction();

        DB::table('users')->where('id', $id)->update([
            'name'           => $request['name'],
            'email'          => $request['email'],
            'contact_number' => $request['contactNumber'],
            'updated_at'     => now(),
        ]);

        DB::table('profiles')->where('user_id', $id)->update([
            'full_name'   => $request['fullName'],
            'father_name' => $request['fatherName'],
            'mother_name' => $request['motherName'],
            'dob'         => $request['dob'],
            'gender'      => $request['gender'],
            'updated_at'  => now(),
        ]);

        DB::commit();

        return redirect()->back()->with('message', 'Profile has been successfully updated!');
    }
}
