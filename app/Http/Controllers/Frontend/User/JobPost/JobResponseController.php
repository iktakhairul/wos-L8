<?php

namespace App\Http\Controllers\Frontend\User\JobPost;

use App\Http\Controllers\Controller;
use App\Models\Profile\JobPost\JobResponses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class JobResponseController extends Controller
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

        return view('web.user.job_post.job_post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create_proposal_for_worker($id)
    {
        $job_response = JobResponses::with('job_post')->where('id', $id)->first();
        $service_categories = DB::table('service_categories')->get();
        $editRow = null;

        return view('web.user.job_post.send_proposal_to_worker', compact('job_response','editRow','service_categories'));
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
            'demanded_budget'  => 'required|numeric',
        ]);

        $data = [
            'service_category_id' => $request['service_category_id'],
            'job_post_id'         => $request['job_post_id'],
            'user_id'             => auth()->user()['id'],
            'description'         => $request['description'],
            'demanded_budget'     => $request['demanded_budget'],
            'status'              => 'active',
            'created_at'          => Carbon::now(),
        ];

        DB::table('job_responses')->insert($data);

        return redirect()->back()->with('success', "Job Post successfully created!");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return null
     */
    public function edit($id)
    {
        $user = DB::table('job_responses')->find($id);

        return view("system.users.edit", compact('user'));
    }

    /**
     * Update specified resource in storage.
     *
     * @param $subdomain
     * @param Request $request
     * @return null
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'demanded_budget'  => 'required|numeric',
        ]);

        $data = [
            'service_category_id' => $request['service_category_id'],
            'job_post_id'         => $request['job_post_id'],
            'user_id'             => auth()->user()['id'],
            'description'         => $request['description'],
            'demanded_budget'     => $request['demanded_budget'],
            'status'              => 'active',
            'created_at'          => Carbon::now(),
        ];

        DB::table('job_responses')->where('id', $id)->update($data);

        return redirect()->back()->with('success', "Job Post has been successfully updated!");
    }

    /**
     * Update specified resource status.
     *
     * @param $id
     * @return null
     */
    public function update_status($id)
    {
        $user = DB::table('job_responses')->find($id);

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
        DB::table('job_responses')->where('id', $id)->delete();

        return redirect()->back()->with('Job Post has been deleted.');
    }
}
