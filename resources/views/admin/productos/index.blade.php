@extends('admin.index')

@section('title','Clientes')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
<h1>Productos</h1>
<div class="card">
    <div class="card-body">
        
        <table class="table table-striped" id="productos">
            <thead>
                <tr>
                    <th>Id producto</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Referencia</th>
                    <th>Descripción corta</th>
                    <th>Marca Id</th>
                    <th>Tipo Id</th>
                    <th>Precio coste</th>
                    <th>Precio venta</th>
                    <th>Made In</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->modelo}}</td>
                    <td>{{$producto->color}}</td>
                    <td>{{$producto->referencia_sugerida}}</td>
                    <td>{{$producto->descripcion_corta}}</td>
                    <td>{{$producto->marca_id}}</td>
                    <td>{{$producto->tipo_id}}</td>
                    <td>{{$producto->precio_coste}}</td>
                    <td>{{$producto->precio_vta}}</td>
                    <td>{{$producto->made_in}}</td>

                    <td>
                        <form action="{{route('productos.ver',$producto)}}" method="GET">
                            <x-adminlte-button class="btn-flat" type="submit" theme="primary" icon="fas fa-eye" /> @csrf
                        </form>
                    </td>
                    <td>
                        <form action="{{route('productos.destroy',$producto)}}" method="POST">
                            <x-adminlte-button class="btn-flat" type="submit" theme="danger" icon="fas fa-trash" />
                            @method('delete') @csrf</form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>
<form action="{{route('productos.nuevo')}}" method="GET">
    <x-adminlte-button class="btn-flat" type="submit" label="Nuevo" theme="success" icon="fas fa-lg fa-save" />
    @csrf
</form>
@endsection

<!-- Scripts -->
@section('js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
                $('#productos').DataTable({
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
@endsection
