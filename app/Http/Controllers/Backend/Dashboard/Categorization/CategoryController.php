<?php

namespace App\Http\Controllers\Backend\Dashboard\Categorization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorization\Group;
use App\Models\Categorization\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('dashboard.categorization.category.category_list', compact('categories'));
    }

    public function create()
    {
        $editRow = '';
        $groups = Group::where('status',true)->get();
        return view('dashboard.categorization.category.category_inputs', compact('editRow','groups'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'group_id' => 'required'
        ]);

        $category = new Category;
        $category->group_id = $request->group_id;
        $category->name = $request->name;
        $category->slug = str_replace(' ','-',$request->name);
        $category->short_details = $request->short_details;
        $category->status = $request->status ? true : false;
        $category->save();

        $category->category_code = substr(strtoupper($category->name), 0,1).$category->id;
        $category->save();

        return redirect()->route('dashboard.categories.index')->with('message_success','category has been created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $editRow = Category::find($id);
        $groups = Group::where('status',true)->get();
        return view('dashboard.categorization.category.category_inputs', compact('editRow','groups'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'group_id' => 'required'
        ]);

        $category = Category::find($id);
        $category->group_id = $request->group_id;
        $category->name = $request->name;
        $category->slug = str_replace(' ','-',$request->name);
        $category->short_details = $request->short_details;
        $category->status = $request->status ? true : false;
        $category->update();
        
        $category->category_code = substr(strtoupper($category->name), 0,1).$category->id;
        $category->update();

        return redirect()->route('dashboard.category.index')->with('message_success','Category has been updated successfully.');
    }

    public function destroy($id)
    {
        //
    }
}