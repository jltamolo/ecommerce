<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function view_category(){
        $category = Category::all();
        return view ('admin.category', compact('data'));
    }

    public function category(Request $req){
        $category = new Category;
        $category->category_name=$req->category_name;
        $category->save();
        return redirect()->back()->with('message','Category added successfully'); 
         
    }
}
