<?php
 namespace App\Repositories;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function paginate($perPage = 3, $columns = array('*')) {
        return $this->model->orderBy('id', 'DESC')->paginate($perPage, $columns);
    }

    // Get all instances of model
    public function all()
    {
        return $this->model->all();
    }
    public function create(array $data)
    {

        //  if($request->hasFile($data['imagepath'])){

        // 	$filenameWithExt = $request->file($data['imagepath'])->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just ext
        //     $extension = $request->file($data['imagepath'])->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //     // Upload Image
        //     $path = $request->file($data['imagepath'])->storeAs('public/image', $fileNameToStore);

        // }

        // return $this->model->create([
        //     'imagepath' =>  $data['imagepath'],
        //     'title' => $data['title'],
        //     'description' =>$data['description'],
        //     'categories' =>$data['categories'],
        //     'price' =>$data['price']
        // ]);
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
    public function delete($id)
    {
        $result=$this->model->find($id);
       // dd($result);
        return $result::destroy($id);
    }

}

