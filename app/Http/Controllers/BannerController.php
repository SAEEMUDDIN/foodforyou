<?php

namespace App\Http\Controllers;

use App\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('checkrole');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.banner.index');
    }

    public function bannerviewall(){
        return view('backend.banner.show' , [
            'banners_all' => Banner::Latest()->get()
        ]);
    }

    public function bannertrashall(){
        return view('backend.banner.trash' , [
            'banner_deleted' => Banner::onlyTrashed()->get(),
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
        $request->validate([
            'banner_heading' => 'required',
            'banner_description' => 'required',
            'banner_button' => 'required',
            'button_link' => 'required',
            'banner_photo' => 'required',
          ]);
    
          $banner_id = Banner::insertGetId($request->except('_token' , 'banner_photo') + [
            'created_at' => Carbon::now(),
          ]);
          if($request->hasFile('banner_photo')){
            $uploded_photo = $request->file('banner_photo');
            $new_photo_name = $banner_id.'.'.$uploded_photo->getClientOriginalExtension();
            $new_photo_location = 'public/uploads/banner_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(1920,1000)->save(base_path($new_photo_location) , 40);
            Banner::find($banner_id)->update([
              'banner_photo' => $new_photo_name
            ]);
          }
          return back()->with('success_status','Banner Insert SuccessFully!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit',[
            'banner_info' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Banner::find($id)->update($request->except('_token' , '_method' , 'banner_photo'));
        if($request->hasFile('banner_photo')){
          if(Banner::find($id)->banner_photo != 'banner.jpg'){
            // delete photo
            $old_location = 'public/uploads/banner_photos/'.Banner::find($id)->banner_photo;
            unlink(base_path($old_location));
          }
          $uploded_photo = $request->file('banner_photo');
          $new_photo_name = $id.'.'.$uploded_photo->getClientOriginalExtension();
          $new_photo_location = 'public/uploads/banner_photos/'.$new_photo_name;
          Image::make($uploded_photo)->resize(1920,1000)->save(base_path($new_photo_location) , 70);
          Banner::find($id)->update([
            'banner_photo' => $new_photo_name
          ]);
          return back()->with('success_status' , 'Banner Update Successfully!!');
        }
        return back()->with('success_status' , 'Banner Update Successfully!!');
        
    }

    function trashbanner($trash_id)
    {
      Banner::findOrFail($trash_id)->delete();
      return back()->with('trash_status' , 'ID '.$trash_id.' Trash Successfully!');
    }

     public function bannerrestore($resoter_id)
    {
      Banner::withTrashed()->find($resoter_id)->restore();
      return back()->with('restore_status' , 'ID '.$resoter_id.' Restore Successfully!');

    }

    public function bannerdelete($delete_id)
    {
      Banner::withTrashed()->find($delete_id)->forceDelete();
      return back()->with('delete_status' , 'ID '.$delete_id.' Delete Successfully!');

    }
    
}
