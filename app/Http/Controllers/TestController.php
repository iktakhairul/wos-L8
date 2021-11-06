<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorization\Group;
use App\Models\Categorization\Category;
use App\Models\Categorization\Subcategory;

class TestController extends Controller
{
    public function set_categories()
    {
        // Group::truncate();
        // Category::truncate();
        // Subcategory::truncate();

        // $groups = groupArray();
        
        // $counterG = $counterC = $counterS = 0;

        // //return $groups;

        // foreach($groups as $g => $categories)
        // {
        //     $set_group = new Group;
        //     $set_group->name = $g;
        //     $set_group->slug = str_replace(' ','-',strtolower($set_group->name));
        //     $set_group->serial_no = $counterG++;
        //     $set_group->save();

        //     if(count($categories) > 0)
        //     {
        //         foreach ($categories as $c => $subcategories)
        //         {
        //             $set_category = new Category;
        //             $set_category->group_id = $set_group->id;
        //             $set_category->name = $c;
        //             $set_category->slug = str_replace(' ','-',strtolower($set_category->name));
        //             $set_category->serial_no = $counterC++;
        //             $set_category->save();

        //             if(is_array($subcategories))
        //             {
        //                 foreach ($subcategories as $s => $get_subcategory)
        //                 {
        //                     $set_subcategory = new Subcategory;
        //                     $set_subcategory->group_id = $set_group->id;
        //                     $set_subcategory->category_id = $set_category->id;
        //                     $set_subcategory->name = $get_subcategory;
        //                     $set_subcategory->slug = str_replace(' ','-',strtolower($set_subcategory->name));
        //                     $set_subcategory->serial_no = $counterS++;
        //                     $set_subcategory->save();
        //                 }
        //             }
        //         }
        //     }
        // }

        return Group::with(['categories.subcategories'])->get();
    }
}
