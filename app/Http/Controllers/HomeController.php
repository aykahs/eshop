<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','try']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function try()
    {
        return view('users.try');
    }
    public function index()
    {
        $this->data('title',$this->make_title('welcome'));

        return view('users.index',$this->data);
    }

    public function profile()
    {
        return view('users.home');
    }

}
