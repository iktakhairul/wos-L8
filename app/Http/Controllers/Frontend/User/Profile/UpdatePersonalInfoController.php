<?php

namespace App\Http\Controllers\Frontend\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdatePersonalInfoController extends Controller
{
    /**
     * Valid constructor for user resource.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Profiles present info upgrade.
     *
     * @param $id
     * @return null
     */
    public function edit_present_info($id)
    {
        $editRow = DB::table('profiles')->find($id);

        return view('web.user.job_post.profile_present_info_inputs', compact('editRow'));
    }

    /**
     * Update profiles present info.
     *
     * @param Request $request
     * @return null
     */
    public function update_present_info(Request $request)
    {
        $this->validate($request, [
            'address' => 'required|string',
            'city'    => 'required|string',
            'country' => 'required|string',
        ]);
        $addressArray = explode(',', $request['address']);

        DB::table('profiles')->where('user_id', auth()->user()['id'])->update([
            'present_latitude'  => $request['latitude'],
            'present_longitude' => $request['longitude'],
            'present_city'      => $request['city'],
            'present_country'   => $request['country'] ?? str_replace(' ', '', end($addressArray)),
            'present_address'   => $request['address'],
            'updated_at'        => now(),
        ]);

        DB::table('users')->where('id', auth()->user()['id'])->update(['complete_profile_status' => 'present_info_only']);

        return redirect()->route('jobs.find-jobs')->with('success', 'Job Post successfully created!');
    }

}
