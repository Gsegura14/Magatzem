<div>
    <div class="card">
        <div class="card-body">
            <div>
                <div class="row">
                    <div class="form-group col-lg-3 col-md-12 col-sm-12 mt-2" wire:ignore>
                        <label for="selModo">Aplicar:</label>
                        <x-adminlte-select class="select2" wire:model="selModo" name="selModo">
                            <option value="">-- Acción --</option>
                            <option value="3">Asignar % Stock</option>
                            <option value="4">Aumentar % Stock</option>
                            <option value="5">Aumentar cantidad Stock</option>
                            <option value=1>Descuento %</option>
                            <option value=2>Precio</option>
                            
                            
                            
                        </x-adminlte-select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                        <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo"
                            wire:model="modelo">
                    </div>

                    <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                        <input type="text" class="form-control" name="color" id="color" placeholder="Color"
                            wire:model="color">
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                        <input type="text" class="form-control" name="talla" id="talla" placeholder="Talla"
                            wire:model="talla">
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                        <input type="text" class="form-control" name="valor" id="valor" placeholder="Valor"
                            wire:model="valor">
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                        <x-adminlte-button label="Aplicar" theme="primary" class="btn btn-block" id="btnAplicar"
                            wire:click="realizarAccion" />
                    </div>

                </div>
            </div>
        </div>
    </div>
    
        <div class="mt-2" wire:ignore>
            <table class="table table-striped " id="productos">


                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nº Campaña</th>
                        <th>Sku</th>
                        <th>Código</th>
                        <th>Talla</th>
                        <th>Pedido</th>
                        <th>Vendido</th>
                        <th>Stock</th>
                        <th>Descripción</th>
                        <th>Color</th>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Precio venta</th>
                        <th>Precio oferta</th>
                        <th>Aceptar</th>
                    </tr>
                </thead>
            </table>
        </div>
</div>


        @push('js')
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
                $(document).ready(function() {
                    $('.select2').select2();
                    $('.select2').on('change', function() {
                        @this.set('selModo', this.value);

                    });

                });
            </script>
            <script>
                $(document).ready(function() {

                    $('#productos').DataTable({
                        select: true,
                        editOnFocus: true,
                        retrieve: true,
                        "ajax": "{{ route('datatable.stockoferta', ['ofertaId' => $ofertaId]) }}",
                        "columns": [{
                                data: 'id'
                            },
                            {
                                data: 'oferta_id'
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
                                data: 'pedido'
                            },
                            {
                                data: 'vendido'
                            },
                            {
                                data: 'stock'
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
                                data: 'precio_vta'
                            },
                            {
                                data: 'precio_oferta'
                            },
                            {
                                data: 'aceptar',

                            }
                        ],

                        "createdRow": function(row, data, index) {
                            if (data['aceptar'] == 1) {

                                $('td', row).css({
                                    'background-color': '#7ef7c3',
                                    'color': '#004d24'

                                });
                                $('td', row).eq(14) == data['ok'];

                            } else {
                                return 'Revisar';
                            }
                        }

                    });

                    $('#btnAplicar').on('click', function() {
                        $('#productos').DataTable().clear().destroy();
                        $(function() {
                            var table = $('#productos').DataTable({
                                paging: true,
                                destroy: true,
                                scrollY: 300,
                                "ajax": "{{ route('datatable.stockoferta', ['ofertaId' => $ofertaId]) }}",
                                "columns": [{
                                        data: 'id'
                                    },
                                    {
                                        data: 'oferta_id'
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
                                        data: 'pedido'
                                    },
                                    {
                                        data: 'vendido'
                                    },
                                    {
                                        data: 'stock'
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
                                        data: 'precio_vta'
                                    },
                                    {
                                        data: 'precio_oferta'
                                    },
                                    {
                                        data: 'aceptar',

                                    }
                                ],
                            });

                        });
                    })

                });
            </script>

        @endpush
    
</div>