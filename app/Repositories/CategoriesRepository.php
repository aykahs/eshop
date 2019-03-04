<?php
 namespace App\Repositories;
use Illuminate\Http\Request;
use App\Categorie;

class CategoriesRepository extends Repository implements CategoriesInterface
{
      
      protected $model;


      public function __construct(Categorie $model)
      {
          $this->model = $model;
      }

}

