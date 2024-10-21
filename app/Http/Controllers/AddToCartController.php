<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddToCart;
use App\Models\NewProduct;
use App\Models\products;
use DB;
use Auth;
class AddToCartController extends Controller
{
  public function index()
  {
      if(Auth::check()) {
          // Fetch cart items for the authenticated user
          $cartItem = AddToCart::where('user_id', Auth::user()->id)->get();
  
          // Fetch all products and top selling items
          $products = products::all(); 

  
          // Join cart with top selling products to get product details in cart
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
  
          // Passing data to the view
          return view('Front-end.cart', compact('products',  'cartItem', 'cartCount', 'grandTotal'));
      } else {
          return redirect()->route('front.index')->with('error', 'Please Login To See Your Cart');
      }
  }
  
    public function addToCart(Request $request){
        $item = new AddToCart;
        $item->product_id = $request->product_id;
        $item->user_id = Auth::id();
        $item->quantity = $request->quantity;
        $item->save();
        return redirect()->route('front.index')->with('success','Item Added To Cart Sucessfully');

    }
    
    public function deletCartItem($id){
      $saim = AddToCart::find($id);
      $saim->delete();
      return redirect()->route('front.index')->with('success','Item Deleted To Cart Sucessfully');

    }
}
