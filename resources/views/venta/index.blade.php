@extends('layouts.plantillaBase')

@section('contenido')
<title>Botón con Ícono - Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <h2 class="text-center">Lista De Ventas</h2>
    <a href="/home" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Volver</a>
    <a href="/venta/crear" class="btn btn-primary"> Crear +</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha de la venta</th>
                <th scope="col">Monto total</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <td>{{$venta->id_venta}}</td>
                <td>{{$venta->fechaVe}}</td>
                <td>{{$venta->montoTotalVe}}</td>
                <td>
    
                    <form action="/venta/{{$empleado->id_empleado}}/eliminar" method="POST">
                        @CSRF
                        @method('delete')
                        <a href="/venta/{{$empleado->id_empleado}}/editar" class="btn btn-info">Editar</a>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
            
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
