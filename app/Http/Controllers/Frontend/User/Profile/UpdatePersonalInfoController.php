<?php

namespace App\Http\Controllers\Frontend\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\File;

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

        return view('web.job_post.profile_present_info_inputs', compact('editRow'));
    }

    /**
     * Update profiles present info.
     *
     * @param Request $request
     * @return null
     * @throws ValidationException
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

    /**
     * Update profiles present info.
     *
     * @param Request $request
     * @return null
     * @throws ValidationException
     */

    public function updateProfilePicture($id, Request $request)
    {
        $this->validate($request, [
            'profileImage' => 'required|nullable|mimes:jpeg,png,jpg,webp,svg|max:2024',
        ]);

        DB::beginTransaction();
        $profile = DB::table('profiles')->where('user_id', $id)->first();
        if ($request->hasFile('profileImage')) {
            if (File::exists(public_path().'/images/profile/' . $profile->profileImage)) {
                File::delete(public_path().'/images/profile/' . $profile->profileImage);
            }
            $profileImage = $request->file('profileImage');
            $profileImageName = 'profile-image-'. time() .".". $profileImage->extension();
            $profileImage->move(public_path('/images/profile'), $profileImageName);

            DB::table('profiles')->where('user_id', $id)->update([
                'profileImage' => $profileImageName,
                'updated_at'   => now(),
            ]);
        }
        DB::commit();

        return redirect()->back()->with('message', 'Profile has been updated successfully!');
    }

    /**
     * Update profiles present info.
     *
     * @param Request $request
     * @return null
     * @throws ValidationException
     */
    public function updateDocuments($id, Request $request)
    {
        $this->validate($request, [
            'birthCertificate' => 'required|nullable|mimes:jpeg,png,jpg,webp,svg|max:2024',
        ]);

        DB::beginTransaction();
        $profile = DB::table('profiles')->where('user_id', $id)->first();
        if ($request->hasFile('birthCertificate')) {
            if (File::exists(public_path().'/images/dob/' . $profile->birthCertificate)) {
                File::delete(public_path().'/images/dob/' . $profile->birthCertificate);
            }
            $birthCertificateImage = $request->file('birthCertificate');
            $birthCertificateImageName = 'birth-certificate-'. time() .".". $birthCertificateImage->extension();
            $birthCertificateImage->move(public_path('/images/dob'), $birthCertificateImageName);

            DB::table('profiles')->where('user_id', $id)->update([
                'birthCertificate' => $birthCertificateImageName,
                'updated_at' => now(),
            ]);
        }

        DB::commit();

        return redirect()->back()->with('message', 'Profile has been updated successfully!');
    }

    /**
     * Update profiles present info.
     *
     * @param $id
     * @param Request $request
     * @return null
     * @throws ValidationException
     */
    public function updateSkills($id, Request $request)
    {
        $this->validate($request, [
            'tags'    => 'required|string',
        ]);

        DB::table('profiles')->where('user_id', auth()->user()['id'])->update([
            'tags'       => $request['tags'],
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('message', 'Profile skills successfully updated!');
    }

}
