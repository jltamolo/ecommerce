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

        $req->validate([
            'product_title' => 'required|string|max:255',
            'product_description' => 'required|string',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
        ]);
        
        $product = new Product;
        $product->product_title=$req->product_title;
        $product->description=$req->product_description;
        $product->category=$req->category;
        $product->quantity=$req->quantity;
        $product->price=$req->price;
        $product->discount_price=$req->discounted_price;

        $image=$req->product_image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $req->product_image->move('product', $imagename);
        $product->image=$imagename;

        $product->save();
        return redirect()->back()->with('message','Product successfully');
    }
    public function show_product(){
        $product = Product::all();

        return view('admin.show_product', compact('product'));
    }
    public function delete_product($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product deleted successfully');
    }

}
