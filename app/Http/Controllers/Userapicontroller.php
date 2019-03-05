<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\ProductInterface;
use App\Http\Resources\productResource as ProductResource;
class Userapicontroller extends Controller
{
    private $model;

    public function __construct(ProductInterface $model)
    {
        // set the model
        $this->model = $model;

    }
    public function index()
    {

  // dd($this->model->all());
     return ProductResource::collection($this->model->paginate(6));


     }

}
