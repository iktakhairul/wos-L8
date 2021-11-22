<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ServiceCategoryController extends Controller
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
        $serviceCategories = DB::table('service_categories')->get();

        return view('dashboard.service-categories.service_category_list', compact('serviceCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        $editRow = null;

        return view('dashboard.service-categories.service_category_inputs', compact('editRow'));
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
            'name'          => 'required|regex:/^[a-zA-Z0-9.,\s]+$/|min:3|max:100',
            'service_code'  => 'required',
        ]);

        $data = [
            'name'         => $request['name'],
            'slug'         => 'FJ-SC-'.$request['name'].'-'.$request['service_code'],
            'service_code' => $request['service_code'],
            'status'       => !empty($request['status']) && $request['status'] === 'on' ? 1 : 0,
            'created_at'   => Carbon::now(),
        ];

        DB::table('service_categories')->insert($data);

        return redirect()->route('dashboard.service-categories.index')->with('success', "Service category successfully created!");
    }
    /**
     * Show the specified resource.
     *
     * @param $id
     * @return int
     */
    public function show($id)
    {
        return 0;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return null
     */
    public function edit($id)
    {
        $editRow = DB::table('service_categories')->find($id);

        return view('dashboard.service-categories.service_category_inputs', compact('editRow'));
    }

    /**
     * Update specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return null
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|regex:/^[a-zA-Z0-9.,\s]+$/|min:3|max:100',
            'service_code'  => 'required',
        ]);

        DB::table('service_categories')->where('id', $id)->update([
            'name'         => $request['name'],
            'slug'         => 'FJ-SC-'.$request['name'].'-'.$request['service_code'],
            'service_code' => $request['service_code'],
            'status'       => !empty($request['status']) && $request['status'] === 'on' ? 1 : 0,
            'updated_at'   => Carbon::now(),
        ]);

        return redirect()->route('dashboard.service-categories.index')->with('success', "Service category successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return null
     */
    public function destroy($id)
    {
        DB::table('service_categories')->where('id', $id)->delete();

        return redirect()->back()->with('Service category has been deleted.');
    }

    /**
     * Update specified resource status.
     *
     * @param $id
     * @return null
     */
    public function update_status($id)
    {
        $user = DB::table('service_categories')->find($id);

        if($user->status === 1)
        {
            DB::table('service_categories')->where('id', $id)->update(['status' => 0]);
        }elseif($user->status === 0)
        {
            DB::table('service_categories')->where('id', $id)->update(['status' => 1]);
        }

        return back();
    }
}
