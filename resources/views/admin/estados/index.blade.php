@extends('admin.index')

@section('title', 'Estados Campañas')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <h1>Estados de campaña</h1>
        </div>
        <div class="col-4 mb-2">

            <a href="{{ route('admin') }}">
                <x-adminlte-button class="float-right mr-2 mt-2" theme="primary" label="Inicio" id="btnInicio" />
            </a>
            <a href="{{ route('estados.create')}}">
                <x-adminlte-button class="float-right mr-2 mt-2" theme="success" label="Nuevo" id="btnNuevo" />
            </a>


        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="estados">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Estado</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estados as $estado)

                                    <tr class="bg-success">



                                    <tr>

                                        <td>{{ $estado->id }}</td>
                                        <td>{{ $estado->estado }}</td>
                                        <td>
                                            <a href="{{route('estados.destroy',$estado)}}">
                                                <x-adminlte-button class="btn" type="submit" theme="danger"
                                                    icon="fas fa-trash"></x-adminlte-button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('estados.show',$estado)}}">
                                                <x-adminlte-button class="btn" type="submit" theme="primary"
                                                    icon="fas fa-eye"></x-adminlte-button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#estados').DataTable();
        });
    </script>
@endsection
