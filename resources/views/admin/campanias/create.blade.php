@extends('admin.index')

@section('title', 'Crear Campaña')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Crear Campaña</h1>
        </div>
    </div>
</div>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('campania.procesar',$ofertaId)}}" method="post">@csrf

                <div class="row">
                    
                    <div class="col-md-3">
                        <x-adminlte-input name="cliente" id="cliente" label="Cliente" value="{{$ofertaId->cliente->nombre}}" readonly />
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                        <div class="col-md-3">  
                        <ul>
                            <li>{{$ofertaId->cliente->id}}  {{$ofertaId->cliente->nombre}}</li>
                                    <li>{{$ofertaId->cliente->domicilio}}</li>
                                    <li>{{$ofertaId->cliente->cp}}-{{$ofertaId->cliente->poblacion}}-{{$ofertaId->cliente->provincia}}</li>
                                    <li>{{$ofertaId->cliente->telefono}}</li>
                                    <li><a href="">{{$ofertaId->cliente->email}}</a></li>
                                    <li>{{$ofertaId->cliente->DNI}}</li>
                        </ul>
                                    
                        </col-md-3>
                        </div>
                    </div>
                </div>

                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <x-adminlte-input name="nameCampania" id="nameCampania" label="Nombre de la Campaña" placeholder="Nombre de Campaña" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <x-adminlte-input name="fechaInicio" id="fechaInicio" label="Fecha de Inicio" value="{{$ofertaId->fecha_inicio}}" readonly />
                    </div>
                    <div class="col-md-1 col-sm-12">
                        <x-adminlte-input name="duracion" id="duracion" label="Duración días" value=7 />
                                      </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12"><x-adminlte-input name="unidades" id="unidades" label="Unidades" value="{{$ofertaId->cantidad_unidades}}" readonly /></div>
                    <div class="col-md-3 col-sm-12"><x-adminlte-input name="modelos" id="modelos" label="Cantidad de Modelos" value="{{$ofertaId->cant_modelos}}" readonly /></div>
                    <div class="col-md-3 col-sm-12"><x-adminlte-input name="referencias" id="referencias" label="Cantidad de referencias" value="{{$ofertaId->cant_refs}}" readonly /></div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <x-adminlte-input name="faltas" id="faltas" label="Faltas %" value=1 />
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3 col-sm-12">
                       <a href=""><x-adminlte-button label="Cancelar" theme="danger" /></a> 
                       <x-adminlte-button  label="Crear Campaña" theme="success" type="submit" />
                    </div>
                </div>


            </form>
            


        </div>
    </div>


@stop
@endsection


<!-- Scripts -->
@section('js')