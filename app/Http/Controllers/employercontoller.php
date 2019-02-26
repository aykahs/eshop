<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class employercontoller extends Controller
{
public function __construct()
    {
        $this->middleware('auth:employer');

    }

}
