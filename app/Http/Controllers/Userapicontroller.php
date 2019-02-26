<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\product;
use App\Http\Resources\productResource as ProductResource;
class Userapicontroller extends Controller
{
    protected $model;

    public function __construct(product $product)
    {
        // set the model
        $this->model = new Repository($product);

    }
    public function index()
    {

  // dd($this->model->all());
     return ProductResource::collection($this->model->paginate(6));
    }
    
}
