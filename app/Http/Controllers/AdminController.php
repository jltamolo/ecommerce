<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function view_category(){
        $category = Category::all();
        return view ('admin.category', compact('category'));
    }

    public function category(Request $req){
        $category = new Category;
        $category->category_name=$req->category_name;
        $category->save();
        return redirect()->back()->with('message','Category added successfully'); 
         
    }
    public function delete_category($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('message','Category deleted successfully');

    }
    public function view_product(){
        return view('admin.product');
    }
}
