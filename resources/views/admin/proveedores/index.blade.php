@extends('admin.index')
@section('title', 'Proveedores | Lista')

@section('content_header')

@stop

@section('content')


    <div class="row">
        <div class="col-8">
            <h2>Proveedores</h2>
        </div>
        <div class="col-4 mb-2">
            <a href="{{route('admin')}}"><x-adminlte-button class="float-right mr-2 mt-2" theme="danger"
                label="Inicio" id="btnInicio" /></a>
                <a href="{{route('proveedor.nuevo')}}"><x-adminlte-button class="float-right mr-2 mt-2" theme="success"
                    label="Nuevo" id="btnNuevo" /></a>
                    
            </div>
            
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <table class="table table-striped" id="proveedores">
                <thead>
                    <tr>
                        <th>Proveedor</th>
                        <th>Dirección</th>
                        <th>CP</th>
                        <th>Población</th>
                        <th>Provincia</th>
                        <th>Teléfono</th>
                        <th>Teléfono 2</th>
                        <th>Email</th>
                        <th>Contacto</th>
                        <th>CIF</th>
                        <th>Marca</th>
                        <th>Observaciones</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->nombre_proveedor }}</td>
                            <td>{{ $proveedor->direccion }}</td>
                            <td>{{ $proveedor->cp }}</td>
                            <td>{{ $proveedor->poblacion }}</td>
                            <td>{{ $proveedor->provincia }}</td>
                            <td>{{ $proveedor->telefono }}</td>
                            <td>{{ $proveedor->telefono_movil }}</td>
                            <td>{{ $proveedor->email }}</td>
                            <td>{{ $proveedor->contacto }}</td>
                            <td>{{ $proveedor->cif }}</td>
                            <td>{{ $proveedor->marca->nombre_marca }}</td>
                            <td>{{ $proveedor->observaciones }}</td>
                            
                            <td>
                                <form action="{{ route('proveedor.ver', $proveedor) }}" method="GET">
                                    <x-adminlte-button class="btn-flat" type="submit" theme="primary"
                                        icon="fas fa-eye" />
                                    @csrf
                                </form>
                            </td>

                            <td>
                                <form action="{{ route('proveedor.destroy', $proveedor) }}" method="POST">
                                    <x-adminlte-button class="btn-flat" type="submit" theme="danger"
                                        icon="fas fa-trash" />
                                    @method('delete') @csrf
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <form action="{{ route('proveedor.nuevo') }}" method="GET">
        <x-adminlte-button class="btn-flat" type="submit" label="Nuevo" theme="success" icon="fa fa-user" />
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
            $(document).ready(function() {
                $('#proveedores').DataTable({
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
