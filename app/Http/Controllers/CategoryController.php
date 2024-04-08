<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Http\Requests\Category\ListCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category\Category;

class CategoryController extends Controller
{
    private $category;

    function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function createCategory(CreateCategoryRequest $request)
    {
        $data = $request->validated();

        return $this->category->createCategory($data) ? response()->json(['message' => 'Category created successfully'], 201) : response()->json(['message' => 'Category not created'], 400);
    }

    public function getAllCategories()
    {
        $response = $this->category->getAllCategories();

        return $response ? response()->json(['error' => false, 'body' => ['message' => 'Categories found successfully!', 'categories' => $response]], 200) : response()->json(['error' => true, 'body' => ['message' => 'Error finding categories!']], 400);
    }

    public function getCategory(ListCategoryRequest $id)
    {
        $response = $this->category->getCategory($id);

        return $response ? response()->json(['error' => false, 'body' => ['message' => 'Category found successfully!', 'category' => $response]], 200) : response()->json(['error' => true, 'body' => ['message' => 'Error finding category!']], 400);
    }

    public function updateCategory(UpdateCategoryRequest $request)
    {
        $data = $request->validated();

        $response = $this->category->updateCategory($data);
        return $response ? response()->json(['message' => 'Category updated successfully'], 200) : response()->json(['message' => 'Category not updated'], 400);
    }

    public function deleteCategory(DeleteCategoryRequest $request)
    {
        return $this->category->deleteCategory($request->validated()['id']) ? response()->json(['message' => 'Category deleted successfully'], 200) : response()->json(['message' => 'Category not deleted'], 400);
    }
}
