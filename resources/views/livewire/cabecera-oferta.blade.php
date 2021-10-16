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
                    <x-jet-label for="total">Cantidad de modelos :</x-jet-label>
                    <x-adminlte-input class="w-full" readonly type="text" placeholder=0 name="total"
                        wire:model="total"></x-adminlte-input>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="total">Cantidad de referencias :</x-jet-label>
                    <x-adminlte-input class="w-full" readonly type="text" placeholder=0 name="total"
                        wire:model="total"></x-adminlte-input>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4">

                    <x-adminlte-button wire:click="crearOferta" id="btnCrear" theme="primary"
                        class="col-md mt-6 float-right btn btn-primary btn-block" label="Crear oferta">Crear pedido
                        
                    </x-adminlte-button>
                    <div wire:loading>
                        Processing Payment...
                    </div>
                </div>
                


            </div>




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

            <script src="sweetalert2.all.min.js"></script>

            <script>
                document.addEventListener('livewire:load', function() {
                    $('#btnCrear').on('click', function() {

                        var campo = $('#dias').val();
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
