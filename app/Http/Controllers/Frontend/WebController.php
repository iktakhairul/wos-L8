<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class WebController extends Controller
{
    /**
     * Display public home page with data.
     *
     * @return RedirectResponse
     */
    public function index()
    {
        return redirect()->route('baby.index');
    }
}
