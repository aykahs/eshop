<?php namespace App\Repositories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class EmployerRepository implements Employerinterface
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


        return $this->model->create([
            'name' => $data['name'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]

    );
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

    public function delete($id)
    {
        $result=$this->model->find($id);
       // dd($result);
        return $result::destroy($id);
    }

}

