@extends('admin.index')

@section('title','Campañas')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection   

@section('content')
<div class="row">
    <div class="col-8">
        <h1>Ofertas</h1>
    </div>
    <div class="col-4 mb-2">
        
        <a href="{{ route('admin') }}">
            <x-adminlte-button class="float-right mr-2 mt-2" theme="primary" label="Inicio" id="btnInicio" />
        </a>
        <a href="{{route('crear.oferta.campanya')}}">
            <x-adminlte-button class="float-right mr-2 mt-2" theme="success" label="Nuevo" id="btnNuevo" />
        </a>
        

    </div>

</div>

<div class="card">
    <div class="card-body">
<table class="table table-striped" id="ofertas">
    <thead>
        <tr>
            <th>Id</th>
            <th>Cliente</th>
            <th>Nombre Campaña</th>
            <th>Fecha Inicio</th>
            <th>Duración</th>
            <th>Unidades</th>
            <th>Modelos</th>
            <th>Referencias</th>
            <th></th>
            {{-- <th></th> --}}
        </tr>
    </thead> 
    <tbody>
    @foreach ($campanias as $campania)
        <tr>
            <td>{{$campania->id}}</td>
            <td>{{$campania->cliente['nombre']}}</td>
            <td>{{$campania->nombre_campania}}</td>
            <td>{{$campania->fecha_inicio}}</td>
            <td>{{$campania->duracion}} días</td>
            <td>{{$campania->cantidad_unidades}}</td>
            <td>{{$campania->cant_modelos}}</td>
            <td>{{$campania->cant_refs}}</td>
            <td>
                  <a href="{{route('campania.show',$campania->id)}}"><x-adminlte-button class="btn btn-flat" type="submit" theme="primary" icon="fas fa-eye"></x-adminlte-button></a>  
            </td>
            {{-- <td>
                <form action="{{route('delete.oferta',$oferta->id)}}" method="POST">
                    <x-adminlte-button class="btn-flat" type="submit" theme="danger" icon="fas fa-trash">
                    </x-adminlte-button>
                    @method('delete') @csrf
                </form>
            </td> --}}
        </tr>
    @endforeach
</tbody>   
</table>
</div>
</div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <script>
        $(document).ready(function() {
    $('#ofertas').DataTable();
} );
    </script>
@endsection