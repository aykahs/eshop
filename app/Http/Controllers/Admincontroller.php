<?php

namespace App\Http\Controllers;
use App\Repositories\EmployerRepository;
use Illuminate\Http\Request;
use App\Employer;
use App\Http\Resources\employerResource as EmployerResource;
use Illuminate\Support\Facades\Auth;
class Admincontroller extends Controller
{
    protected $model;

    public function __construct(Employer $employer)
    {
       $this->middleware('auth:employer')->except(['register_emp']);
        $this->model = new EmployerRepository($employer);
    }
    public function index()
    {
        $this->data('title',$this->make_title('home'));
        return view('Admins.home');
    }

    public function addemp()
    {
        return view('Admins.addemployer');
    }

    public function register_emp(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' =>'required',
            'password' => 'required'
        ]);
        new EmployerResource( $this->model->create($validatedData));
    }
}
