<?php

namespace App\Http\Controllers\Frontend\User\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        return view('web.user.business.business_list');
    }

    public function create()
    {
        return view('web.user.business.business_inputs');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
}
