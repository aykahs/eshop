<?php

namespace App\Http\Controllers;
use App\Repositories\EmployerInterface;
use Illuminate\Http\Request;
use App\Http\Resources\employerResource as EmployerResource;
use Illuminate\Support\Facades\Auth;

class employerapicontoller extends Controller
{
    protected $model;

    public function __construct(EmployerInterface $model)
    {
        $this->model = $model;

    }

    public function index()
    {
        return EmployerResource::collection($this->model->paginate(6));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' =>'required',
            'password' => 'required'
        ]);
        new EmployerResource( $this->model->create($validatedData));
    }

    public function destroy($id)
    {
        return new EmployerResource($this->model->delete($id));
    }


}
