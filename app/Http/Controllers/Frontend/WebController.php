<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobPost\JobPost;
use App\Models\Profile\Profile;

class WebController extends Controller
{
    /**
     * Display public home page with data.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $topFeaturedJobs = JobPost::with('user','service_category','job_responses')
            ->where('status', 'active')->orderBy('budget', 'desc')->take(6)->get();
        $topEmployers = Profile::with('user')->orderBy('ratings', 'desc')->take(4)->get();

        return view('web.home', compact('topFeaturedJobs','topEmployers'));
    }
}
