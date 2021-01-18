<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
    function cartstore(Request $request)
    {
      if(Cookie::get('g_cart_id')){
        $generator_cart_id = Cookie::get('g_cart_id');
      }
      else {
        $generator_cart_id = Str::random(5).rand(2,1000);
        Cookie::queue('g_cart_id' , $generator_cart_id , 1440);
      }
     if(Cart::where('generator_cart_id' , $generator_cart_id)->where('product_id' , $request->product_id)->exists()){
       Cart::where('generator_cart_id' , $generator_cart_id)->where('product_id' , $request->product_id)->increment('product_quantity' , $request->product_quantity);
     }
     else {
       Cart::insert([
         'generator_cart_id' => $generator_cart_id,
         'product_id' => $request->product_id,
         'product_quantity' => $request->product_quantity,
         'created_at' => Carbon::now(),
       ]);
     }
     return back();
    }

    function cardindex()
    {
      return view('frontend.cardview');
    }

    function cartupdate(Request $request)
    {
      foreach ($request->product_update as $cart_id => $product_quantity) {
        Cart::findOrFail($cart_id)->update([
          'product_quantity' => $product_quantity
        ]);
      }
      return back()->with('update_status' , 'Your Update Successfully!!');
    }

    function cartdestroy($cart_id)
    {
      Cart::withTrashed()->find($cart_id)->forceDelete();
      return back()->with('delete_status' , 'ID '.$cart_id.' Delete Successfully!');
    }
}
