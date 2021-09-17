@extends('admin.index')
@section('title', 'Pedidos | Clientes')

@section('content_header')
    
@stop

@section('content')

<h1>Pedidos Clientes</h1>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº Pedido</th>
                    <th>Cliente</th>
                    <th>Fecha Pedido</th>
                    <th>Fecha Servicio</th>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        @foreach ($pedidosclientes as $pedido)
               <tr>
                   <td>{{$pedido->n_pedido}}</td>
                   <td>{{$pedido->cliente->nombre}}</td>
                   <td>{{$pedido->f_pedido}}</td>
                   <td>{{$pedido->f_servicio}}</td>
                   <td>{{$pedido->total}}</td>
                   <td><form action="{{route('pedidoCliente.show',$pedido)}}" method="GET">
                    <x-adminlte-button class="btn-flat" type="submit"
                    theme="primary" icon="fas fa-eye"/>
                    @csrf
                </form></td>
                   <td><form action="" method="POST">
                    <x-adminlte-button class="btn-flat" type="submit"
                    theme="danger" icon="fas fa-trash"/>
                    @csrf @method('delete')
                </form></td>
               </tr> 
            @endforeach
        </tbody>
        </table>
    </div>
</div>

<form action="{{route('pedidoCliente.nuevo')}}" method="GET">
<x-adminlte-button class="btn-flat" type="submit"
label="Nuevo" theme="success" icon="fas fa-lg fa-save"/>
@csrf

</form>


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