@extends('admin.index')

@section('title','Stock')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
<h1>Stock</h1>
<div class="card">
    <div class="card-body">
        
        <table class="table table-striped" id="productos">
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Talla</th>
                    <th>SKU</th>
                    <th>Código</th>
                    <th>Pedido</th>
                    <th>Vendido</th>
                    <th>Stock</th>
                    {{-- <th></th>
                    <th></th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                <tr>
                    <td>{{$stock->producto->modelo}}</td>
                    <td>{{$stock->producto->color}}</td>
                    <td>{{$stock->talla->talla}}</td>
                    <td>{{$stock->sku}}</td>
                    <td>{{$stock->codigo}}</td>
                    <td>{{$stock->pedido}}</td>
                    <td>{{$stock->vendido}}</td>
                    <td>{{$stock->stock}}</td>

                    {{-- <td>
                        <form action="" method="GET">
                            <x-adminlte-button class="btn-flat" type="submit" theme="primary" icon="fas fa-eye" /> @csrf
                        </form>
                    </td>
                    <td>
                        <form action="" method="POST">
                            <x-adminlte-button class="btn-flat" type="submit" theme="danger" icon="fas fa-trash" />
                            @method('delete') @csrf</form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>
<div class="row">
    <div class="col-2">
        <form action="{{route('productos.nuevo')}}" method="GET">
            <x-adminlte-button class="btn-flat" type="submit" label="Nuevo" theme="success" icon="fas fa-lg fa-save" />
            @csrf
        </form>
    </div>
    <div class="col-2">
        <form action="">
            <x-adminlte-button class="btn-flat" label="PDF" theme="danger" icon="fa fa-file-pdf" />
        </form>
    </div>
</div>


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
