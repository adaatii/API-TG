<?php

use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)
    ->group(function () {
        Route::post('/', 'createCategory');
        Route::get('/', 'getAllCategories');
        Route::get('/{id}', 'getCategory');
        Route::put('/{id}', 'updateCategory');
        Route::delete('/{id}', 'deleteCategory');
    });
