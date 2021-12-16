@extends('admin.index')

@section('title', 'Nuevo')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


@section('content')
    <h1>Estado Nuevo</h1>
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <form action="{{ route('estados.store') }}" method="post">@csrf
                            <x-adminlte-input name="estado" id="estado" label="Estado" placeholder="Estado" />

                            <x-adminlte-button class="btn-flat" label="Reset" theme="danger" icon="fas fa-ban"
                                type="reset" />
                            <x-adminlte-button class="btn-flat" label="Guardar" theme="success"
                                icon="fas fa-lg fa-save" type="submit" />
                    </div>
                </div>
            </div>


        </div>
    </div>



@stop
@endsection


<!-- Scripts -->
@section('js')
