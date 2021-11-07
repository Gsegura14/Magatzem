<div>
    <h1>Preparar oferta campaña</h1>
   
    <div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                
                    <div class="col-sm-12 text-center form-group" wire:ignore>
                        <x-jet-label for="cliente">Cliente :</x-jet-label>
                        <select class="select2" style="width: 100%;" wire:model="cliente_id">
                            <option value="">-- Buscar cliente --</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 text-center">
                        <x-jet-label for="fecha">Fecha Inicio estimada :</x-jet-label>
                        <x-adminlte-input class="w-full" type="date" name="fecha" wire:model="fecha">
                        </x-adminlte-input>
                    </div>
                    
                    <div class="col-sm-12 text-center">
                        <x-adminlte-button wire:click="crearOferta" id="btnCrear" theme="primary"
                            class="col-sm mt-6 float-right btn btn-primary btn-block" label="Crear oferta">Crear pedido
                        </x-adminlte-button>
                    </div>
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
       
       @endpush
    
    </div>

</div>
