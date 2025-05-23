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
        $products = NewProduct::all(); 
        $top_selling = top_selling::all(); 
    
        $cartItem = collect();  // Default empty collection
        $grandTotal = 0;
        $cartCount = 0;
    
        if (Auth::check()) {
            // Fetching cart items if user is logged in
            $cartItem = DB::table('top_selling')
                ->join('addtocart', 'addtocart.product_id', '=', 'top_selling.id')
                ->select('top_selling.name as title', 'top_selling.image as image', 'top_selling.price as price', 'addtocart.*')
                ->where('addtocart.user_id', Auth::id())
                ->get();
    
            // Calculating the total price
            foreach ($cartItem as $item) {
                $grandTotal += $item->price * $item->quantity;
            }
    
            // Count of cart items
            $cartCount = AddToCart::where('user_id', Auth::id())->count();
        }
    
        // Passing data to the view
        return view('Front-end.index', compact('products', 'top_selling', 'cartItem', 'cartCount', 'grandTotal'));
    }
    
    public function products(){
        $products = Products::all(); 
        $categories  =  Category::all();
        $brands = Brand::all();
         return view('Front-end.store',compact('products','categories', 'brands'));
     }  
}
