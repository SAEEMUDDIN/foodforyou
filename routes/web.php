<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/home', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

//HomeController Router
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('send/newsletter', 'HomeController@sendnewsletter');
Route::get('file/download/{customer_id}', 'HomeController@filedownload')->name('filedownload');


//FrontendController Route
Route::get('/' , 'FrontendController@index');
Route::get('about' , 'FrontendController@about');
Route::get('product/details/{slug}' , 'FrontendController@productdetails')->name('productdetails');
Route::post('customer-email' , 'FrontendController@customeremail')->name('customeremail');
Route::get('shop-page' , 'FrontendController@shoppage')->name('shoppage');

Route::get('contact-page' , 'FrontendController@contact')->name('contact');
Route::post('contact/post' , 'FrontendController@contactpost')->name('contactpost');
Route::get('search' , 'FrontendController@search');

// Customer Login Registration & Home Page
Route::get('login/registration' , 'FrontendController@loginregistration')->name('loginregistration');
Route::post('customer/registration' , 'FrontendController@customerregistration')->name('customer.registration');
Route::get('customer/loginpage' , 'FrontendController@customerloginpage')->name('customer.loginpage');

//CustomerController Router
Route::get('customer/home' , 'CustomerController@customerhome');
Route::get('download/invoice/{order_id}' , 'CustomerController@downloadinvoice');



// 2nd One

//CartController Router
Route::post('cart/store' , 'CartController@cartstore')->name('cart.store');
Route::get('card' , 'CartController@cardindex')->name('card.index');
Route::post('cart/update' , 'CartController@cartupdate')->name('cart.update');
Route::get('cart/destroy/{cart_id}' , 'CartController@cartdestroy')->name('cart.destroy');

//CustomerController Router
Route::get('checkout' , 'CheckoutController@checkout')->name('checkout');
Route::post('checkout/post' , 'CheckoutController@checkoutpost');
//OrderController Router
Route::resource('order' , 'OrderController')->only(['index', 'update']);
Route::get('order/cancel/{order_id}', 'OrderController@ordercancel')->name('order.cancel');

//ProfileController Router
Route::resource('profile', 'ProfileController')->only(['index', 'store']);
Route::post('edit/password' , 'ProfileController@profileeditpassword')->name('editpassword');
Route::post('profile/image/upload' , 'ProfileController@profileimageupload')->name('profileimageupload');

//ProductController Route
Route::resource('/product', 'ProductController')->only(['index', 'store', 'edit', 'update']);
Route::get('product/viewall' , 'ProductController@productviewall')->name('product.viewall');
Route::get('product/trashall' , 'ProductController@producttrashall')->name('product.trashall');
Route::get('product/trash/{trash_id}' , 'ProductController@trashproduct')->name('trashproduct');
Route::get('product/restore/{restore_id}' , 'ProductController@productrestore')->name('productrestore');
Route::get('product/force/delete/{delete_id}' , 'ProductController@productforcedelete')->name('productforcedelete');
Route::post('mark/trash' , 'ProductController@marktrash')->name('marktrash');
Route::post('product/mark/restore/delete' , 'ProductController@markrestoredelete')->name('markrestoredelete');

//BannerController Router
Route::resource('banner', 'BannerController')->only(['index', 'store', 'edit', 'update']);
Route::get('banner/viewall' , 'BannerController@bannerviewall')->name('banner.viewall');
Route::get('banner/trashall' , 'BannerController@bannertrashall')->name('banner.trashall');
Route::get('banner/trash/{trash_id}' , 'BannerController@trashbanner')->name('trash.banner');
Route::get('banner/restore/{restore_id}' , 'BannerController@bannerrestore')->name('bannerrestore');
Route::get('banner/force/delete/{delete_id}' , 'BannerController@bannerdelete')->name('bannerdelete');

//CustomerinfoController Router
Route::resource('customerinfo' , 'CustomerinfoController')->only(['index', 'destroy', 'edit', 'update']);

//CustomeEmailController Router
Route::resource('customerEmail' , 'CustomerEmailController')->only(['index', 'destroy']);


