<?php

namespace App\Http\Controllers;


use App\User;
use App\Customerinfo;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $users = User::latest()->get();
       $total_users = User::count();
       $total_products = Product::count();

       return view('home' , compact('users' , 'total_users' , 'total_products'));
    }


}
