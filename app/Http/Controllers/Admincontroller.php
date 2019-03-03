<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\employerResource as EmployerResource;

class Admincontroller extends Controller
{


    public function __construct( )
    {
       $this->middleware('auth:employer');

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
    public function addproduct()
    {
        return view('Admins.addproduct');
    }


}
