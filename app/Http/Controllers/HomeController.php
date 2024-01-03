<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    public function index(){
        $product = Product::paginate(9);
        return view('home.userpage', compact('product'));
    }
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }
        else{
            $product = Product::paginate(9);
        return view('home.userpage', compact('product'));
        }
    }
    public function product_details($id){
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }
    public function add_cart(Request $req, $id){
        if (Auth::id()){
            $user=Auth::user();
            $product = Product::find($id);
            
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->product_title;
            $cart->price = $product->price;
            $cart->quantity = $req->quantity;
            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->save();
            return redirect()->back()->with('message','Successfully added to cart'); 
            
            


            
            
        }
        else{
            return redirect('login');
        }

    }
}
