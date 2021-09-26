@extends('admin.index')
@section('title', 'Pedidos proveedores | Modificar')
@section('content_header')
@stop
@section('content')
    <div>
        @livewire('show-cabecera-proveedores', ['cabecera' => $cabecera])
    </div>
    <div>
        @livewire('show-insertar-productos-proveedores',['cabecera' => $cabecera])
    </div>
    <div>
        @livewire('show-lineas-proveedores', ['cabecera' => $cabecera])
    </div>
@stop
@section('css')
@stop
@section('js')
@stop
