@extends('admin.index')
@section('title', 'Campañas | Nueva Oferta')
@section('content_header')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">

@stop
@section('content')
    <div class="row">
        <div class="col-8">
            <h1>Campaña : <span class="font-weight-bold">{{ $campaniaId->nombre_campania }}</span></h1>
        </div>
        <div class="col-4">
            <a href="{{ route('index.campanias') }}">
                <x-adminlte-button class="float-right mr-2 mt-2" theme="success" id="btnVolver" icon="fa fa-undo" />
            </a>
            <a href="{{ route('upload.ped', $campaniaId) }}">
                <x-adminlte-button class="float-right mr-2 mt-2" theme="primary" id="btnUpdate" icon="fa fa-upload" />
            </a>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="cliente">Cliente:</x-jet-label>
                    <x-adminlte-input class="w-full" type="text" name="cliente" id="cliente"
                        value="{{ $campaniaId->nombre_campania }}" readonly />
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label>Fecha de inicio</x-jet-label>
                    <x-adminlte-input class="w-full" type="text" name="fecha" readonly id="fecha"
                        value="{{ $campaniaId->fecha_inicio }}" />
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label>Unidades:</x-jet-label>
                    <x-adminlte-input class="w-full" type="text" name="unidades" readonly id="unidades"
                        value="{{ $campaniaId->cantidad_unidades }}" />
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label>Modelos:</x-jet-label>
                    <x-adminlte-input class="w-full" type="text" name="modelos" readonly id="modelos"
                        value="{{ $campaniaId->cant_modelos }}" />
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label>Nºreferencias:</x-jet-label>
                    <x-adminlte-input class="w-full" type="text" name="referencias" readonly id="referencias"
                        value="{{ $campaniaId->cant_refs }}" />
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <table class="table table-striped " id="productos">


            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id Campaña</th>
                    <th>Nombre Campaña</th>
                    <th>Sku</th>
                    <th>Código</th>
                    <th>Talla</th>
                    <th>Descripción</th>
                    <th>Color</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Stock</th>
                    <th>Pedido</th>
                    <th>Servido</th>
                    <th>Precio venta</th>
                    <th>Precio oferta</th>
                </tr>
            </thead>
        </table>
    </div>
@stop

@stop






@push('js')
<script src="sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>


<script>
    $(document).ready(function() {

        $('#productos').DataTable({
            select: true,
            editOnFocus: true,
            retrieve: true,
            "ajax": "{{ route('datatable.stockcampania', ['campaniaId' => $campaniaId]) }}",
            "columns": [{

                    data: 'id'
                },
                {
                    data: 'campania_id'
                },
                {
                    data: 'nombre_campania'
                },
                {
                    data: 'sku'
                },
                {
                    data: 'codigo'
                },
                {
                    data: 'talla'
                },

                {
                    data: 'descripcion_corta'
                },
                {
                    data: 'color'
                },
                {
                    data: 'tipo_producto'
                },
                {
                    data: 'nombre_marca'
                },
                {
                    data: 'stock'
                },
                {
                    data: 'pedido'
                },
                {
                    data: 'servido'
                },
                {
                    data: 'precio_vta'
                },
                {
                    data: 'precio_oferta'
                }

            ],

            "createdRow": function(row, data, index) {
                if (data['pedido'] > 0 && data['pedido'] == data['servido']) {

                    $('td', row).css({
                        'background-color': '#7ef7c3',
                        'color': '#004d24'

                    });

                }
            }

        });


    });
</script>






@endpush
