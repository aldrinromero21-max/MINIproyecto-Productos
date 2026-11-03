<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        .container { max-width: 500px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; font-size: 24px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #ffc107; color: black; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        button:hover { background-color: #e0a800; }
        .btn-regresar { display: inline-block; margin-top: 15px; color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Producto</h1>
        
        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="3">{{ $producto->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" id="precio" name="precio" value="{{ $producto->precio }}" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" value="{{ $producto->stock }}" required>
            </div>
<div class="form-group">
        <label for="tax_cost">Costo de Impuesto:</label>
        <input type="number" step="0.01" id="tax_cost" name="tax_cost" value="{{ old('tax_cost', $producto->tax_cost ?? 0) }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="manufacturing_cost">Costo de Fabricación:</label>
        <input type="number" step="0.01" id="manufacturing_cost" name="manufacturing_cost" value="{{ old('manufacturing_cost', $producto->manufacturing_cost ?? 0) }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="currency_id">Moneda:</label>
        <select id="currency_id" name="currency_id" class="form-control">
            @foreach($currencies as $currency)
                <option value="{{ $currency->id }}" {{ (old('currency_id', $producto->currency_id) == $currency->id) ? 'selected' : '' }}>
                    {{ $currency->name }} ({{ $currency->symbol }})
                </option>
            @endforeach
        </select>
    </div>
            <button type="submit">Actualizar Producto</button>
        </form>

        <a href="{{ route('productos.index') }}" class="btn-regresar">← Volver al listado</a>
    </div>
</body>
</html>