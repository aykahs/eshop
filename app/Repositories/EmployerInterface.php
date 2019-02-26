<?php
namespace App\Repositories;

interface EmployerInterface
{
    public function all();
    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);

    public function paginate($perPage = 3, $columns = array('*'));

}
