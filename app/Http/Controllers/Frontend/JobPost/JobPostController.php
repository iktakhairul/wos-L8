<?php

namespace App\Http\Controllers\Frontend\JobPost;

use App\Http\Controllers\Controller;
use App\Models\JobPost\JobPost;
use App\Models\JobPost\JobResponses;
use App\Models\JobPost\JobTimeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $job_posts = JobPost::with(['service_category', 'job_responses', 'user', 'job_timeline'])->where('user_id', auth()->user()['id'])
            ->where('status', '!=', 'inactive')->paginate(5);

        $my_orders = JobTimeline::where('job_post_user_id', auth()->user()['id'])->get();

        return view('web.job_post.my_job_post_list', compact('job_posts', 'my_orders'));
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

        return view('web.job_post.job_post_inputs', compact('editRow','service_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return null
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $start_datetime = new \DateTime($request['start_datetime'], new \DateTimeZone('Asia/Dhaka'));
        $end_datetime = new \DateTime($request['end_datetime'], new \DateTimeZone('Asia/Dhaka'));
        $address = explode(',', $request['address']);

        $this->validate($request, [
            'service_category_id'  => 'required|exists:service_categories,id',
            'title'                => 'required|string|min:3|max:250',
            'address'              => 'required|string',
            'city'                 => 'required',
            'start_datetime'       => 'required',
            'required_persons'     => 'required|numeric|gte:1',
            'budget'               => 'required',
        ]);

        $data = [
            'service_category_id' => $request['service_category_id'],
            'user_id'             => auth()->user()['id'],
            'type'                => $request['job_type'],
            'title'               => $request['title'],
            'description'         => $request['description'],
            'latitude'            => $request['latitude'],
            'longitude'           => $request['longitude'],
            'address'             => $request['address'],
            'city'                => $request['city'],
            'country'             => $request['country'] ?? str_replace(' ', '', end($address)),
            'start_datetime'      => $start_datetime,
            'end_datetime'        => $end_datetime,
            'required_persons'    => $request['required_persons'],
            'budget'              => $request['budget'],
            'tags'                => $request['tags'],
            'status'              => 'active',
            'created_at'          => now(),
        ];

        DB::table('job_posts')->insert($data);

        return redirect()->route('jobs.job-posts.index')->with('success', "Job Post successfully created!");
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

        return view('web.job_post.job_post_inputs', compact('editRow','service_categories'));
    }

    /**
     * Update specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return null
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($id, Request $request)
    {
        $start_datetime = new \DateTime($request['start_datetime'], new \DateTimeZone('Asia/Dhaka'));
        $end_datetime = new \DateTime($request['end_datetime'], new \DateTimeZone('Asia/Dhaka'));
        $address = explode(',', $request['address']);

        $this->validate($request, [
            'service_category_id'  => 'required|exists:service_categories,id',
            'title'                => 'required|string|min:3|max:250',
            'address'              => 'required|string',
            'start_datetime'       => 'required',
            'required_persons'     => 'required|numeric|gte:1',
            'budget'               => 'required',
        ]);

        $data = [
            'service_category_id' => $request['service_category_id'],
            'title'               => $request['title'],
            'type'                => $request['job_type'],
            'description'         => $request['description'],
            'latitude'            => $request['latitude'],
            'longitude'           => $request['longitude'],
            'address'             => $request['address'],
            'city'                => $request['city'],
            'country'             => $request['country'] ?? str_replace(' ', '', end($address)),
            'start_datetime'      => $start_datetime,
            'end_datetime'        => $end_datetime,
            'required_persons'    => $request['required_persons'],
            'budget'              => $request['budget'],
            'status'              => 'active',
            'updated_at'          => now(),
        ];

        DB::table('job_posts')->where('id',$id)->update($data);

        return redirect()->route('jobs.job-posts.index')->with('success', "Job Post has been successfully updated!");
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
        $job_post = null;
        $own_response = null;

        if (auth()->user()['complete_profile_status'] !== 'incomplete') {
            $job_post = JobPost::with(['service_category', 'user'])->where('id', $id)->first();
            $own_response = JobResponses::where('job_post_id', $id)->where('user_id', auth()->user()['id'])->first();
        }

        return view('web.job_post.submit_a_proposal_inputs', compact('job_post', 'own_response'));
    }

    /**
     * Turn off active my job post proposing status.
     *
     * @param $id
     * @return null
     * @throws null
     */
    public function stop_proposal($id)
    {
        DB::table('job_posts')->where('id', $id)->update(['status' => 'stop-proposing', 'updated_at' => now()]);

        return redirect()->back()->with('message', 'Stopped job posts proposal option for public workers');
    }
}