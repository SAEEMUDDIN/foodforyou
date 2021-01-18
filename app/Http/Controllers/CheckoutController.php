<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Billing;
use App\Product;
use App\Shipping;
use Carbon\Carbon;
use App\Order_detail;
use Illuminate\Http\Request;
use App\Mail\PuarchaseConfirm;
use Illuminate\Support\Facades\Auth;
use Mail;

class CheckoutController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

   function checkout()
    {
      return view('frontend.checkout' , [
          'user' => User::find(Auth::id())
      ]);
    }

    function checkoutpost(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone_number' => 'required',
        'address' => 'required',
      ]);
     
      $billing_id = Billing::insertGetId([
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'address' => $request->address,
        'notes' => $request->notes,
        'created_at' => Carbon::now(),
      ]);

      $order_id = Order::insertGetId([
        'user_id' => Auth::id(),
        'sub_total' => session('sub_total'),
        'total' => session('sub_total'),
        'payment_option' => $request->payment_option,
        'billing_id' => $billing_id,
        'created_at' => Carbon::now(),
      ]);

      foreach(cart_items() as $cart_item){
        Order_detail::insert([
          'order_id' => $order_id,
          'user_id' => Auth::id(),
          'product_id' => $cart_item->product_id,
          'product_quantity' => $cart_item->product_quantity,
          'product_price' => $cart_item->product->product_price,
          'created_at' => Carbon::now(),
        ]);
        Product::find($cart_item->product_id)->decrement('product_quantity', $cart_item->product_quantity);
        $cart_item->forceDelete();
      }
      $order_details = Order_detail::where('order_id' , 1)->get();
      if($request->payment_option == 2){
        session(['order_id_from_checkout_page' => $order_id]);
        return redirect('stripe');
      }
      elseif($request->payment_option == 3){
        session(['order_id_from_checkout_page' => $order_id]);
        return redirect('/example2');
      }

      else {
        return redirect('/card');
      }
      
    }
}
