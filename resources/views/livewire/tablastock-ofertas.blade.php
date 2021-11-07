<div>
    <div class="mt-2">
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

    @push('js')
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
                            data:'aceptar',
                                
                        }
                    ],

                    "createdRow": function(row, data, index) {
                        if (data['aceptar']==1) {
                            
                            $('td', row).css({
                                'background-color': '#7ef7c3',
                                'color': '#004d24'
                                
                            });
                            $('td',row).eq(14) == data['ok'];

                        }else{
                            return 'Revisar';
                        }
                    }

                });

            });
        </script>

        {{-- <script>
    $(document).ready(function(){
        var tabla = $('#productos').DataTable({
            "createdRow":function(row,data,index){
                if(data[4]=='35'){
                    $('td',row).css({
                        'background-color':'#ff5252',
                        'color':'white'
                    });
                }
            }
        });
    });
</script> --}}

        <script>
            $(document).ready(function() {
                var table = $('#productos').DataTable();

                $('#productos tbody').on('click', 'tr', function() {
                    $(this).toggleClass('selected');
                });

                $('#button').click(function() {
                    var registros = table.rows('.selected').data();

                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#actualizar').on('change', function() {
                    actualizarTabla();

                });
            });

            function actualizar() {
                alert('hola');
                var table = $('#productos').DataTable();
                table.fnDestroy();
                table = $("#productos").dataTable();
            }
        </script>
    @endpush
</div>
