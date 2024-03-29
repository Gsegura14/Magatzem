<div>
    <h1>Cliente</h1>
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
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    
                    <x-adminlte-button wire:click="guardarPedido" id="btnCrear" theme="primary"
                        class="col-md-3 mt-4 float-right btn btn-primary btn-block" label="Crear pedido">Crear pedido</x-adminlte-button>
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


      <script>
          var cliente = document.getElementById('cliente');
          cliente.addEventListener('change',function(){
              document.getElementById('dias').focus();
          })
      </script>
    @endpush
   
</div>
