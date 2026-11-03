<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductPriceController; 

Route::get('/', function () {
    return view('welcome');
});

Route::resource('productos', ProductoController::class);

// 2. Agrega las rutas de precios de productos requeridas por la prueba
Route::get('/api/products/{id}/prices', [ProductPriceController::class, 'index']);
Route::post('/api/products/{id}/prices', [ProductPriceController::class, 'store']);