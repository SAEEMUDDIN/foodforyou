<?php

namespace App\Http\Controllers;

use App\User;
use App\Banner;
use App\Product;
use Carbon\Carbon;
use App\Customerinfo;
use App\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\QueryBuilder;
use DB;

class FrontendController extends Controller
{
    // Frontend Page
    public function index(){
      $bestseller_asc = DB::table('Order_details')
            ->select('product_id', DB::raw('count(*) as total'))
            ->groupBy('product_id')
            ->get();
      $bestseller_desc = $bestseller_asc->sortByDesc('total')->take(4);

      return view('frontend.index' , [
          'banner_all' => Banner::all(),
          'product_all' => Product::all(),
          'bestseller_desc' => $bestseller_desc,
      ]);
    }

    // Product show & details
    public function productdetails($slug){

        $product_info = Product::where('slug' , $slug)->firstOrFail();

        if(Order_detail::where('user_id' , Auth::id())->where('product_id' , $product_info->id)->whereNull('review')->exists()){
          $order_details_id = Order_detail::where('user_id' , Auth::id())->where('product_id' , $product_info->id)->whereNull('review')->first()->id; 
        }
       
        // $reviews = Order_detail::where('product_id' , $product_info->id)->whereNotNull('review')->get();
        return view('frontend.productdetails' , [
          'actvie_product' => $product_info,
        ]);
      }


      // Shop Page
      public function shoppage()
      {
        return view('frontend.shop' , [
          'product_info' => Product::all(),
        ]);
      }

      // Contact Page
      function contact(){
        return view('frontend.contact');
      }

      function contactpost(Request $request){
        $request->validate([
          'customer_name' => 'required',
          'customer_email' => 'required|email',
          'customer_subject' => 'required',
          'customer_message' => 'required',
        ]);
        $customer_id = Customerinfo::insertGetId($request->except('_token')+[
          'created_at' => Carbon::now(),
        ]);
        if($request->hasFile('customer_file')){
          // $path = $request->file('customer_file')->store('customer_uploads');
          $path = $request->file('customer_file')->storeAs(
            'customer_uploads', $customer_id.".".$request->file('customer_file')->extension(),
          );
          Customerinfo::find($customer_id)->update([
            'customer_file' => $path,
          ]);
        }
        return back()->with('success_status' , 'We Recived SuccessFully!!!');
      }

      // Search Option
      public function search()
      {
        $search_result = QueryBuilder::for(Product::class)
                ->allowedFilters(['product_name' , 'category_id'])
                ->allowedSorts('product_name')
                ->get();
        return view('frontend.search' , compact('search_result'));
      }

      // Review Option
      function reviewpost(Request $request)
      {
        Order_detail::find($request->order_details_id)->update([
          'stars' => $request->stars,
          'review' => $request->review,
        ]);
        return back();
      }

      // Customer Login
      function loginregistration()
      {
        return view('frontend.loginregistration');
      }
      
      function customerregistration(Request $request)
      {
        $request->validate([
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::insert([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'role' => 2,
          'created_at' => Carbon::now(),
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
          return redirect('customer/home');
        }
        return back()->with('success_status' , $request->name.' Your Account Create Successfully !!!');
      }

      function customerloginpage()
      {
        return view('frontend.customerloginpage');
      }




}
