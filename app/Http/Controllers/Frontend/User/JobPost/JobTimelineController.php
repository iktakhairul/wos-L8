<?php

namespace App\Http\Controllers\Frontend\User\JobPost;

use App\Http\Controllers\Controller;
use App\Models\Profile\JobPost\JobPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $my_active_job_posts = JobPost::with('job_responses', 'job_timeline', 'user_ratings')
            ->whereHas('job_timeline', function($query){$query->where('status', '!=', 'inactive');})
            ->where('user_id', auth()->user()['id'])->where('status', '!=', 'inactive')->paginate(5);

        return view('web.user.job_post.job-timeline.my_job_timeline', compact( 'my_active_job_posts'));
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
            'job_worker_user_id'  => $request['job_worker_user_id'],
            'comments'            => $request['comments'],
            'status'              => '1.place_order',
            'created_at'          => Carbon::now(),
        ];

        DB::table('job_timelines')->insert($data);
        DB::table('job_responses')->where('id',$request['job_response_id'])->update(['status' => '1.confirm_order', 'updated_at' => now()]);

        return redirect()->route('jobs.job-posts.index')->with('success', "Job order successfully placed.");
    }

    /**
     * Start working from worker.
     *
     * @return null
     */
    public function start_working($id)
    {
        DB::table('job_timelines')->where('id', $id)->update(['status' => '2.start_working', 'updated_at' => now()]);

        return redirect()->back()->with('message', 'Start working');
    }

    /**
     * Work done from worker.
     *
     * @return null
     */
    public function done_the_job($id)
    {

        DB::table('job_timelines')->where('id', $id)->update(['status' => '3.work_done_from_worker', 'updated_at' => now()]);

        return redirect()->back()->with('message', 'Work done from worker, need confirmation.');
    }

    /**
     * Work done from owner.
     *
     * @return null
     */
    public function work_done_from_owner($id)
    {
        DB::table('job_timelines')->where('id', $id)->update(['status' => '3.work_done_from_owner', 'updated_at' => now()]);

        return redirect()->back()->with('message', 'Work done confirmed by job owner.');
    }

    /**
     * Payment owner to worker.
     *
     * @return null
     */
    public function payment_done_from_owner($id)
    {
        DB::table('job_timelines')->where('id', $id)->update(['status' => '4.payment_done_from_owner', 'updated_at' => now()]);

        return redirect()->back()->with('message', 'Payment done from owner, need confirmation.');
    }

    /**
     * Payment owner to worker.
     *
     * @return null
     */
    public function payment_confirmation_from_worker($id)
    {
        DB::table('job_timelines')->where('id', $id)->update(['status' => '4.payment_confirmed_by_worker', 'updated_at' => now()]);

        return redirect()->back()->with('message', 'Payment confirmed by worker.');
    }

    /**
     * Ratings and comments to worker.
     *
     * @param Request $request
     * @return null
     */
    public function ratings_and_comments_to_worker(Request $request)
    {
        $this->validate($request, [
            'job_timeline_id'    => 'required|numeric',
            'job_worker_user_id' => 'required|numeric',
            'job_post_id'        => 'required|numeric',
            'comments'           => 'required',
            'ratings'            => 'required',
        ]);

        $data = [
            'job_post_id'        => $request['job_post_id'],
            'job_timeline_id'    => $request['job_timeline_id'],
            'job_post_user_id'   => auth()->user()['id'],
            'job_worker_user_id' => $request['job_worker_user_id'],
            'type'               => 'job_worker',
            'comments'           => $request['comments'],
            'ratings'            => $request['ratings'],
            'created_at'         => now(),
        ];

        DB::table('ratings')->insert($data);
        DB::table('job_timelines')->where('id', $request['job_timeline_id'])->update(['status' => '5.complete_from_owner', 'updated_at' => now()]);

        return redirect()->back()->with('message', 'Thank you, this job has been completed.');
    }

    /**
     * Ratings and comments to job owner.
     *
     * @param Request $request
     * @return null
     */
    public function ratings_and_comments_to_owner(Request $request)
    {
        $this->validate($request, [
            'job_timeline_id'    => 'required|numeric',
            'job_post_user_id'   => 'required|numeric',
            'job_post_id'        => 'required|numeric',
            'comments'           => 'required',
            'ratings'            => 'required',
        ]);

        $data = [
            'job_post_id'        => $request['job_post_id'],
            'job_timeline_id'    => $request['job_timeline_id'],
            'job_post_user_id'   => $request['job_post_user_id'],
            'job_worker_user_id' => auth()->user()['id'],
            'type'               => 'job_owner',
            'comments'           => $request['comments'],
            'ratings'            => $request['ratings'],
            'created_at'         => now(),
        ];

        DB::table('ratings')->insert($data);
        DB::table('job_timelines')->where('id', $request['job_timeline_id'])->update(['status' => '5.complete_from_worker', 'updated_at' => now()]);

        return redirect()->back()->with('message', 'Thank you, this job has been completed.');
    }
}
