<?php

namespace App\Http\Controllers;
use App\Models\top_selling;
use App\Models\AddToCart;
use Illuminate\Http\Request;
use DB;
use Auth;


class singleProductController extends Controller
{
    public function single_product($id){
        $single_product = top_selling::find($id);
         // Fetching cart items
         $cartItem = DB::table('top_selling')
         ->join('addtocart', 'addtocart.product_id', '=', 'top_selling.id')
         ->select('top_selling.name as title', 'top_selling.image as image', 'top_selling.price as price', 'addtocart.*')
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
    
        return view ('Front-end.single_product',compact('single_product','cartItem','grandTotal','cartCount'));
    }
}
