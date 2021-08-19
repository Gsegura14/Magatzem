@extends('admin.index')
@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<h1 class="mt-4">Subir imagénes</h1>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                {{-- <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf            
                    <div class="form-group">
                    <input type="file" name="imagen" value="imagen" id="" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Subir imagen</button>
                </form> --}}

                <form action="{{route('imagenes.store')}}"
                class="dropzone"
                id="my-awesome-dropzone" method="POST"></form>

            </div>
            <div class="row">
                <div class="col-6 ml-4 mb-2"><a href="{{route('imagenes.index')}}" class="btn btn-primary align-center">Galería</a></div>
            </div>
        </div>




   {{-- <form action="{{route('imagenes.store')}}" method="post" enctype="multipart/form-data" class="dropzone"
   id="my-awesome-dropzone" > --}}

{{-- <x-adminlte-input-file name="imagen" igroup-size="sm" placeholder="Selecciona una imagen..." accept="image/*">
    <x-slot name="frmSubirImagen">
        <div class="input-group-text bg-lightblue">
            <i class="fas fa-upload"></i>
        </div>
    </x-slot>
</x-adminlte-input-file> --}}
{{-- <div class="card card-body">
<x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="primary" icon="fas fa-lg fa-save"/>
</div> --}}

{{-- </form> --}}



    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stop
@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

Dropzone.options.myAwesomeDropzone = {
    headers:{
        'X-CSRF-TOKEN' : "{{csrf_token()}}"
    },
  paramName: "imagen", // The name that will be used to transfer the file
  dictDefaultMessage: 'Arraste una o más imágenes al recuadro para subirlas',
  acceptedFiles: 'image/*',
  maxFiles:5

};
</script>
    
@stop










