<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function createProduct($data)
    {
        return $this->create($data) ? true : false;
    }

    public function updateProduct($data)
    {
        $data['status'] = true;
        return $this->where('id', $data['id'])->update($data) ? true : false;
    }

    public function deleteProduct($id)
    {
        $product = $this->find($id);
        $product->status = false;

        return ($product->update()) ? true : false;
    }

    public function getProduct($id)
    {
        return $this->find($id);
    }

    public function getAllProducts()
    {
        return $this->all();
    }

    protected $fillable = [
        'description',
        'price',
        'status',
        'category_id',
    ];
}
