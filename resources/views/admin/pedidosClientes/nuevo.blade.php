@extends('admin.index')
@section('title', 'Pedidos clientes | Nuevo')

@section('content_header')
    
@stop

@section('content')
<h1>Pedido Nuevo</h1>
<div>
    @livewire('buscador-clientes')
</div>
<div>
    
@livewire('cabecera-clientes')

</div>
<div>
    @livewire('insertar-productos-clientes')
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @stop
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@stop