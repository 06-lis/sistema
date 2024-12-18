@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Detalle de Venta</h1>
        <form action="{{ route('detalle-ventas.update', $detalleVenta->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id_producto" class="form-label">Producto</label>
                <select name="id_producto" id="id_producto" class="form-control">
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}" {{ $detalleVenta->id_producto == $producto->id ? 'selected' : '' }}>
                            {{ $producto->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_venta" class="form-label">Venta</label>
                <select name="id_venta" id="id_venta" class="form-control">
                    @foreach($ventas as $venta)
                        <option value="{{ $venta->id }}" {{ $detalleVenta->id_venta == $venta->id ? 'selected' : '' }}>
                            {{ $venta->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="cantidadDv" class="form-label">Cantidad</label>
                <input type="number" name="cantidadDv" id="cantidadDv" class="form-control" value="{{ $detalleVenta->cantidadDv }}" required>
            </div>
            <div class="mb-3">
                <label for="precioDv" class="form-label">Precio</label>
                <input type="number" step="0.01" name="precioDv" id="precioDv" class="form-control" value="{{ $detalleVenta->precioDv }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection