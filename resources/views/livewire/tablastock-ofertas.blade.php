<div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="productos">
         
                <thead>
                    <tr>
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
                        

                    </tr>


                </thead>
         
            </table>
        </div>
    </div>

    @push('js')
        <script>
            $(document).ready(function() {

                $('#productos').DataTable({
                    select: true,
                    "ajax": "{{ route('datatable.stockoferta',['ofertaId'=>$ofertaId]) }}",
                    "columns": [{
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
                        }
                    ]

                
                });
         
            });
        </script>

    @endpush
</div>
