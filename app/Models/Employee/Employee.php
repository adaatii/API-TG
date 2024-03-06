<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function createEmployee($data)
    {
        return $this->create($data) ? true : false;
    }

    public function updateEmployee($data)
    {
        return $this->where('id', $data['id'])->update($data) ? true : false;
    }

    public function deleteEmployee($id)
    {
        return $this->where('id', $id)->delete() ? true : false;
    }

    public function getEmployee($id)
    {
        return $this->find($id);
    }

    public function getAllEmployees()
    {
        return $this->all();
    }

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'password',
        'status'
    ];

    protected $hidden = [
        'password',
    ];
}
