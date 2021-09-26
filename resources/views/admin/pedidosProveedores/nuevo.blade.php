@extends('admin.index')
@section('title','Pedidos proveedores | Nuevo')
@section('content_header')
@stop
@section('content')
<div>
        @livewire('buscador-proveedores')
</div>
<div>
        @livewire('cabecera-proveedores')
</div>
<div>
        @livewire('insertar-productos-proveedores')
</div>
<div>
        @livewire('lineas-pedido-proveedores')
</div>
@stop
@section('css')
@stop
<!-- Scripts -->

@section('js')
@stop
