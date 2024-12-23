@extends('home') 

@section('contenido')
<title>Botón con Ícono - Bootstrap</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <h2 style= "font-size: 5rem; font-family:'Times New Roman', Times, serif" class="text-center">Lista De Detalles De Las Ventas</h2>
    <a href="{{route('home')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Volver</a>
    <a href="{{route('detalleVe.create')}}" class="btn btn-primary"> Crear +</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha de la venta</th>  
                <th scope="col">Precio unitario</th>
                <th scope="col">Cantidad de producto</th>  
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
      
            @foreach($detalleVs as $detalleV)
               
                    <tr>
                        <td>
                            @foreach($detalleAs as $detalleA )
                                @if ($detalleV->idDal==$detalleA->idDal)
                                {{$detalleV->id_venta}}-{{$detalleA->id_producto}}-{{$detalleA->id_almacen}}
                                @endif
                            @endforeach
                        </td>
                          
                         <td>
                            @foreach($ventas as $venta)
                                @if ($detalleV->id_venta==$venta->id_venta)
                                    {{$venta->fechaVe}}  
                                @endif
                            @endforeach
                        </td>
                         
                        
                        <td>
                            {{$detalleV->precioDv}} 
                        
                        </td>

                        <td>
                            {{$detalleV->cantidadDv}}  
                        </td>

                        <td>
                        
                            <form action="{{route('detalleVe.destroy', [$detalleV->idDv, $detalleV->idDal])}}" method="POST">
                                @CSRF
                                @method('delete')
                                <a href="{{route('detalleVe.edit', [$detalleV->idDv, $detalleV->idDal])}}" class="btn btn-info">Editar</a>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                    
                        </td>
                    </tr>
             
            @endforeach
        </tbody>
    </table>
@endsection
