<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','Cart']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Cart()
    {
        return view('users.cart');
    }
    public function index()
    {
        $this->data('title',$this->make_title('welcome'));

        return view('users.index',$this->data);
    }
    public function payment()
    {
        if(!Session::has('cart') || Session::get('cart')->totalprice == 0)
        {
            return redirect()->route('home');
        }
      
        return view('users.payment');
    }
    public function profile()
    {
        return view('users.home');
    }

}
