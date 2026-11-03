<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        h1 { color: #333; }
        .btn { display: inline-block; padding: 8px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; margin-bottom: 20px; }
        .btn:hover { background-color: #0056b3; }
        .btn-edit, .btn-delete { 
            height: 32px; 
            padding: 0 12px; 
            font-size: 14px; 
            border-radius: 4px; 
            cursor: pointer; 
            text-decoration: none; 
            border: none; 
            font-family: Arial, sans-serif;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box; 
        }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-edit:hover { background-color: #e0a800; }
        .btn-delete { background-color: #dc3545; color: white; }
        .btn-delete:hover { background-color: #c82333; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; vertical-align: middle !important; }
        th { background-color: #007bff; color: white; }
        .acciones { display: flex; gap: 6px; align-items: center; }
        .acciones form { display: inline; margin: 0; }
        .btn-edit, .btn-delete { 
            padding: 6px 12px; 
            font-size: 14px; 
            border-radius: 4px; 
            cursor: pointer; 
            text-decoration: none; 
            border: none; 
            font-family: Arial, sans-serif;
            display: inline-block;
            vertical-align: middle;
        }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-edit:hover { background-color: #e0a800; }
        .btn-delete { background-color: #dc3545; color: white; }
        .btn-delete:hover { background-color: #c82333; }
    </style>
</head>
<body>
    <h1>Lista de Productos</h1>

    <a href="{{ route('productos.create') }}" class="btn">+ Agregar Nuevo Producto</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>
        <strong>{{ $producto->currency->symbol ?? '$' }}{{ number_format($producto->precio, 2) }}</strong>
        @if($producto->currency && $producto->currency->exchange_rate > 1)
            <br>
            <small style="color: #6c757d;">
                (≈ Bs. {{ number_format($producto->precio_calculado, 2) }})
            </small>
        @endif
    </td>
                <td>{{ $producto->stock }}</td>
                <td>
                    <div class="acciones">
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn-edit">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>