<?php

namespace App\Http\Controllers\Frontend\User\JobPost;

use App\Http\Controllers\Controller;
use App\Models\Profile\JobPost\JobPost;
use App\Models\Profile\JobPost\JobResponses;
use App\Models\Profile\JobPost\ServiceCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class JobPostController extends Controller
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
     * Display a job post contents.
     *
     * @return View
     */
    public function job_post()
    {
        return view('web.user.job_post.job_post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $job_posts = JobPost::with(['service_category', 'job_responses', 'user'])->where('user_id', auth()->user()['id'])
            ->where('status', 'active')->paginate(5);

        return view('web.user.job_post.job_post_list', compact('job_posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return View
     */
    public function find_job_posts()
    {
        $available_job_posts = JobPost::with(['service_category', 'job_responses', 'user'])->where('user_id', '!=', auth()->user()['id'])
            ->where('status', 'active')
            ->paginate(15);

        $own_responses = JobResponses::where('user_id', auth()->user()['id'])->get();

        $service_categories = ServiceCategory::select('id', 'name')->where('status', 1)->get();

        return view('web.user.job_post.find_job_posts_result', compact('available_job_posts', 'service_categories', 'own_responses'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return View
     */
    public function find_job_post_by_filter($id)
    {
        $available_job_posts = JobPost::with(['service_category', 'job_responses', 'user'])->where('user_id', '!=', auth()->user()['id'])
            ->where('service_category_id', $id)
            ->where('status', 'active')
            ->paginate(15);

        $service_categories = ServiceCategory::select('id', 'name')->where('status', 1)->get();

        return view('web.user.job_post.find_job_posts_result', compact('available_job_posts', 'service_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        $editRow = null;
        $service_categories = DB::table('service_categories')->get();

        return view('web.user.job_post.job_post_inputs', compact('editRow','service_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return null
     */
    public function store(Request $request)
    {
        $start_datetime = new \DateTime($request['start_datetime'], new \DateTimeZone('Asia/Dhaka'));
        $end_datetime = new \DateTime($request['end_datetime'], new \DateTimeZone('Asia/Dhaka'));
        $start_datetime->format('d-m-Y  H:i A');
        $end_datetime->format('d-m-Y  H:i A');

        dd($request->all());
        $this->validate($request, [
            'name'  => 'required|regex:/^[a-zA-Z0-9.,\s]+$/|min:3|max:100',
            'email'  => 'required|email|unique:users',
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
            'created_at' => Carbon::now(),
        ];

        DB::table('job_posts')->insert($data);

        return redirect()->route('system.users.index')->with('success', "Job Post successfully created!");
    }

    /**
     * Show the specified resource.
     *
     * @param $id
     * @return int
     */
    public function show($id)
    {
        $user = DB::table('job_posts')->where('id', $id)->first();

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
        $editRow = DB::table('job_posts')->find($id);
        $service_categories = DB::table('service_categories')->get();

        return view('web.user.job_post.job_post_inputs', compact('editRow','service_categories'));
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

        DB::table('job_posts')->where('id',$request['id'])->update($data);

        return redirect()->route('system.users.index')->with('success', "Job Post has been successfully updated!");
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
            DB::table('service_categories')->where('id', $id)->update(['status' => 'inactive']);
        }elseif($user->status === 'inactive')
        {
            DB::table('service_categories')->where('id', $id)->update(['status' => 'active']);
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
        DB::table('job_posts')->where('id', $id)->delete();

        return redirect()->back()->with('Job Post has been deleted.');
    }

    /**
     * Show the form for creating a new job post's submit a proposal.
     *
     * @return view
     */
    public function submit_a_proposal($id)
    {
        $job_post = JobPost::with(['service_category', 'user'])->find($id);
        $own_response = JobResponses::where('job_post_id', $id)->where('user_id', auth()->user()['id'])->first();

        return view('web.user.job_post.submit_a_proposal_inputs', compact('job_post', 'own_response'));
    }
}
