<?php

namespace App\Http\Controllers\Backend\Dashboard\Categorization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorization\Group;
use App\Models\Categorization\Category;
use App\Models\Categorization\Subcategory;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with(['group','category'])->get();
        return view('dashboard.categorization.subcategory.subcategory_list', compact('subcategories'));
    }

    public function create()
    {
        $editRow = '';
        $groups = Group::where('status',true)->get();
        $categories = Category::where('status',true)->get();
        return view('dashboard.categorization.subcategory.subcategory_inputs', compact('editRow','groups','categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'group_id' => 'required',
            'category_id' => 'required'
        ]);

        $subcategory = new Subcategory;
        $subcategory->group_id = $request->group_id;
        $subcategory->categoryu_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = str_replace(' ','-',$request->name);
        $subcategory->short_details = $request->short_details;
        $subcategory->status = $request->status ? true : false;
        $subcategory->save();

        $subcategory->subcategory_code = substr(strtoupper($subcategory->name), 0,1).$subcategory->id;
        $subcategory->save();

        return redirect()->route('dashboard.subcategories.index')->with('message_success','Subcategory has been created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $editRow = Subcategory::find($id);
        $groups = Group::where('status',true)->get();
        $categories = Category::where('status',true)->get();
        return view('dashboard.categorization.subcategory.subcategory_inputs', compact('editRow','groups','categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'group_id' => 'required',
            'category_id' => 'required'
        ]);

        $subcategory = Subcategory::find($id);
        $subcategory->group_id = $request->group_id;
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = str_replace(' ','-',$request->name);
        $subcategory->short_details = $request->short_details;
        $subcategory->status = $request->status ? true : false;
        $subcategory->update();
        
        $subcategory->subcategory_code = substr(strtoupper($subcategory->name), 0,1).$subcategory->id;
        $subcategory->update();

        return redirect()->route('dashboard.subcategory.index')->with('message_success','Subcategory has been updated successfully.');
    }

    public function destroy($id)
    {
        //
    }
}