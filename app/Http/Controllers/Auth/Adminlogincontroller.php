<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class Adminlogincontroller extends Controller
{
    public function __construct()
	{
		$this->middleware('guest:employer');
	}


    public function showLoginForm()
    {
        return view('Admins.employerlogin');
    }
    
    public function login(request $request)
    {

    $validatedData = $request->validate([
    'password' => 'required|min:4',
    'email' => 'required|email',
     ]);

  
         if (Auth::guard('employer')->attempt(['email' => $request->email, 'password' => $request->password, 'remember_token' => $request->remember ])) {
            // Authentication passed...
            return redirect()->intended(route('admin.home'));
        }
        return redirect()->back()->withInput($request->only('email','remember'))->with('error','These credentials do not match our records.');
    }
}
