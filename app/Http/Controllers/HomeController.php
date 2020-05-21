<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Session::forget('admin');
        Session::forget('company');
        return view('login');
    }
     public function register()
    {
        return view('register');
    }
      public function logout()
    {
        Session::forget('admin');
        Session::forget('company');
        return redirect("/");
    }
   
}
