@extends('admin.index')
@section('title', 'Pedidos | Clientes')

@section('content_header')
    
@stop

@section('content')

<div class="row">
    <div class="col-8"><h1>Pedidos Clientes</h1></div>
    <div class="col-4 mb-2">
        <a href="{{route('admin')}}">
            <x-adminlte-button class="float-right mr-2 mt-2" theme="danger"
            label="Inicio" id="btnInicio"/>
        </a>
        <a href="{{route('pedidoCliente.nuevo')}}">
            <x-adminlte-button class="float-right mr-2 mt-2" theme="success"
            label="Nuevo" id="btnNuevo" />
        </a>

    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="clientes">
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
                   <td><form action="{{route('pedidoCliente.destroy',$pedido)}}" method="POST">
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

    @stop
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#clientes').DataTable({
            responsive: true,
            autoWidth: false,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Ningún registro para mostrar",
                "info": "Mostrando _PAGE_ de _PAGES_",
                "infoEmpty": "Ningún registro que mostrar",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>

@stop