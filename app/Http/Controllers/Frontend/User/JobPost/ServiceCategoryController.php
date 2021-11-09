<?php

namespace App\Http\Controllers\Frontend\User\JobPost;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $users = DB::table('service_categories')->get();

        return view('web.user.business.business_list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        return view("system.users.create");
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
            'name'  => 'required|regex:/^[a-zA-Z0-9.,\s]+$/|min:3|max:100',
            'email'  => 'required|email|unique:users',
            'domain' => 'required',
            'role'   => 'required',
            'weight' => 'required',
        ]);

        $data = [
            'name'       => $request['name'],
            'email'      => $request['email'],
            'password'   => Hash::make('admin'),
            'domain'     => $request['domain'],
            'role'       => $request['role'],
            'weight'     => $request['weight'],
            'status'     => $request['status'],
            'created_at' => Carbon::now(),
        ];

        DB::table('service_categories')->insert($data);

        return redirect()->route('system.users.index')->with('success', "Service category successfully created!");
    }
    /**
     * Show the specified resource.
     *
     * @param $id
     * @return int
     */
    public function show($id)
    {
        $user = DB::table('service_categories')->where('id', $id)->first();

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
        $user = DB::table('service_categories')->find($id);

        return view("system.users.edit", compact('user'));
    }

    /**
     * Update specified resource in storage.
     *
     * @param $subdomain
     * @param Request $request
     * @return null
     */
    public function update($subdomain, Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|regex:/^[a-zA-Z0-9.,\s]+$/|min:3|max:100',
            'email' => 'required|email',
            'domain' => 'required',
            'role'   => 'required',
            'weight' => 'required',
        ]);

        $data = [
            'name'       => $request['name'],
            'email'      => $request['email'],
            'password'   => Hash::make('admin'),
            'domain'     => $request['domain'],
            'role'       => $request['role'],
            'weight'     => $request['weight'],
            'status'     => $request['status'],
            'updated_at' => Carbon::now(),
        ];

        DB::table('service_categories')->where('id',$request['id'])->update($data);

        return redirect()->route('system.users.index')->with('success', "Service category has been successfully updated!");
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

        if($user->status === 'active')
        {
            DB::table('service_categories')->where('id', $id)->update(['status' => 'inactive']);
        }elseif($user->status === 'inactive')
        {
            DB::table('service_categories')->where('id', $id)->update(['status' => 'active']);
        }

        return back();
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
}
