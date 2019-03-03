<?php namespace App\Repositories;
use Illuminate\Support\Facades\Hash;
use App\Employer;
class EmployerRepository extends Repository implements Employerinterface
{
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Employer $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return Employer::create([
            'name' => $data['name'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]
    );
    }




}

