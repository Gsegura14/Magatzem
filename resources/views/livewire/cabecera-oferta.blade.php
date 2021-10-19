<div>
    <h1>Preparar oferta campaña</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4 form-group" wire:ignore>
                    <x-jet-label for="cliente">Cliente :</x-jet-label>
                    <select class="select2" style="width: 100%;" wire:model="cliente_id">
                        <option value="">-- Buscar cliente --</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>

                        @endforeach

                    </select>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="fecha">Fecha Inicio estimada :</x-jet-label>
                    <x-adminlte-input class="w-full" type="date" name="fecha" wire:model="fecha">
                    </x-adminlte-input>

                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="total">Cantidad total :</x-jet-label>
                    <x-adminlte-input class="w-full" readonly type="text" placeholder=0 name="total"
                        wire:model="total"></x-adminlte-input>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="totalmodelos">Cantidad de modelos :</x-jet-label>
                    <x-adminlte-input class="w-full" id="btnCrear" dreadonly type="text" placeholder=0 name="totalmodelos"
                        wire:model="totalmodelos"></x-adminlte-input>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="totalref">Cantidad de referencias :</x-jet-label>
                    <x-adminlte-input class="w-full" readonly type="text" placeholder=0 name="totalref"
                        wire:model="cantref"></x-adminlte-input>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4">

                    <x-adminlte-button wire:click="crearOferta" id="btnCrear" theme="primary"
                        class="col-md mt-6 float-right btn btn-primary btn-block" label="Crear oferta">Crear pedido
                        
                    </x-adminlte-button>
                    
                </div>
                


            </div>




        </div>
        <input type="hidden" id="control" name="control" wire:model="control">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="productos">
                    {{-- <thead>
                        <tr>
                            <th>Sku</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Talla</th>
                            <th>Código de barras</th>
                            <th>Pedido</th>
                            <th>Vendido</th>
                            <th>Stock</th>
                            <th>Bloquear</th>
                            <th>Precio Coste</th>
                            <th>Precio Venta</th>
                            <th>Precio Oferta</th>
                            <th>%DTO</th>
                        </tr>
                    </thead> --}}
                    <thead>
                    
                        <tr>
                            <th>Sku</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Talla</th>
                            <th>Código de barras</th>
                            <th>Pedido</th>
                            <th>Vendido</th>
                            <th>Stock</th>
                            
                        </tr>
                            

                    </thead>
                    {{-- <tbody>
                        
                        @foreach ($productos as $producto)
                        
                            <input type="hidden" name="producto" wire="stockId" value="{{ $producto->id }}">
                            <tr>
                                <td>{{ $producto->sku }}</td>
                                <td>{{ $producto->producto->descripcion_corta }}</td>
                                <td>{{ $producto->producto->tipo->tipo_producto }}</td>
                                <td>{{ $producto->talla->talla }}</td>
                                <td>{{ $producto->codigo }}</td>
                                <td>{{ $producto->pedido }}</td>
                                <td>{{ $producto->vendido }}</td>
                                <td>{{ $producto->stock }}</td>
                                <td><input type="text" name="bloquear" id="bloquear" value={{ $producto->stock }}></td>
                                <td>{{ $producto->producto->precio_coste }}€</td>
                                <td> <input type="text" name="" id="prventa"   value={{ $producto->producto->precio_vta }}€ readonly></td>
                                <td><input type="text" id="prOferta" default=0
                                        value={{ $producto->producto->precio_vta }}€ /></td>
                                <td><input type="text" id="descuento" value= 0.0  /> </td>
                            </tr>
                        @endforeach
                    </tbody> --}}


                </table>
            </div>
        </div>

    </div>
    
        @push('js')

       

<script>
                $(document).ready(function() {
                    $('.select2').select2();
                    $('.select2').on('change', function() {
                         @this.set('cliente_id', this.value);

                    });
                });
</script>


<script>
    $(document).ready(function(){
      
        $('#productos').DataTable({
            select:true,
            "ajax": "{{route('datatable.stockoferta')}}",
            "columns":[
                {data:'sku'},
                {data:'descripcion_corta'},
                {data:'tipo_producto'},
                {data:'talla'},
                {data:'codigo'},
                {data:'pedido'},
                {data:'vendido'},
                {data:'stock'}

                

            ]
        });
    //  $('#productos tbody').on('click','#descuento',function(){
    //     $('#productos tbody').on('blur','tr',function(e){
    //         //var proferta = $(this).find('#prOferta').val();
    //         var prventa = $(this).find('#prventa').val();
    //         var descuento = $(this).find('#descuento').val();            
    //             $(this).find("#prOferta").val(calcularPrecio(prventa,descuento));
                
    //             //$(this).find("#descuento").val(calcularDto(prventa,proferta))
    //        });
    //  });    


    // $('#productos tbody').on('click','#prOferta',function(){
    //     $(this).find("#descuento").val(0);
    //     $('#productos tbody').on('blur','tr',function(e){
            
    //         var proferta = $(this).find('#prOferta').val();
    //         var prventa = $(this).find('#prventa').val();
    //        // var descuento = $(this).find('#descuento').val();            
    //            // $(this).find("#prOferta").val(calcularPrecio(prventa,descuento));
    //             $(this).find("#descuento").val(calcularDto(prventa,proferta));
    //        });
    // });    
        



    //     function calcularPrecio(prv,dto){

    //         let p = parseInt(prv);
    //         let d = parseInt(dto);
    //         let precio =p*(1-(d/100));
    //         return precio;
    //     }


    //     function calcularDto(prv,pro){
    //         let p = parseInt(prv);
    //         let po = parseInt(pro);
    //         let dto = 100-((po*100)/p);
    //         return dto;
    //     }

    });
</script>










{{-- <script>
     $(document).ready(function() {
 var table = $('#productos').DataTable();
 $('#productos tbody').on( 'click', 'tr', function () {
    $(this).toggleClass('selected');
} );
$('tr').click( function () {
    var ids = $.map(table.rows('.selected').data(), function (item) {
            $proferta = item[11];
            $sku = item[0];
            alert('Precio :'+$proferta.value+' -- SKU:'+$sku);
           // return item[0];
        });
        console.log(ids)
        alert( table.rows('.selected').data().length );
    } );

     });


</script> --}}

        @endpush

</div>
