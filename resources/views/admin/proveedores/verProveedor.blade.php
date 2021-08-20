@extends('admin.index')

@section('title','Proveedores')
@section('css')


@section('content')
<h1>Modificar Proveedor</h1>
<div class="card">
    <div class="card-body">
        <form action="{{route('proveedor.update',$proveedor)}}" method="post">
            @csrf @method('put')
            <div class="row">
                <div class="col-md-3">
                    <x-adminlte-input name="proveedor" id="proveedor" label="*Proveedor" placeholder="Proveedor"
                        fgroup-class="" disable-feedback value="{{$proveedor->nombre_proveedor}}" />

                    @error('proveedor')
                    <x-adminlte-alert theme="danger" title="Error">
                        {{ $message }}
                    </x-adminlte-alert>
                    @enderror
                </div>


            </div>


            <div class="row">
                <x-adminlte-input name="direccion" id="direccion" label="*Dirección" placeholder="Dirección"
                    fgroup-class="col-md-3" disable-feedback value="{{$proveedor->direccion}}" />
                @error('direccion')
                <x-adminlte-alert theme="danger" title="Error">
                    {{ $message }}
                </x-adminlte-alert>
                @enderror
            </div>

            <div class="row">
                <x-adminlte-input name="cp" id="cp" label="*Código Postal" placeholder="00000" fgroup-class="col-md-3"
                    disable-feedback value="{{$proveedor->cp}}"/>

                @error('cp')
                <x-adminlte-alert theme="danger" title="Error">
                    {{ $message }}
                </x-adminlte-alert>
                @enderror
            </div>

            <div class="row">
                <div class="col-3">
                    <x-adminlte-input name="poblacion" id="poblacion" label="*Población" placeholder="Población" value="{{$proveedor->poblacion}}"/>
                    @error('poblacion')
                    <x-adminlte-alert theme="danger" title="Error">
                        {{ $message }}
                    </x-adminlte-alert>
                    @enderror
                </div>

                <div class="col-3">
                    <x-adminlte-input name="provincia" id="provincia" label="*Provincia" placeholder="Provincia" value="{{$proveedor->provincia}}"/>
                    @error('provincia')
                    <x-adminlte-alert theme="danger" title="Error">
                        {{ $message }}
                    </x-adminlte-alert>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <x-adminlte-input name="telefono_1" id="telefono_1" label="*Teléfono" placeholder="Teléfono" value="{{$proveedor->telefono}}"/>
                    @error('telefono_1')
                    <x-adminlte-alert theme="danger" title="Error">
                        {{ $message }}
                    </x-adminlte-alert>
                    @enderror
                </div>
                <div class="col-3">
                    <x-adminlte-input name="telefono_2" id="telefono_2" label="Móvil" placeholder="Móvil" value="{{$proveedor->telefono_movil}}"/>
                    @error('telefono_2')
                    <x-adminlte-alert theme="danger" title="Error">
                        {{ $message }}
                    </x-adminlte-alert>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <x-adminlte-input name="contacto" id="contacto" label="Persona de contacto"
                        placeholder="Persona de contacto" value="{{$proveedor->contacto}}"/>
                    @error('contacto')
                    <x-adminlte-alert theme="danger" title="Error">
                        {{ $message }}
                    </x-adminlte-alert>
                    @enderror
                </div>
                <div class="col-3">
                    <x-adminlte-textarea label="Observaciones" rows=5 igroup-size="sm" name="observaciones" placeholder="Observaciones...">
                        {{$proveedor->observaciones}}
                    </x-adminlte-textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <x-adminlte-input name="email" id="email" label="*Email" placeholder="Email" value="{{$proveedor->email}}"/>
                    @error('email')
                    <x-adminlte-alert theme="danger" title="Error">
                        {{ $message }}
                    </x-adminlte-alert>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <x-adminlte-input name="cif" id="cif" label="*CIF" placeholder="CIF" value="{{$proveedor->cif}}"/>
                    @error('cif')
                    <x-adminlte-alert theme="danger" title="Error">
                        {{ $message }}
                    </x-adminlte-alert>
                    @enderror
                </div>
            </div>

            <div class="row">

                <div class="col-3">
                    <x-adminlte-select name="selMarca" label="*Marca">
                        <option disabled selected value> --- </option>
                        @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}" @if ($marca->id===$proveedor->marca_id)
                            selected='selected' @endif>{{$marca->nombre_marca}}</option>
                        @endforeach
                    </x-adminlte-select>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3">

                    <a href="{{route('proveedor.index')}}">
                        <x-adminlte-button class="btn-flat" label="Cancelar" theme="primary" icon="fa fa-undo"
                            type="button" /></a>

                    <x-adminlte-button class="btn-flat" label="Reset" theme="danger" icon="fas fa-ban" type="reset" />
                    <x-adminlte-button class="btn-flat" label="Guardar" theme="success" icon="fas fa-lg fa-save"
                        type="submit" />
                </div>
            </div>

        </form>
    </div>
</div>
</div>
@endsection

<!-- Scripts -->
@section('js')
