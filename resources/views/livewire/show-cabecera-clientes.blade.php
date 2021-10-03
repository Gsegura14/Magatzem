<div>
    <div class="row">
        <div class="col-8">
            <h1>Cliente</h1>
        </div>
        <div class="col-4">
            <a href="{{ route('pedidoCliente.pdf',$pedido) }}">
                <x-adminlte-button class="float-right mr-2 mt-2" theme="danger"  id="btnPdf" icon="fa fa-download" />
            </a>
            <x-adminlte-button class="float-right mr-2 mt-2" theme="danger" wire:click="salir()" label="Salir" id="btnSalir"/>
           <a href="{{route('pedidoCliente.nuevo')}}"><x-adminlte-button class="float-right mr-2 mt-2" theme="success" label="Nuevo" id="btnNuevo" /></a> 
        </div>
    </div>

    
    <div class="card">
        <div class="card-body">
            <div class="row">
               
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="cliente">Cliente :</x-jet-label>
                    <x-adminlte-input class="w-full" type="text" name="cliente" readonly wire:model="cliente" id="cliente">
                        Cliente</x-adminlte-input>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="n_pedido">Nº Pedido :</x-jet-label>
                    <x-adminlte-input class="w-full" readonly type="text" name="n_pedido" wire:model="n_pedido">
      
                    </x-adminlte-input>
                
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="f_pedido">Fecha pedido :</x-jet-label>
                    <x-adminlte-input class="w-full" readonly type="text" name="f_pedido" wire:model="f_pedido">
                    </x-adminlte-input>

                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="dias">Días de servicio :</x-jet-label>
                    <x-adminlte-input type="text" name="dias" id="dias" wire:model="dias"></x-adminlte-input>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="f_servicio">Fecha Servicio :</x-jet-label>
                    <x-adminlte-input class="w-full" readonly type="text" name="f_servicio"
                        wire:model="f_servicio"></x-adminlte-input>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="total">Total :</x-jet-label>
                    <x-adminlte-input class="w-full" readonly type="text" placeholder=0 name="total"
                        wire:model="total"></x-adminlte-input>
                </div>
            </div>
           



        </div>
    </div>

    @push('js')
   
       <script src="sweetalert2.all.min.js"></script>

       <script>
           document.addEventListener('livewire:load', function () {
        $('#btnCrear').on('click', function() {
            
            var campo =  $('#dias').val();
                if (campo == "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '¡Debes indicar un número de días!',
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })

                }

            });
    }) 
       </script>
      
    @endpush
   
</div>
