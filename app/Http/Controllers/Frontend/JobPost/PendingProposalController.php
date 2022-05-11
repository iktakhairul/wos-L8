<?php

namespace App\Http\Controllers\Frontend\JobPost;

use App\Http\Controllers\Controller;
use App\Models\JobPost\JobResponses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PendingProposalController extends Controller
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
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $my_pending_proposals = JobResponses::with('job_post')
            ->where('user_id', auth()->user()['id'])->where('status','active')->paginate(15);

        return view('web.job_post.pending.my_pending_proposals', compact( 'my_pending_proposals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return null
     */
    public function edit($id)
    {
        $services_categories = DB::table('services_categories')->find($id);

        return view("system.users.edit", compact('services_categories'));
    }

    /**
     * Update specified resource in storage.
     *
     * @param Request $request
     * @return null
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|regex:/^[a-zA-Z0-9.,\s]+$/|min:3|max:100',
        ]);

        $data = [
            'updated_at' => Carbon::now(),
        ];

        DB::table('services_categories')->where('id',$request['id'])->update($data);

        return redirect()->route('system.users.index')->with('success', "Job service category has been successfully updated!");
    }

    /**
     * Update specified resource status.
     *
     * @param $id
     * @return null
     */
    public function update_status($id)
    {
        $user = DB::table('services_categories')->find($id);

        if($user->status === 'active')
        {
            DB::table('services_categories')->where('id', $id)->update(['status' => 'inactive']);
        }elseif($user->status === 'inactive')
        {
            DB::table('services_categories')->where('id', $id)->update(['status' => 'active']);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return null
     */
    public function destroy($id)
    {
        DB::table('services_categories')->where('id', $id)->delete();

        return redirect()->back()->with('Job service category has been deleted.');
    }
}
