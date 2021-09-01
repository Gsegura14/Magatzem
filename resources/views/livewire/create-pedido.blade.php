<div>
    <h1>Insertar productos</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3" wire:ignore>
                    <label for="modelo"> Modelo :</label>
                    <select wire:model="selectedModelo" name="modelo" id="modelo" class="slModelo">
                        <option value="">-- Modelo --</option>
                        @foreach ($modelos as $modelo)
                            <option value="{{ $modelo->id }}">{{ $modelo->referencia_sugerida }}
                            </option>
                        @endforeach
                    </select>
                </div>
@if (!is_null($tallas))
                <div class="col-2">
                    <label for="talla"> Talla :</label>
                    <select wire:model="selectedTalla" name="talla" id="talla" class="slTalla">
                        <option value="">-- Talla --</option>
                        
                        @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">{{ $talla->talla }}
                                </option>
                            @endforeach
                        
                    </select>
                </div>
@endif

                <div class="col">

                    <label for="cantidad">Cantidad :</label>
                    <x-jet-input class="form-group" wire:model="cantidad" type="text" name="cantidad" />
                </div>

                <div class="col">
                    <label for="precio">Precio :</label>
                    <x-jet-input class="form-group" wire:model="precio" type="text" name="precio" />
                </div>
                <div class="col">
                    <label for="total">Total :</label>
                    <x-jet-input class="form-group" wire:model="subtotal" type="text" name="total" default="0" />
                </div>
                <div class="col"><input type="button" wire:click="addLinea()" value="Añadir" class="btn btn-primary">
                </div>
            </div>



        </div>
    </div>


</div>
</div>
<script>
    document.addEventListener('livewire:load', function() {
        $('.slModelo').select2();
        $('.slModelo').on('change', function() {
            @this.set('selectedModelo', this.value)
            $('.slTalla').select2();
        $('.slTalla').on('select2:select', function() {
            @this.set('selectedTalla', this.value)
        });
        });
    })
</script>

{{-- <script>
    document.addEventListener('livewire:load', function() {
        $('.slTalla').select2();
        $('.slTalla').on('select2:select', function(e) {
            //@this.set('selectedTalla', this.value)
            var datos = e.params.data;
            @this.set('selectedTalla',datos)
        });
    })
</script> --}}



</div>
