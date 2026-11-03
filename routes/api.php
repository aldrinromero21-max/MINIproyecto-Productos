<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\ProductPriceController;

// Endpoints para Productos
Route::get('/products', [ProductoController::class, 'index']);
Route::post('/products', [ProductoController::class, 'store']);
Route::get('/products/{id}', [ProductoController::class, 'show']);
Route::put('/products/{id}', [ProductoController::class, 'update']);
Route::delete('/products/{id}', [ProductoController::class, 'destroy']);

// Endpoints para Precios en diferentes divisas del producto
Route::get('/products/{id}/prices', [ProductPriceController::class, 'index']);
Route::post('/products/{id}/prices', [ProductPriceController::class, 'store']);