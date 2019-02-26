<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\product;

use App\Http\Resources\productResource as ProductResource;
class Productcontroller extends Controller
{
    protected $model;

    public function __construct(product $product)
    {
        // set the model
        $this->model = new Repository($product);

    }

    public function index()
    {

   // return $this->model->all();
     return ProductResource::collection($this->model->paginate(6));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'imagepath' => 'required',
            'title' => 'required|max:9',
            'description' =>'required',
            'categories' =>'required',
            'price' =>'required|digits_between:2,4'
        ]);

        return new ProductResource($this->model->create($validatedData));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResource($this->model->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id )
    {

        $validatedData = $request->validate([
            'imagepath' => 'required',
            'title' => 'required',
            'description' =>'required',
            'categories' =>'required',
            'price' =>'required|digits_between:2,4'
        ]);
        return new ProductResource ($this->model->update($validatedData,$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->model->delete($id);
        return response()->json('deleted', 204);
    }
}
