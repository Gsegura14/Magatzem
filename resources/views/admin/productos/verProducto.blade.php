@extends('admin.index')

@section('title', 'Modificar Producto')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('content')
    <h1>Modificar Producto</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('productos.guardarMod',$producto,$stockProducto)}}" method="post">@csrf
                @method('put')
                <div class="row">
                    <div class="col-md-4">
                        <x-adminlte-input name="modelo" id="modelo" label="Modelo" placeholder="Modelo"
                            fgroup-class="col-md-3" value="{{ $producto->modelo }}" disable-feedback />
                        @error('modelo')
                            <x-adminlte-alert theme="danger" title="Error">
                                {{ $message }}
                            </x-adminlte-alert>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <x-adminlte-input name="color" id="color" label="Color" placeholder="Color" fgroup-class="col-md-3"
                            value="{{ $producto->color }}" disable-feedback />
                        @error('color')
                            <x-adminlte-alert theme="danger" title="Error">
                                {{ $message }}
                            </x-adminlte-alert>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input name="referencia_sugerida" id="referencia_sugerida"
                            value="{{ $producto->referencia_sugerida }}" disabled label="Referencia sugerida"
                            placeholder="" fgroup-class="col-md-3" disable-feedback />
                        @error('referencia_sugerida')
                            <x-adminlte-alert theme="danger" title="Error">
                                {{ $message }}
                            </x-adminlte-alert>
                        @enderror
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input name="descripcion_corta" id="descripcion_corta"
                            value="{{ $producto->descripcion_corta }}" label="Descripción corta"
                            placeholder="Descipción corta" fgroup-class="col-md-3" disable-feedback />
                        @error('descripcion_corta')
                            <x-adminlte-alert theme="danger" title="Error">
                                {{ $message }}
                            </x-adminlte-alert>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-3">
                        <x-adminlte-select name="selTipo" label="Tipo de producto">

                            @foreach ($tipos as $tipo)

                                <option value="{{ $tipo->id }}" @if ($tipo->id === $producto->tipo_id)
                                    selected='selected'
                            @endif>{{ $tipo->tipo_producto }}
                            </option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                    <div class="col-3">
                        <x-adminlte-select name="selMarca" label="Marca">
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}" @if ($marca->id === $producto->marca_id)
                                    selected='selected'
                            @endif>{{ $marca->nombre_marca }}
                            </option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <x-adminlte-input name="precio_coste" id="precio_coste" label="Precio coste"
                            value="{{ $producto->precio_coste }}" placeholder="0.0" />
                        @error('precio_coste')
                            <x-adminlte-alert theme="danger" title="Error">
                                {{ $message }}
                            </x-adminlte-alert>
                        @enderror
                    </div>

                    <div class="col-3">
                        <x-adminlte-input name="precio_venta" id="precio_venta" label="Precio venta"
                            value="{{ $producto->precio_vta }}" placeholder="0.0" />
                        @error('precio_venta')
                            <x-adminlte-alert theme="danger" title="Error">
                                {{ $message }}
                            </x-adminlte-alert>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <x-adminlte-select name="selPais" label="Made In">
                            <option value="Made in Spain" @if ($producto->made_in == 'Made in Spain')
                                selected='selected' @endif>Made in Spain</option>
                            <option value="Made in China" @if ($producto->made_in == 'Made in China')
                                selected='selected' @endif>Made in China</option>
                        </x-adminlte-select>
                    </div>
                </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4>Tallas</h4>
            <div class="row">
                <div class="col-3 form-group">
                    <label for="selectTallas">Tallas</label>
                    
                    <select class="form-control" name="selectTallas[]" id="selectTallas" multiple>
                        <option value="">-- Tallas --</option>
                        @foreach ($tallas as $talla)
                            <option value="{{ $talla->id }}" @foreach ($stockProducto as $stock)
                                @if ($talla->id == $stock->talla_id)
                                    selected="selected"
                                @endif
                        @endforeach
                        >{{ $talla->id . ' ' . $talla->talla }}

                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#abrirGaleria">
                        Seleccionar imagen
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                </div>
            </div>
            <div class="row float-right">
                <div class="col-12">
                    <a href="{{ route('productos.index') }}">
                        <x-adminlte-button class="btn-flat" label="Cancelar" theme="primary" icon="fa fa-undo"
                            type="button" />
                    </a>
                    <x-adminlte-button class="btn-flat" label="Reset" theme="danger" icon="fas fa-ban" type="reset" />
                    <x-adminlte-button class="btn-flat" label="Guardar" theme="success" icon="fas fa-lg fa-save"
                        type="submit" />
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        id="abrirGaleria" aria-hidden="true" name="abrirGaleria">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal Title</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @foreach ($imagenes as $imagen)
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <input class="radioImagen form-check-input" type="radio" name="radioImagen"
                                            value="{{$imagen->id}}"
                                            @if($imagen->id==$producto->imagen_id)
                                                checked='checked'
                                            @endif
                                            
                                      />  <img src="{{asset($imagen->url)}}" class="card-img-top" alt="Calzado"/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        Save changes
                    </button>
                </div>
            </div>
        </div>

        <input type="hidden" name="selectIdFoto" id="selectIdFoto">



        </form>
    </div>
@stop
@endsection

<!-- Scripts -->
@section('js')
