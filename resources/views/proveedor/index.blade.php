@extends('home')

@section('contenido')
<title>Botón con Ícono - Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <h2 style= "font-size: 5rem; font-family:'Times New Roman', Times, serif" class="text-center">Lista De Proveedores</h2>
    <a href="{{route('home')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Volver</a>
    <a href="{{route('proveedor.create')}}" class="btn btn-primary"> Crear +</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Ubicacion</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedors as $proveedor)
            <tr>
                <td>{{$proveedor->id_proveedor}}</td>
                <td>{{$proveedor->nombrePr}}</td>
                <td>{{$proveedor->telefonoPr}}</td>
                <td>{{$proveedor->ubicacionPr}}</td>
                <td>
    
                    <form action="{{route('proveedor.destroy', $proveedor->id_proveedor)}}" method="POST">
                        @CSRF
                        @method('delete')
                        <a href="{{route('proveedor.edit', $proveedor->id_proveedor)}}" class="btn btn-info">Editar</a>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
            
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
