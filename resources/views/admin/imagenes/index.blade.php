@extends('admin.index')
@section('title', 'Biblioteca')

@section('content_header')

@stop

@section('content')
<h1 class="mt-4">Biblioteca</h1>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach ($imagenes_producto as $imagen)
                <div class="col-3">
                    <img class="img-thumbnail" src="{{asset($imagen->url)}}" alt="Calzado">
                    <p class="card-text text-center">{{'Modelo :'.$imagen->referencia_sugerida}}</p>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-3"><a href="{{route('imagenes.create')}}" class="btn btn-primary">Añadir</a></div>
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
