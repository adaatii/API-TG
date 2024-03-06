<?php

use Illuminate\Support\Facades\Route;

Route::controller(EmployeeController::class)
->group(function(){
    Route::post('/', 'createEmployee');
    Route::get('/', 'getAllEmployees');
    Route::get('/{id}', 'getEmployee');
    Route::put('/{id}', 'updateEmployee');
    Route::delete('/{id}', 'deleteEmployee');
});