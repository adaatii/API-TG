<?php

namespace App\Models\Employee;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Employee extends Model implements JWTSubject, Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getAuthIdentifierName()
    {
        return 'id';  // Nome do campo de identificação do usuário
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();  // Obtém a chave primária do usuário
    }

    public function getAuthPassword()
    {
        return $this->password;  // Retorna a senha do usuário
    }
}
