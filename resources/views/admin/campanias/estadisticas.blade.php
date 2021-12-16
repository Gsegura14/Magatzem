@extends('admin.index')
@section('title', 'Campañas | Estadísticas Campaña')
@section('content_header')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">

@stop
@section('content')
    <div>@livewire('titulo-estadisticas-campania', ['campaniaId' => $campaniaId])</div>

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 text-center bg-white">@livewire('label-vendidos', ['campaniaId' =>
                $campaniaId])</canvas></div>
            <div class="col-md-3 col-sm-12 text-center bg-white">@livewire('label-faltas', ['campaniaId' =>
                $campaniaId])</canvas></div>
            <div class="col-md-3 col-sm-12 text-center bg-white">@livewire('ventas-ticket-medio', ['campaniaId' =>
                $campaniaId])</div>
            <div class="col-md-3 col-sm-12 text-center bg-white">@livewire('margen-ventas-campania', ['campaniaId' =>
                $campaniaId])</div>

        </div>

        <div class="bg-light mt-2 row">

            <div class="col-md-8 col-sm-12 bg-white mr-2">
                @livewire('graphic-po', ['campaniaId' => $campaniaId])
            </div>
            <div class="col-md-3 col-sm-12 border border-primary rounded bg-white">
                @livewire('ventas-dia', ['campaniaId' => $campaniaId])
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 col-sm-12 text-center bg-white">@livewire('top-five', ['campaniaId' =>
                $campaniaId])</canvas></div>
            <div class="col-md-4 col-sm-12 text-center bg-white">@livewire('top-tallas', ['campaniaId' =>
                $campaniaId])</canvas></div>
            <div class="col-md-4 col-sm-12 text-center bg-white">@livewire('grafic-top-tallas', ['campaniaId' =>
                $campaniaId])</div>
        </div>

        <div class="row">
            <div class="col">
                @livewire('resumen-productos-campania', ['campaniaId' => $campaniaId])
            </div>
        </div>
    </div>

@stop

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
