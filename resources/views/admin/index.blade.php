@extends('layouts.app')
@section('title', 'Dashboard')

@section('content_header')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
@stop

@section('content')

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-3 col-sm-12 bg-white">@livewire('total-facturado')</div>
            <div class="col-md-3 col-sm-12 bg-white">@livewire('campanias-realizadas')</div>
            <div class="col-md-3 col-sm-12 bg-white">@livewire('unidades-vendidas-anyo')</div>
            <div class="col-md-3 col-sm-12 bg-white">@livewire('campanias-en-curso')</div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3 col-sm-12 bg-white">@livewire('pedidos-proveedores')</div>
            <div class="col-md-3 col-sm-12 bg-white">@livewire('mercancia-entrar')</div>
            <div class="col-md-3 col-sm-12 bg-white">@livewire('pedidos-clientes')</div>
            <div class="col-md-3 col-sm-12 bg-white">@livewire('mercancia-servir')</div>
        </div>
        <div class="row p-2">
            <div class="col-md-3 col-sm-12 bg-white">@livewire('top-five-general')</div>
            <div class="col-md-9 col-sm-12 bg-white">@livewire('grafic-modelos')</div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4 col-sm-12 bg-white">@livewire('marcas-top')</div>
            <div class="col-md-8 col-sm-12 bg-white">@livewire('grafic-campanias')</div>
        </div>


    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    
    @stop
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
@stop