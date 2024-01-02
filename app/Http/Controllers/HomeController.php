<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use App\Models\Product;
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
}
