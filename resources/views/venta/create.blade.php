@extends('layouts.plantillaBase')

@section ("contenido")
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ruta-a-tu-archivo.css">

    <h2>Registrar Nuevo Venta</h2>
    <form action="/empleado/guardar" method="POST">

        <!-- CSRF Token (Laravel) -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

       
        <div class="mb-3">
            <label for="fechaVe" class="form-label">Fecha de la venta:</label>
            <input type="date" id="fechaVe" name="fechaVe" class="form-control" placeholder="Ingrese la fecha" required>
        </div>
        
  
        <div class="mb-3">
            <label for="montoTotalVe" class="form-label">Monto total:</label>
            <input type="float" id="montoTotalVe" name="montoTotalVe" class="form-control" placeholder="Ingrese el monto total" required>
        </div>
        
        <!-- continuara -->
        <div class="mb-3">
            <label for="id_tipoE" class="form-label">Tipo de Empleado:</label>
            <select id="id_tipoE" name="id_tipoE" class="form-select" required>
                <option value="" disabled selected>Seleccione el tipo de empleado</option>
                <option value="1">Administrador</option>
                <option value="2">Encargado de ventas</option>
                <option value="3">Encargado de compras</option>
                <!-- Agrega más opciones según los tipos disponibles -->
            </select>
        </div>

        <!-- Botones -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/empleado" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
