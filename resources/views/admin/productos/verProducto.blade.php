@extends('admin.index')

@section('title','Modificar Producto')
@section('css')


@section('content')
<h1>Modificar Producto</h1>
<div class="card">
    <div class="card-body">
        <form action="{{route('productos.guardarMod',$producto)}}" method="post">
            @method('put')
            <div class="row">
                <x-adminlte-input name="modelo" id="modelo" label="Modelo" placeholder="Modelo" fgroup-class="col-md-3"
                    value="{{$producto->modelo}}" disable-feedback />
                @error('modelo')
                <x-adminlte-alert theme="danger" title="Error">
                    {{$message}}
                </x-adminlte-alert>
                @enderror

            </div>
            <div class="row">
                <x-adminlte-input name="color" id="color" label="Color" placeholder="Color" fgroup-class="col-md-3"
                    value="{{$producto->color}}" disable-feedback />
                @error('color')
                <x-adminlte-alert theme="danger" title="Error">
                    {{$message}}
                </x-adminlte-alert>
                @enderror
            </div>
            <div class="row">
                <x-adminlte-input name="referencia_sugerida" id="referencia_sugerida"
                    value="{{$producto->referencia_sugerida}}" disabled label="Referencia sugerida" placeholder=""
                    fgroup-class="col-md-3" disable-feedback />
                @error('referencia_sugerida')
                <x-adminlte-alert theme="danger" title="Error">
                    {{$message}}
                </x-adminlte-alert>
                @enderror
            </div>
            <div class="row">
                <x-adminlte-input name="descripcion_corta" id="descripcion_corta"
                    value="{{$producto->descripcion_corta}}" label="Descripción corta" placeholder="Descipción corta"
                    fgroup-class="col-md-3" disable-feedback />
                @error('descripcion_corta')
                <x-adminlte-alert theme="danger" title="Error">
                    {{$message}}
                </x-adminlte-alert>
                @enderror
            </div>
            <div class="row">
                <div class="col-3">
                    <x-adminlte-select name="selTipo" label="Tipo de producto">

                        @foreach ($tipos as $tipo)

                        <option value="{{$tipo->id}}" @if($tipo->id===$producto->tipo_id)
                            selected='selected' @endif>{{$tipo->tipo_producto}}
                        </option>
                        @endforeach
                    </x-adminlte-select>
                </div>
                <div class="col-3">
                    <x-adminlte-select name="selMarca" label="Marca">
                        @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}" @if ($marca->id===$producto->marca_id)
                            selected='selected' @endif>{{$marca->nombre_marca}}
                        </option>
                        @endforeach
                    </x-adminlte-select>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <x-adminlte-input name="precio_coste" id="precio_coste" label="Precio coste"
                        value="{{$producto->precio_coste}}" placeholder="0.0" />
                    @error('precio_coste')
                    <x-adminlte-alert theme="danger" title="Error">
                        {{$message}}
                    </x-adminlte-alert>
                    @enderror
                </div>

                <div class="col-3">
                    <x-adminlte-input name="precio_venta" id="precio_venta" label="Precio venta"
                        value="{{$producto->precio_vta}}" placeholder="0.0" />
                    @error('precio_venta')
                    <x-adminlte-alert theme="danger" title="Error">
                        {{$message}}
                    </x-adminlte-alert>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <x-adminlte-select name="selPais" label="Made In">
                        <option value="Made in Spain" @if($producto->made_in=='Made in Spain')
                            selected='selected' @endif>Made in Spain</option>
                        <option value="Made in China" @if($producto->made_in=='Made in China')
                            selected='selected' @endif>Made in China</option>
                    </x-adminlte-select>
                </div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-3">
                    <a href="{{route('productos.index')}}"><x-adminlte-button class="btn-flat" label="Cancelar" theme="primary" icon="fa fa-undo" type="button" /></a>
                    <x-adminlte-button class="btn-flat" label="Guardar" theme="success" icon="fas fa-lg fa-save"
                        type="submit" />
                </div>
            </div>

            @csrf
        </form>
    </div>
</div>
</div>
@endsection

<!-- Scripts -->
@section('js')
