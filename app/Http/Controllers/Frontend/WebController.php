<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobPost\JobPost;
use Illuminate\View\View;

class WebController extends Controller
{
    /**
     * Display public home page with data.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $topFeaturedJobs = JobPost::all();
        return view('web.home', compact('topFeaturedJobs'));
    }
}
