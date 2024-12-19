@extends('layouts.plantillaBase')

@section('contenido')
<title>Botón con Ícono - Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <h2 class="text-center">Lista De Almacenes</h2>
    <a href="/home" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Volver</a>
    <a href="/almacen/crear" class="btn btn-primary"> Crear +</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Direccion</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($almacens as $almacen)
            <tr>
                <td>{{$almacen->id_almacen}}</td>
                <td>{{$almacen->nombreAl}}</td>
                <td>{{$almacen->descripcionAl}}</td>
                <td>{{$almacen->direccionAl}}</td>
                <td>
    
                    <form action="/almacen/{{$almacen->id_almacen}}/eliminar" method="POST">
                        @CSRF
                        @method('delete')
                        <a href="/almacen/{{$almacen->id_almacen}}/editar" class="btn btn-info">Editar</a>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
            
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
