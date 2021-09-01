@extends('admin.index')

@section('title','Pedidos proveedores')
@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">

@section('content')
<h1>Crear Pedido Proveedores</h1>
<div>
        @livewire('create-proveedores')
</div>

@endsection

<!-- Scripts -->

@section('js')