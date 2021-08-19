@extends('admin.index')
@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <h2>Agregar tallas</h2>
            <div class="card-body">
                <div class="col-6">
                    <div class="input-group-text">
                        <form action="{{Route('tallasProducto.guardar',$producto)}}" method="post">
                            @foreach ($tallas as $index=>$talla)
                            <div class="checkbox">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><input type="checkbox" value="{{$talla->id}}" name="tallas[]">
                                 
                                        {{$talla->talla}}</li>
                                </ul>
                            </div>
                            @endforeach
@csrf
                        
                    </div>
                </div>
<div class="card col-6">
    <div class="card-body">
        <div class="row">
                    <div class="col-6">
                        <a href="{{route('productos.index')}}">
                            <x-adminlte-button class="btn-flat" label="Cancelar" theme="primary" icon="fa fa-undo"
                                type="button" /></a>
                        </div>
                        <div class="col-6">
                        <x-adminlte-button class="btn-flat" type="submit" label="guardar" theme="success"
                            icon="fas fa-lg fa-save" />
                        </div>
                    </div>
    </div>
</div>
  </form>              
            </div>

        </div>

    </div>
</div>
</div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop
@section('js')
<script>
    console.log('Hi!');

</script>

@stop
