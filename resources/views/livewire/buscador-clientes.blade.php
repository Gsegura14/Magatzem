<div>

<div class="row">
    <div class="col-8"><h1>Pedido Nuevo</h1></div>
    <div class="col-4">
        <x-adminlte-button class="float-right mr-2 mt-2" theme="danger" wire:click="salir()"
                label="Salir" id="btnSalir" />
            <x-adminlte-button class="float-right mr-2 mt-2" theme="success" onclick="location.reload()"
                label="Nuevo" id="btnNuevo" />
                
        </div>
        
    </div>

    <div class="card">
        <div class="card-body">
            @if ($clientes->count())
                <div class="container">

                    <div class="row d-flex align-items-center">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group" wire:ignore>
                                <label>Cliente :</label>
                                <select class="select2" style="width: 100%;" wire:model="cliente_id">
                                    <option value="">-- Buscar cliente --</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>

                                    @endforeach
                                 
                                </select>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 mt-3">
                            <x-adminlte-button class="float-right btn-block" theme="primary" wire:click="crearPedido()"
                                label="Seleccionar" id="btnSeleccionar" />
                        </div>
                        
                    </div>
                </div>

            @endif
        </div>
    </div>

    @push('js')
        <script src="sweetalert2.all.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.select2').select2();
                $('.select2').on('change', function() {
                    @this.set('cliente_id', this.value);

                });

            });
        </script>
        <script>
          document.addEventListener('livewire:load', function () {
            $('#btnSeleccionar').on('click', function() {
                    $('.select2').select2();
                   var campo =  $('.select2').val();
                    if (campo == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '¡Debes seleccionar un cliente!',
                            // footer: '<a href="">Why do I have this issue?</a>'
                        })

                    }

                });
        })
                
            
        </script>

            
      
    @endpush


</div>
