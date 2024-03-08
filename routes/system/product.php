<?php

use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)
    ->group(function () {
        Route::post('/', 'createProduct');
        Route::get('/', 'getAllProducts');
        Route::get('/{id}', 'getProduct');
        Route::put('/{id}', 'updateProduct');
        Route::delete('/{id}', 'deleteProduct');
    });
