<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorization\Group;
use App\Models\Categorization\Category;
use App\Models\Categorization\Subcategory;

class TestController extends Controller
{
    public function dashboard()
    {

        return view('system.dashboard');
    }
}
