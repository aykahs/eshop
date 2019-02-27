<?php
 namespace App\Repositories;
use Illuminate\Http\Request;
use App\Product;

class ProductRepository implements ProductInterface
{

    public function all()
    {
        return Product::all();
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
        return Product::create($data);
    }
    public function update(array $data, $id)
    {
        $record = Product::find($id);
        return $record->update($data);
    }
    public function show($id)
    {
        return Product::findOrFail($id);
    }
    public function paginate($perPage = 3, $columns = array('*')) {
        return Product::orderBy('id', 'DESC')->paginate($perPage, $columns);
    }
    public function find($id)
    {
        return Product::find($id);
    }
    public function delete($id)
    {
        $result=Product::find($id);
        return $result->destroy($id);
    }

}

