@extends('admin.index')

@section('title','Tipos de producto')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<h1>Tipos</h1>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="tipos">
                        <thead>
                            <tr>
                                <th>Id Tipo</th>
                                <th>Tipo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($tipos as $tipo)
                            <tr>
                                <td>{{$tipo->id}}</td>
                                <td>{{$tipo->tipo_producto}}</td>
                                <td>
                                    <x-adminlte-button class="btn-flat" theme="primary" data-toggle="modal"
                                        data-target="#modificarTipo" icon="fas fa-eye" />
                                </td>
                                
                                <td>
                                    <form action="{{route('tipos.destroy',$tipo)}}" method="POST">
                                        <x-adminlte-button class="btn-flat" type="submit" theme="danger"
                                            icon="fas fa-trash" /> @method('delete') @csrf</form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tipos.guardar')}}" method="POST">
                        @csrf
                        <x-adminlte-input name="nombre_tipo" type="text" placeholder="Añadir nuevo tipo" />

                        <x-adminlte-button class="btn-flat" type="submit" label="Añadir" theme="success"
                            icon="fas fa-lg fa-save" />
                </div>
                </form>
            </div>
        </div>
    </div>
        
    
        <x-adminlte-modal id="modificarTipo" title="Modificar tipo">
            <form action="{{route('tipos.guardarmod',$tipo)}}" method="POST">
                <x-adminlte-input name="nombre_tipo_mod" label="Modificar tipo {{$tipo->nombre_tipo}}"
                    placeholder="Introduce el nuevo tipo" disable-feedback />

                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success"
                    icon="fas fa-lg fa-save" />
                @csrf
                @method('put')
            </form>

        </x-adminlte-modal>
    
    @endsection

    @section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tipos').DataTable({
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
    @endsection
