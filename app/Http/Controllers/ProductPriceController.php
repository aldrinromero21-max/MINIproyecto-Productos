<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductPrice;
use App\Models\Producto;

class ProductPriceController extends Controller
{
    public function index($id)
    {
        $producto = Producto::findOrFail($id);
        $prices = $producto->prices()->with('currency')->get();

        return response()->json([
            'success' => true,
            'data' => $prices
        ], 200);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'price' => 'required|numeric|min:0',
        ]);

        $producto = Producto::findOrFail($id);

        $productPrice = ProductPrice::create([
            'product_id' => $producto->id,
            'currency_id' => $request->currency_id,
            'price' => $request->price,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Precio registrado exitosamente',
            'data' => $productPrice
        ], 201);
    }
}