<?php

namespace App\Http\Controllers;
use App\Repositories\CategoriesInterface;
use Illuminate\Http\Request;
use App\Http\Resources\categoriesResource as CategoriesResource;
class categoriesapicontroller extends Controller
{
    protected $model;

    public function __construct(CategoriesInterface $model)
    {
        $this->model = $model;
    }

    public function index()
    {
       return categoriesResource::collection($this->model->all());
    }

}
