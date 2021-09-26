<div>
    <h1>Insertar productos</h1>
    <div class="card">
        <div class="card-body">
        <input type="hidden" name="pedido_id" value="{{$pedido_id}}" id="pedido_id" wire:model="pedido_id">
                <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-4">
                    <div class="form-group" wire:ignore>
                        <label>Modelo :</label>
                        <select class="form-control select2 select23" wire:model="selectedModelo">
                            <option value="">-- Modelo --</option>
                            @foreach ($modelos as $modelo) --}}
                                <option value="{{ $modelo->id }}">
                                    {{ $modelo->producto->modelo }}-{{ $modelo->producto->color }}-{{ $modelo->talla->talla }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <label for="cantidad">Cantidad :</label>
                    <x-jet-input wire:model="cantidad" class="form-control" value=0 id="cantidad"></x-jet-input>
                </div>
                <div class="col-sm-12 col-md-3">
                    <label for="precio">Precio :</label>
                    <x-jet-input wire:model="precio" class="form-control" value=0.0></x-jet-input>
                </div>
                <div class="col-sm-12 col-md-3">
                    <label for="subtotal">Total :</label>
                    <x-jet-input wire:model="subtotal" class="form-control"></x-jet-input>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <x-jet-button class="col-md-3 mt-4 btn btn-primary float-right mt-4 btn-block" wire:click="insertarLinea" id="btnInsertar">Añadir</x-jet-button>
                </div>
            </div>
                
            
            
            
        </div>
    </div>
    @push('js')
    <script src="sweetalert2.all.min.js"></script>
        {{-- Script del select2 --}}
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.select2').on('change', function() {
                // alert(this.value)
                @this.set('selectedModelo', this.value);
            });
        });
    </script>
        {{-- Script de SweetAllert --}}
    <script>
               document.addEventListener('livewire:load', function () {
            $('#btnInsertar').on('click', function() {
                    $('.select23').select2();
                   var campo =  $('.select23').val();
                    if (campo == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '¡Debes seleccionar un producto!',
                            // footer: '<a href="">Why do I have this issue?</a>'
                        })

                    }

                });
        })
    </script>
<script>
        document.addEventListener('livewire:load', function () {
            $('#btnInsertar').on('click', function() {
                   var campo =  $('#cantidad').val();
                    if (campo == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '¡Debes indicar una cantidad!',
                            // footer: '<a href="">Why do I have this issue?</a>'
                        })

                    }

                });
        })
</script>

<script>
    document.addEventListener('livewire:load', function () {
        $('#btnInsertar').on('click', function() {
               $pedido_id = $('#pedido_id').val();
                if ($pedido_id == "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '¡Debes crear el pedido!',
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })

                }

            });
    })
</script>


   
 @endpush
    
    
</div>
