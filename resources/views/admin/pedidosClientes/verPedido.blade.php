@extends('admin.index')
@section('title', 'Pedidos clientes | Modificar')
@section('content_header')
@stop
@section('content')
    
    <div>
        @livewire('show-cabecera-clientes',['pedido' => $pedido])
    </div>
    <div>
        @livewire('show-insertar-productos-clientes',['pedido' => $pedido])
    </div>
    <div>
        @livewire('show-lineas-clientes',['pedido' => $pedido]) 
    </div>
@stop
@section('css')
@stop
@section('js')
@stop
