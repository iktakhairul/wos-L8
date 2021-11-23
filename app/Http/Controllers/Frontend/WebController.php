<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class WebController extends Controller
{
    /**
     * Display public home page with data.
     *
     * @return View
     */
    public function index()
    {
        return view('web.home');
    }
}
