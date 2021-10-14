@extends('admin.index')

@section('title', 'Importar Stock')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


@section('content')
    <h1>Importar Stock</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('stock.import') }}" method="post" enctype="multipart/form-data">@csrf
                <div class="col-md-6 col-sm-12">
                    <x-adminlte-input-file name="stockImport" igroup-size="sm"/>     
                </div>
                <x-adminlte-button type="submit" theme="success" label="Subir" />
                <p>Descargue una plantilla excel haciendo click <a href="{{asset('plantillasExcel\stock.xlsx')}}">aquí</a></p>
                

    </div>
    
            </form>
        </div>
    </div>


@stop
@endsection


<!-- Scripts -->
@section('js')
