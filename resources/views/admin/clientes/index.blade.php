@extends('admin.index')

@section('title','Clientes')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection   

@section('content')
<h1>Clientes</h1>
<div class="card">
    <div class="card-body">
<table class="table table-striped" id="clientes">
    <thead>
        <tr>
            <th>Id cliente</th>
            <th>Nombre de Cliente</th>
            <th>Domicilio</th>
            <th>Código Postal</th>
            <th>Población</th>
            <th>Provincia</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th></th>
            <th></th>
        </tr>
    </thead> 
    <tbody>
    @foreach ($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->domicilio}}</td>
            <td>{{$cliente->cp}}</td>
            <td>{{$cliente->poblacion}}</td>
            <td>{{$cliente->provincia}}</td>
            <td>{{$cliente->DNI}}</td>
            <td>{{$cliente->email}}</td>
            <td>{{$cliente->telefono}}</td>
            <td>
                <form action="{{route('cliente.ver',$cliente)}}" method="GET">
                    <x-adminlte-button class="btn btn-flat" type="submit" theme="primary" icon="fas fa-eye"></x-adminlte-button>
                    @csrf
                </form>
            </td>
            <td>
                <form action="{{route('cliente.destroy',$cliente)}}" method="POST">
                    <x-adminlte-button class="btn-flat" type="submit" theme="danger" icon="fas fa-trash">
                    </x-adminlte-button>
                    @method('delete') @csrf
                </form>
            </td>
        </tr>
    @endforeach
</tbody>   
</table>
</div>
</div>
    <a href="{{route('cliente.nuevo')}}"><x-adminlte-button class="btn-flat" theme="success" icon="fa fa-user" label="Nuevo"></x-admnilte-button></a>    
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <script>
        $(document).ready(function() {
    $('#clientes').DataTable();
} );
    </script>
@endsection