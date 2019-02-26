<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Adminproductcontroller extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:employer');
      
    }
public function index()
{
    return view('Admins.addproduct');
}
}
