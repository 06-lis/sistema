@extends('home')

@section ("contenido")
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="ruta-a-tu-archivo.css">

    <h2 style= "font-size: 5rem; font-family:'Times New Roman', Times, serif" class="text-center">Editar Datos Del La Categoria</h2>
    <form action="{{route('categoria.update', $categoria->id)}}" method="POST">
        @method('PUT')
        <!-- CSRF Token (Laravel) -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!-- Nombre -->
        <div class="mb-3">
            <label for="nombreEm" class="form-label">Nombre de la categoria:</label>
            <input type="text" id="nombreEm" name="nombreCat" class="form-control" value="{{$categoria->nombreCat}}" required>
        </div>

        <!-- Dirección -->
        <div class="mb-3">
            <label for="direccion" class="form-label">descripcion de la categoria:</label>
            <input type="text" id="direccion" name="descripcionCat" class="form-control" value="{{$categoria->descripcionCat}}" required>
        </div>

        <!-- Botones -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{route('categoria.index')}}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
