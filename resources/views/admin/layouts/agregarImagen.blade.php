@extends('admin.index')
@section('title', 'Agregar una imagen al producto')

@section('content_header')

@stop

@section('content')
<h1 class="mt-4">Agregar una imagen</h1>
<div class="container">

    <div class="card">
        <div class="card-body">
            <div class="row">
                <form action="{{route('update.imagen',$producto)}}" method="post">
                    @csrf
                    @method('put')
                    @foreach ($imagenes_producto as $imagen)
                    <div class="col-3 form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radioImagen" id="radioImagen"
                            value="{{$imagen->id}}" />
                        <img class="img-thumbnail p-4" src="{{asset($imagen->url)}}" alt="Calzado">
                    </div>
                    @endforeach
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </div>
            </div>
        </div>
    </div>
</div>

</form>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop
@section('js')
<script>
    console.log('Hi!');

</script>

@stop
