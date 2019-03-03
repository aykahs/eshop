<?php
 namespace App\Repositories;
use Illuminate\Http\Request;
use App\Product;

class ProductRepository extends Repository implements ProductInterface
{
      // model property on class instances
      protected $model;

      // Constructor to bind model to repo
      public function __construct(Product $model)
      {
          $this->model = $model;
      }

}

