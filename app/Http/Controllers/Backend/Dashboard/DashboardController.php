<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'dashboard']);
    }

    /**
     * Return dashboard view
     * @return View
     */
    public function dashboard()
    {
    	return view('dashboard.dashboard');
    }
}
