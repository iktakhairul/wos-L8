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
        $my_active_job_posts = JobPost::with('job_responses', 'job_timeline')
            ->whereHas('job_timeline', function($query){$query->where('status', '!=', 'complete');})
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
        DB::table('job_responses')->where('id',$request['job_response_id'])->update(['status' => '1.confirm_order']);

        return redirect()->route('profile.job-posts.index')->with('success', "Job order successfully placed.");
    }

    /**
     * Start working from worker.
     *
     * @return null
     */
    public function start_working($id)
    {
        DB::table('job_timelines')->where('id', $id)->update(['status' => '2.start_working']);

        return redirect()->back()->with('message', 'Proposal reconfirmed.');
    }

    /**
     * Work done from worker.
     *
     * @return null
     */
    public function done_the_job($id)
    {

        DB::table('job_timelines')->where('id', $id)->update(['status' => '3.work_done_from_worker']);

        return redirect()->back()->with('message', 'Proposal reconfirmed.');
    }

    /**
     * Work done from owner.
     *
     * @return null
     */
    public function work_done_from_owner($id)
    {
        DB::table('job_timelines')->where('id', $id)->update(['status' => '3.work_done_from_owner']);

        return redirect()->back()->with('message', 'Proposal reconfirmed.');
    }

    /**
     * Payment owner to worker.
     *
     * @return null
     */
    public function payment_done_from_owner($id)
    {
        DB::table('job_timelines')->where('id', $id)->update(['status' => '4.payment_done_from_owner']);

        return redirect()->back()->with('message', 'Proposal reconfirmed.');
    }

    /**
     * Payment owner to worker.
     *
     * @return null
     */
    public function payment_confirmation_from_worker($id)
    {
        DB::table('job_timelines')->where('id', $id)->update(['status' => '4.payment_confirmed_by_worker']);

        return redirect()->back()->with('message', 'Proposal reconfirmed.');
    }

    /**
     * Ratings and comments to worker.
     *
     * @param Request $request
     * @return null
     */
    public function ratings_and_comments_to_worker(Request $request)
    {
        dd($request->all());
        return redirect()->back()->with('message', 'Proposal reconfirmed.');
    }

    /**
     * Ratings and comments to job owner.
     *
     * @param Request $request
     * @return null
     */
    public function ratings_and_comments_to_owner(Request $request)
    {
        dd($request->all());
        return redirect()->back()->with('message', 'Proposal reconfirmed.');
    }
}
