<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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
        $category = Category::all();
        return view('admin.product', compact('category'));
    }
    public function add_product(Request $req){
        $product = new Product;
        $product->product_title=$req->product_title;
        $product->description=$req->description;
        $product->category=$req->category;
        $product->quantity=$req->quantity;
        $product->price=$req->price;
        $product->discount_price=$req->discount_price;

        $image=$req->product_image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $req->product_image->move('product', $imagename);
        $product->image=$imagename;

        $product->save();
        return redirect()->back()->with('message','Product successfully');
    }

}
