<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function createCategory($data)
    {
        return $this->create($data) ? true : false;
    }

    public function updateCategory($data)
    {
        $data['status'] = true;
        return $this->where('id', $data['id'])->update($data) ? true : false;
    }

    public function deleteCategory($id)
    {
        $category = $this->find($id);
        $category->status = false;

        return ($category->update()) ? true : false;
    }

    public function getCategory($id)
    {
        return $this->find($id);
    }

    public function getAllCategories()
    {
        return $this->all();
    }

    protected $fillable = [
        'description',
        'status'
    ];
}
