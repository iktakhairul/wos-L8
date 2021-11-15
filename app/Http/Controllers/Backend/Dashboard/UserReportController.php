<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class UserReportController extends Controller
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
    public function job_post_reports()
    {
        return view('dashboard.user-reports.active_job_post_report_list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function job_owner_reports()
    {
        return view('dashboard.user-reports.active_job_owner_report_list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function job_worker_reports()
    {
        return view('dashboard.user-reports.active_job_worker_report_list');
    }
}
