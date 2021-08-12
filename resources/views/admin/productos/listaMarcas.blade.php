@extends('admin.index')

@section('title','Marcas')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection


@section('content')
<h1>Marcas</h1>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="marcas">
                        <thead>
                            <tr>
                                <th>Id Marca</th>
                                <th>Marca</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marcas as $marca)
                            <tr>
                                <td>{{$marca->id}}</td>
                                <td>{{$marca->nombre_marca}}</td>
                                <td>
                                    <x-adminlte-button class="btn-flat" theme="primary" data-toggle="modal"
                                        data-target="#modificarMarca" icon="fas fa-eye" />
                                </td>
                                <td>
                                    <form action="{{route('marcas.destroy',$marca)}}" method="POST">
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
                    <form action="{{route('marcas.guardar')}}" method="POST">
                        @csrf
                        <x-adminlte-input name="nombre_marca" type="text" placeholder="Añadir marca nueva" />
                        
                        <x-adminlte-button class="btn-flat" type="submit" label="Añadir" theme="success"
                            icon="fas fa-lg fa-save" />
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <x-adminlte-modal id="modificarMarca" title="Modificar marca">
        <form action="{{route('marcas.guardarmod',$marca)}}" method="POST">
            <x-adminlte-input name="nombre_marca_mod" label="Modificar marca {{$marca->nombre_marca}}"
                placeholder="Introduce el nuevo nombre" value="{{$marca->nombre}}" disable-feedback />
                
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success"
                icon="fas fa-lg fa-save" />
            @csrf
            @method('put')
        </form>

    </x-adminlte-modal>

    @endsection

    <!-- Scripts -->
    @section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
                    $('#marcas').DataTable({
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
