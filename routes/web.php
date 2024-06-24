<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/departments', [DepartmentController::class, 'index']);
Route::post('/api/departments', [DepartmentController::class, 'store']);
Route::get('/api/departments/{id}', [DepartmentController::class, 'show']);
Route::put('/api/departments/{id}', [DepartmentController::class, 'update']);
Route::delete('/api/departments/{id}', [DepartmentController::class, 'destroy']);
Route::get('/api/departments/{id}/subdepartments', [DepartmentController::class, 'subdepartments']);
