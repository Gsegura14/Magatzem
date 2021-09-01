@extends('admin.index')

@section('title','Pedidos proveedores')
@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('content')
<h1>Nuevo</h1>
<div>
        @livewire('show-proveedores')
</div>
<div>
        @livewire('show-cabecera')
</div>
    <div>
        @livewire('insertar-productos')
</div>
<div>
        @livewire('show-lineas-pedido-proveedores')
</div>
@endsection

<!-- Scripts -->

@section('js')

