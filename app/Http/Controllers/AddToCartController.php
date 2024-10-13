<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddToCart;
use App\Models\NewProduct;
use App\Models\top_selling;
use DB;
use Auth;
class AddToCartController extends Controller
{
  public function index()
  {
      $cartItem  = AddToCart::where('user_id',Auth::user()->id);
      $products = NewProduct::all(); 
      $top_selling = top_selling::all();
      $cartItem = DB::table('top_selling')
      ->join('addtocart','addtocart.product_id','=','top_selling.id')
      ->select('top_selling.name as title','top_selling.image as image','top_selling.price as price','addtocart.*')
      ->where('addtocart.user_id',Auth::user()->id)
      ->get(); 
       // Calculating the total price
       $grandTotal = 0;
       foreach ($cartItem as $item) {
           $grandTotal += $item->price * $item->quantity;
       }
       
      // Count of cart items
      $cartCount = AddToCart::where('user_id', Auth::user()->id)->count();

      // Passing grand total to the view
      return view('Front-end.cart', compact('products', 'top_selling', 'cartItem', 'cartCount', 'grandTotal'));
      
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
