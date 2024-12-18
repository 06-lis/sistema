<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <h1>Detalle de Ventas</h1>
        <a href="{{ route('detalle-ventas.create') }}" class="btn btn-primary mb-3">Crear Nuevo</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Venta</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detalleVentas as $detalle)
                    <tr>
                        <td>{{ $detalle->id }}</td>
                        <td>{{ $detalle->producto->nombre }}</td>
                        <td>{{ $detalle->venta->id }}</td>
                        <td>{{ $detalle->cantidadDv }}</td>
                        <td>{{ $detalle->precioDv }}</td>
                        <td>
                            <a href="{{ route('detalle-ventas.edit', $detalle->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('detalle-ventas.destroy', $detalle->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
