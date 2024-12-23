@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    {{-- <h1 style= "font-size: 5rem; font-family:'Times New Roman', Times, serif" class="text-center" >BIENVENIDOS</h1> --}}
  </div>
@stop

@section('content')
    
<div class="container">
    @yield('contenido') 
  </div>
@stop

@section('css')
    
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop