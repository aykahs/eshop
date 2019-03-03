<?php
 namespace App\Repositories;
use Illuminate\Http\Request;

abstract class Repository
{

    public function paginate($perPage = 3, $columns = array('*')) {
        return $this->model->orderBy('id', 'DESC')->paginate($perPage, $columns);
    }


    public function all()
    {
        return $this->model->all();
    }
    public function create(array $data)
    {


        return $this->model->create($data);
    }


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
        return $result::destroy($id);
    }

}

