<?php

namespace App\Http\Controllers;
use App\Models\NewProduct;
use App\Models\top_selling;
use App\Models\AddToCart;
use App\Models\Products;
use App\Models\Category;
use App\Models\Brand;
use DB;
use  Auth;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->user_type == 0){
        $products = NewProduct::all(); 
        $top_selling = top_selling::all(); 
        return view('Front-end.index', compact('products', 'top_selling'));
    }else {
        return redirect()->route('admin')->with('error','admin cannot directly access WEB');
    }
    }else {
        $products = NewProduct::all(); 
        $top_selling = top_selling::all(); 
        return view('Front-end.index', compact('products', 'top_selling'));
    }
}
    public function products(){
        $products = Products::all(); 
        $categories  =  Category::all();
        $brands = Brand::all();
         return view('Front-end.store',compact('products','categories', 'brands'));
     }  
}
