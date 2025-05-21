<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\NewProduct;
use App\Models\AddToCart;
use App\Models\top_selling;
use Hash;
use DB;
class UserController extends Controller
{
  public function login()
    {
        return view('Front-end.login');
    } 
    public function register(Request $request){
$data = $request->validate([
    'namee' => 'required',
    'email' => 'required|email|unique:users,email',
    'passwordd' => 'required|min:3'
]);
  $user = new User;
  $user->name = $request->namee;
  $user->email = $request->email;
  $user->password = Hash::make($request->passwordd);
  $user->user_type = 0;
  $user->save();
  return redirect()->route('login')->with('success', 'User registered successfully!');
  
    }
    public function signin(Request $request){
      $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:3'
    ]);
    if (Auth::attempt($credentials)) {
      if(Auth::user()->user_type == 1){
          return view('Admin.dashboard');
      } elseif(Auth::user()->user_type == 0){
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
        return view('Front-end.index', compact('products', 'top_selling', 'cartItem', 'cartCount', 'grandTotal'));
                } else {
        return view('Front-end.login')->with('error', 'you are not registered!');
      }
    }
  }
    public function logout(Request $request){
    
      Auth::logout();
      return redirect()->route('login')->with('success', 'You have been logged out!');
    }
}
