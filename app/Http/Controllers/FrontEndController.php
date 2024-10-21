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
        $products = products::where('type','2')->get(); 
        $top_selling = products::where('type','3')->get(); 
        return view('Front-end.index', compact('products', 'top_selling'));
    }else {
        return redirect()->route('admin')->with('error','admin cannot directly access WEB');
    }
    }else {
        $products = products::where('type','2')->get(); 
        $top_selling = products::where('type','3')->get();
        return view('Front-end.index', compact('products', 'top_selling'));
    }
}
    public function products(){
        
        if(Auth::check()){
            if(Auth::user()->user_type == 0){
        $products = Products::where('type','1')->get(); 
        $categories  =  Category::all();
        $brands = Brand::all();
         return view('Front-end.store',compact('products','categories', 'brands'));
        }else {
            return redirect()->route('admin')->with('error','admin cannot directly access WEB');
        }
        }else {
            $products = Products::where('type','1')->get(); 
        $categories  =  Category::all();
        $brands = Brand::all();
         return view('Front-end.store',compact('products','categories', 'brands'));
        }
        }  
}
