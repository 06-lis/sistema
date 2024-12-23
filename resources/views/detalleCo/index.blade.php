@extends('home') 

@section('contenido')
<title>Botón con Ícono - Bootstrap</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <h2 style= "font-size: 5rem; font-family:'Times New Roman', Times, serif" class="text-center">Lista De Detalles De Las Compras</h2>
    <a href="/home" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Volver</a>
    <a href="/detalleCo/crear" class="btn btn-primary"> Crear +</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha de la compra</th>  
                <th scope="col">Precio unitario</th>
                <th scope="col">Cantidad de producto</th>  
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
      
            @foreach($detalleCs as $detalleC)
               
                    <tr>
                        <td>
                            @foreach($detalleAs as $detalleA )
                                @if ($detalleC->idDal==$detalleA->idDal)
                                {{$detalleC->id_compra}}-{{$detalleA->id_producto}}-{{$detalleA->id_almacen}}
                                @endif
                            @endforeach
                        </td>
                          
                         <td>
                            @foreach($compras as $compra)
                                @if ($detalleC->id_compra==$compra->id_compra)
                                    {{$compra->fechaCo}}  
                                @endif
                            @endforeach
                        </td>
                         
                        
                        <td>
                            {{$detalleC->precioDc}} 
                        
                        </td>

                        <td>
                            {{$detalleC->cantidadDc}}  
                        </td>

                        <td>
                        
                            <form action="/detalleCo/{{$detalleC->idDc}}/{{$detalleC->idDal}}/eliminar" method="POST">
                                @CSRF
                                @method('delete')
                                <a href="/detalleCo/{{$detalleC->idDc}}/{{$detalleC->idDal}}/editar" class="btn btn-info">Editar</a>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                    
                        </td>
                    </tr>
             
            @endforeach
        </tbody>
    </table>
@endsection
