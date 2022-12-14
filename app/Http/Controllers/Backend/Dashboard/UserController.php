<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Valid constructor for user resource.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'dashboard']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|View
     */
    public function index()
    {
        $users = DB::table('users')->paginate(50);

        return view('dashboard.users.user_list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|View
     */
    public function create()
    {
        $editRow = null;

        return view('dashboard.users.user_inputs', compact('editRow'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return null
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'           => 'required|regex:/^[a-zA-Z0-9.,\s]+$/|min:3|max:100',
            'email'          => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'contact_number' => ['required', 'string', 'max:19', 'unique:users'],
        ]);

        $user = User::create([
            'name'           => $request['name'],
            'email'          => $request['email'],
            'contact_number' => $request['contact_number'],
            'password'       => Hash::make('password'),
            'status'         => !empty($request['status']) && $request['status'] === 'on' ? 'active' : 'inactive',
        ]);

        return redirect()->route('dashboard.users.index')->with('success', 'Users successfully created!');
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
        $editRow = DB::table('users')->find($id);

        return view('dashboard.users.user_inputs', compact('editRow'));
    }

    /**
     * Update specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return null
     * @throws ValidationException
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name'           => 'required|regex:/^[a-zA-Z0-9.,\s]+$/|min:3|max:100',
            'email'          => ['nullable', 'string', 'email', 'max:255'],
            'contact_number' => ['required', 'string', 'max:19'],
        ]);

        DB::table('users')->where('id', $id)->update([
            'name'           => $request['name'],
            'email'          => $request['email'],
            'contact_number' => $request['contact_number'],
            'status'         => !empty($request['status']) && $request['status'] === 'on' ? 'active' : 'inactive',
            'updated_at'     => Carbon::now(),
        ]);

        return redirect()->route('dashboard.users.index')->with('success', 'User has been successfully updated!');
    }

    /**
     * Update specified resource status.
     *
     * @param $id
     * @return null
     */
    public function updateStatus($id)
    {
        $user = DB::table('users')->find($id);
        if($user->status == 1) {
            DB::table('users')->where('id', $id)->update(['status' => 0]);
        }elseif($user->status == 0) {
            DB::table('users')->where('id', $id)->update(['status' => 1]);
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
        DB::table('users')->where('id', $id)->delete();

        return redirect()->back()->with('User has been deleted.');
    }
}
