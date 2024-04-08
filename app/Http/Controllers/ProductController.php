<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\DeleteProductRequest;
use App\Http\Requests\Product\ListProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product\Product;

class ProductController extends Controller
{
    private $product;

    function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function createProduct(CreateProductRequest $request)
    {
        $data = $request->validated();

        return $this->product->createProduct($data) ? response()->json(['message' => 'Product created successfully'], 201) : response()->json(['message' => 'Product not created'], 400);
    }

    public function getAllProducts()
    {
        $response = $this->product->getAllProducts();

        return $response ? response()->json(['error' => false, 'body' => ['message' => 'Products found successfully!', 'products' => $response]], 200) : response()->json(['error' => true, 'body' => ['message' => 'Error finding products!']], 400);
    }

    public function getProduct(ListProductRequest $id)
    {
        $response = $this->product->getProduct($id);

        return $response ? response()->json(['error' => false, 'body' => ['message' => 'Product found successfully!', 'product' => $response]], 200) : response()->json(['error' => true, 'body' => ['message' => 'Error finding product!']], 400);
    }

    public function updateProduct(UpdateProductRequest $request)
    {
        $data = $request->validated();

        $response = $this->product->updateProduct($data);
        return $response ? response()->json(['message' => 'Product updated successfully'], 200) : response()->json(['message' => 'Product not updated'], 400);
    }

    public function deleteProduct(DeleteProductRequest $request)
    {
        return $this->product->deleteProduct($request->validated()['id']) ? response()->json(['message' => 'Product deleted successfully'], 200) : response()->json(['message' => 'Product not deleted'], 400);
    }
}
