@extends('admin.index')
@section('title', 'Pedidos | Proveedores')

@section('content_header')
    
@stop

@section('content')
<h1>Pedidos Proveedores</h2>
<div class="card">
    <div class="card-body">
        
        <table class="table table-striped" id="cabeceras">
            <thead>
                <tr>
                    <th>Nº Pedido</th>
                    <th>Proveedor</th>
                    <th>Fecha Pedido</th>
                    <th>Fecha Servicio</th>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cabeceras as $cabecera)
                <tr>
                    <td>{{$cabecera->n_pedido}}</td>
                    <td>{{$cabecera->proveedor->nombre_proveedor}}</td>
                    <td>{{$cabecera->f_pedido}}</td>
                    <td>{{$cabecera->f_servicio}}</td>
                    <td>{{$cabecera->total}}</td>
                    <td>
                        <form action="{{route('pedidoProveedor.ver',$cabecera)}}" method="GET">
                            <x-adminlte-button class="btn-flat" type="submit" theme="primary" icon="fas fa-eye" /> 
                            @csrf
                        </form>
                    </td>
                    <td>
                        <form action="{{route('pedidoProveedor.destroy',$cabecera)}}" method="POST">
                            <x-adminlte-button class="btn-flat" type="submit" theme="danger" icon="fas fa-trash" />
                            @method('delete') @csrf
                        </form>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<form action="{{route('pedidoProveedor.nuevo')}}" method="GET">
    <x-adminlte-button class="btn-flat" type="submit" label="Nuevo" theme="success" icon="fas fa-lg fa-save" />
    @csrf
</form>  

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    @stop
@section('js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
                $('#cabeceras').DataTable({
                        responsive: true,
                        autoWidth: false,

                        "language": {
                            "lengthMenu": "Mostrar _MENU_ registros por página",
                            "zeroRecords": "Ningún registro para mostrar",
                            "info": "Mostrando _PAGE_ de _PAGES_",
                            "infoEmpty": "Ningún registro que mostrar",
                            "infoFiltered": "(filtrado de _MAX_ registros totales)",
                            "search": "Buscar",
                            "paginate":{
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                        });
                });

</script>
 
@stop