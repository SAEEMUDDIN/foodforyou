<?php

namespace App\Http\Controllers;

use App\Category;
use Image;
use App\Product;
use Carbon\Carbon;
use App\Product_image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('checkrole');
  }


  // ResourceFull Controller Product
  // php artisan make:model Poduct -mcr (MODEL CONTROLLER RESOURCE)
  // CURD - Start

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product.index');
    }

    public function productviewall(){
        return view('backend.product.show' , [
            'product_all' => Product::Latest()->get(),
            'total_product' => Product::all()->count(),
        ]);
    }

    public function producttrashall(){
        return view('backend.product.trash' , [
            'product_deleted' => Product::onlyTrashed()->get(),
            'total_del_product' => Product::onlyTrashed()->count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $slug_link = Str::slug($request->product_name.'-'.Str::random(6));
       $request->validate([
         'product_name' => 'required' , 'unique:products,product_name',
         'product_price' => 'required|numeric',
         'product_long_description' => 'required',
         'product_quantity' => 'required|numeric',
         'alert_quantity' => 'required|numeric',
       ]);
        $product_id = Product::insertGetId($request->except('_token' , 'product_photo') + [
          'created_at' => Carbon::now(),
          'slug' => $slug_link,
        ]);
        if($request->hasFile('product_photo')){
          $uploded_photo = $request->file('product_photo');
          $new_photo_name = $product_id.'.'.$uploded_photo->getClientOriginalExtension();
          $new_photo_location = 'public/uploads/product_photos/'.$new_photo_name;
          Image::make($uploded_photo)->resize(500,385)->save(base_path($new_photo_location) , 40);
          Product::find($product_id)->update([
            'product_photo' => $new_photo_name
          ]);

        return back()->with('success_status' , $request->product_name." Product Insert SuccessFully!!");
      }
      return back()->with('success_message' , 'Product Insert SuccessFully!!');
    }


    public function trashproduct($trash_id){
        Product::withTrashed()->find($trash_id)->delete();
        return back()->with('trash_status' , 'ID '.$trash_id.' Trash Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit' ,[
            'product_info' => $product,
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->except('_token' , '_method' , 'product_photo'));
        if($request->hasFile('product_photo')){
          if($product->product_photo != 'thumbnail.png'){
            // delete photo
            $old_location = 'public/uploads/product_photos/'.$product->product_photo;
            unlink(base_path($old_location));
          }
          $uploded_photo = $request->file('product_photo');
          $new_photo_name = $product->id.'.'.$uploded_photo->getClientOriginalExtension();
          $new_photo_location = 'public/uploads/product_photos/'.$new_photo_name;
          Image::make($uploded_photo)->resize(500,385)->save(base_path($new_photo_location) , 70);
          $product->update([
            'product_photo' => $new_photo_name
          ]);
        }
        return back()->with('success_sms' , 'Product Update Successfully!!');
    }


    //  CRUD - End



























    


    public function productrestore($restore_id)
    {
      Product::withTrashed()->find($restore_id)->restore();
      return back()->with('restore_status' , 'ID '.$restore_id.' Restore Successfully!');

    }

    public function productforcedelete($delete_id)
    {
      Product::withTrashed()->find($delete_id)->forceDelete();
      return back()->with('delete_status' , 'ID '.$delete_id.' Delete Successfully!');
    }

    public function marktrash(Request $request){
      if (isset($request->product_id)) {
        foreach ($request->product_id as $single_product) {
          Product::withTrashed()->find($single_product)->delete();
        }
        return back()->with('mark_trash' , 'Mark Trash Successfully!!!');
      }
    }


    public function markrestoredelete(Request $request)
    {
       switch ($request->button) {
        case 'Restore':
          if (isset($request->product_id)) {
            foreach ($request->product_id as $single_product) {
              Product::withTrashed()->find($single_product)->restore();
            }
            return back()->with('mark_restore' , 'Mark Restore Successfully!!!');
          }
          break;

          case 'Delete':
            if (isset($request->product_id)) {
              foreach ($request->product_id as $single_product) {
                Product::withTrashed()->find($single_product)->forceDelete();
              }
              return back()->with('force_delete' , 'Mark Delete Successfully!!!');
            }
          break;
      }

    }


}
