@extends('admin.index')

@section('title', 'Clientes')
@section('css')


@section('content')
    <h1>Cliente nuevo</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cliente.update',$cliente) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-3">
                        <x-adminlte-input name="cliente" id="cliente" label="*Cliente" placeholder="Cliente"
                            disable-feedback value="{{$cliente->nombre}}" />

                        @error('cliente')
                            <x-adminlte-alert theme="danger" title="Error">
                                {{ $message }}
                            </x-adminlte-alert>
                        @enderror
                    </div>


                </div>


                <div class="row">
                    <x-adminlte-input name="domicilio" id="domicilio" label="*Domicilio" placeholder="Domicilio"
                        fgroup-class="col-md-3" disable-feedback value="{{$cliente->domicilio}}" />
                    @error('domicilio')
                        <x-adminlte-alert theme="danger" title="Error">
                            {{ $message }}
                        </x-adminlte-alert>
                    @enderror
                </div>

                <div class="row">
                    <x-adminlte-input name="cp" id="cp" label="*Código Postal" placeholder="00000" fgroup-class="col-md-3"
                        disable-feedback value="{{$cliente->cp}}"/>

                    @error('cp')
                        <x-adminlte-alert theme="danger" title="Error">
                            {{ $message }}
                        </x-adminlte-alert>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-3">
                        <x-adminlte-input name="poblacion" id="poblacion" label="*Población" placeholder="Población" value="{{$cliente->poblacion}}"/>
                        @error('poblacion')
                            <x-adminlte-alert theme="danger" title="Error">
                                {{ $message }}
                            </x-adminlte-alert>
                        @enderror
                    </div>

                    <div class="col-3">
                        <x-adminlte-input name="provincia" id="provincia" label="*Provincia" placeholder="Provincia" value="{{$cliente->provincia}}" />
                        @error('provincia')
                            <x-adminlte-alert theme="danger" title="Error">
                                {{ $message }}
                            </x-adminlte-alert>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <x-adminlte-input name="telefono" id="telefono" label="*Teléfono" placeholder="Teléfono" value="{{$cliente->telefono}}"/>
                        @error('telefono')
                            <x-adminlte-alert theme="danger" title="Error">
                                {{ $message }}
                            </x-adminlte-alert>
                        @enderror
                    </div>
                </div>
                    <div class="row">
                        <div class="col-3">
                            <x-adminlte-input name="email" id="email" label="*Email" placeholder="Email" value="{{$cliente->email}}"/>
                            @error('email')
                                <x-adminlte-alert theme="danger" title="Error">
                                    {{ $message }}
                                </x-adminlte-alert>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <x-adminlte-input name="dni" id="dni" label="*DNI" placeholder="DNI" value="{{$cliente->DNI}}"/>
                            @error('dni')
                                <x-adminlte-alert theme="danger" title="Error">
                                    {{ $message }}
                                </x-adminlte-alert>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-3">
        
                            <a href="{{route('clientes.index')}}">
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

@endsection

<!-- Scripts -->
@section('js')
