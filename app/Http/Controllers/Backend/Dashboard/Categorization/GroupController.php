<?php

namespace App\Http\Controllers\Backend\Dashboard\Categorization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorization\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::get();
        return view('dashboard.categorization.group.group_list', compact('groups'));
    }

    public function create()
    {
        $editRow = '';
        return view('dashboard.categorization.group.group_inputs', compact('editRow'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $group = new Group;
        $group->name = $request->name;
        $group->slug = str_replace(' ','-',$request->name);
        $group->short_details = $request->short_details;
        $group->status = $request->status ? true : false;
        $group->save();

        $group->group_code = substr(strtoupper($group->name), 0,1).$group->id;
        $group->save();

        return redirect()->route('dashboard.groups.index')->with('message_success','Group has been created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $editRow = Group::find($id);
        return view('dashboard.categorization.group.group_inputs', compact('editRow'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $group = Group::find($id);
        $group->name = $request->name;
        $group->slug = str_replace(' ','-',$request->name);
        $group->short_details = $request->short_details;
        $group->status = $request->status ? true : false;
        $group->update();
        
        $group->group_code = substr(strtoupper($group->name), 0,1).$group->id;
        $group->update();

        return redirect()->route('dashboard.groups.index')->with('message_success','Group has been updated successfully.');
    }

    public function destroy($id)
    {
        //
    }
}