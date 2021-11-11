<?php

namespace App\Http\Controllers\Frontend\User\JobPost;

use App\Http\Controllers\Controller;
use App\Models\Profile\JobPost\JobPost;
use App\Models\Profile\JobPost\JobTimeline;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class JobTimelineController extends Controller
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
        $my_active_orders = JobTimeline::with('job_post')->where('job_post_user_id', auth()->user()['id'])->paginate(15);

        return view('web.user.job_post.job-timeline.my_job_timeline', compact( 'my_active_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create($id)
    {
        $editRow = null;
        $service_categories = DB::table('service_categories')->get();
        $job_post = 1;
        $job_response = 2;

        return view('web.user.job_post.send_proposal_to_worker', compact('editRow','service_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return null
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'job_post_id'  => 'required|numeric',
            'job_response_id'  => 'required|numeric',
            'comments'  => 'required',
        ]);

        $data = [
            'job_post_id'         => $request['job_post_id'],
            'job_response_id'     => $request['job_response_id'],
            'job_post_user_id'    => auth()->user()['id'],
            'comments'            => $request['comments'],
            'status'              => '1.place_order',
            'created_at'          => Carbon::now(),
        ];

        DB::table('job_timelines')->insert($data);

        return redirect()->route('profile.job-posts.index')->with('success', "Job order successfully placed.");
    }
    /**
     * Show the specified resource.
     *
     * @param $id
     * @return int
     */
    public function show($id)
    {
        $user = DB::table('job_timelines')->where('id', $id)->first();

        return 0;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return null
     */
    public function edit($id)
    {
        $user = DB::table('job_timelines')->find($id);

        return view("system.users.edit", compact('user'));
    }

    /**
     * Update specified resource in storage.
     *
     * @param $subdomain
     * @param Request $request
     * @return null
     */
    public function update($subdomain, Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|regex:/^[a-zA-Z0-9.,\s]+$/|min:3|max:100',
            'email' => 'required|email',
            'domain' => 'required',
            'role'   => 'required',
            'weight' => 'required',
        ]);

        $data = [
            'name'       => $request['name'],
            'email'      => $request['email'],
            'password'   => Hash::make('admin'),
            'domain'     => $request['domain'],
            'role'       => $request['role'],
            'weight'     => $request['weight'],
            'status'     => $request['status'],
            'updated_at' => Carbon::now(),
        ];

        DB::table('job_timelines')->where('id',$request['id'])->update($data);

        return redirect()->route('system.users.index')->with('success', "Job timeline has been successfully updated!");
    }

    /**
     * Update specified resource status.
     *
     * @param $id
     * @return null
     */
    public function update_status($id)
    {
        $user = DB::table('job_posts')->find($id);

        if($user->status === 'active')
        {
            DB::table('job_timelines')->where('id', $id)->update(['status' => 'inactive']);
        }elseif($user->status === 'inactive')
        {
            DB::table('job_timelines')->where('id', $id)->update(['status' => 'active']);
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
        DB::table('job_timelines')->where('id', $id)->delete();

        return redirect()->back()->with('Job timeline has been deleted.');
    }
}
