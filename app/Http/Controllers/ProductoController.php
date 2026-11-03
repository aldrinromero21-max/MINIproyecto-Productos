<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return response()->json(Producto::with('currency')->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:200',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'tax_cost' => 'nullable|numeric',
            'manufacturing_cost' => 'nullable|numeric',
            'currency_id' => 'nullable|exists:currencies,id',
        ]);

        $producto = Producto::create($validated);

        return response()->json([
            'message' => 'Producto creado exitosamente',
            'data' => $producto
        ], 201);
    }

    public function show($id)
    {
        $producto = Producto::with('currency', 'prices')->findOrFail($id);
        return response()->json($producto, 200);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:200',
            'descripcion' => 'nullable|string',
            'precio' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
            'tax_cost' => 'nullable|numeric',
            'manufacturing_cost' => 'nullable|numeric',
            'currency_id' => 'nullable|exists:currencies,id',
        ]);

        $producto->update($validated);

        return response()->json([
            'message' => 'Producto actualizado exitosamente',
            'data' => $producto
        ], 200);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return response()->json([
            'message' => 'Producto eliminado exitosamente'
        ], 200);
    }
}