@extends('admin.index')

@section('title','Pedidos proveedores | Modificar')
@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('content')
<h1>Modificar pedido</h1>
<div>
            <h2>Proveedor</h2>
            {{-- <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <x-jet-label for="nombre_proveedor">Proveedor :</x-jet-label>
                            <x-jet-input disabled class="w-full" type="text" name="nombre_proveedor" Value="{{$cabecera->proveedor->nombre_proveedor}}">
                            </x-jet-input>
        
                        </div>
                        <div class="col-2">
                            <x-jet-label for="n_pedido">Nº pedido</x-jet-label>
                            <x-jet-input readonly type="text" name="n_pedido" value="{{$cabecera->n_pedido}}"></x-jet-input>
        
                        </div>
                        <div class="col-2">
                            <x-jet-label for="f_pedido">Fecha pedido</x-jet-label>
                            <x-jet-input readonly type="text" name="f_pedido" value="{{$cabecera->f_pedido}}"></x-jet-input>
        
                        </div>
                        <div class="col-2">
                            <x-jet-label for="f_servicio">Fecha servicio</x-jet-label>
                            <x-jet-input readonly type="text" name="f_servicio" value="{{$cabecera->f_servicio}}"></x-jet-input>
        
                        </div>
                        <div class="col-2">
                            <x-jet-label for="total">Total</x-jet-label>
                            <x-jet-input readonly type="text" placeholder="0.0" name="total" value="{{$cabecera->total}}"></x-jet-input>
        
                        </div>
                        <div class="col-2">
                            <br>
                            <x-jet-button  class="btn-primary">Modificar</x-jet-button>
                        </div>
                    </div>
                </div>
            </div> --}}
            @livewire('show-pedido-proveedor', ['cabecera' => $cabecera])

        
        

@endsection

<!-- Scripts -->

@section('js')

