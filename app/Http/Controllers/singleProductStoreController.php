<?php

namespace App\Http\Controllers;
use App\Models\top_selling;
use App\Models\Products;
use App\Models\AddToCart;
use Illuminate\Http\Request;
use DB;
use Auth;


class singleProductStoreController extends Controller
{
    public function single_product($id){
        $single_product = Products::find($id);
         // Fetching cart items
         $cartItem = DB::table('products')
         ->join('addtocart', 'addtocart.product_id', '=', 'products.id')
         ->select('products.name as title', 'products.image as image', 'products.price as price', 'addtocart.*')
         ->where('addtocart.user_id', Auth::user()->id)
         ->get();

     // Calculating the total price
     $grandTotal = 0;
     foreach ($cartItem as $item) {
         $grandTotal += $item->price * $item->quantity;
     }

     // Count of cart items
     $cartCount = AddToCart::where('user_id', Auth::user()->id)->count();

     // Passing grand total to the view
    
        return view ('Front-end.single_product_store',compact('single_product','cartItem','grandTotal','cartCount'));
    }
}
