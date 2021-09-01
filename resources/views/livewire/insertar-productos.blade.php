<div>
    <h1>Insertar Producto</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col" wire:ignore>
                    <label for="modelo"> Modelo :</label>
                    <select class="form-control" wire:model="selectedModelo" name="modelo" id="modelo"
                        class="slModelo">
                        <option value="">-- Modelo --</option>
                        @foreach ($modelos as $modelo)
                            <option value="{{ $modelo->id }}">{{ $modelo->referencia_sugerida }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    @if (!is_null($tallas))
                        <label for="talla"> Talla :</label>
                        <select wire:model="selectedTalla" name="talla" id="talla" class="slTalla">
                            <option value="">-- Talla --</option>

                            @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">{{ $talla->talla }}
                                </option>
                            @endforeach

                        </select>
                    @endif
                </div>
                <div class="col">
                    <label for="cantidad">Cantidad :</label>
                    <x-jet-input class="form-control" wire:model="cantidad"></x-jet-input>
                </div>
                <div class="col">
                    <label for="precio">Precio :</label>
                    <x-jet-input class="form-control" wire:model="precio"></x-jet-input>
                </div>
                <div class="col">
                    <label for="subtotal">Subtotal :</label>
                    <x-jet-input class="form-control" wire:model="subtotal"></x-jet-input>
                </div>
                <x-jet-button class="btn btn-primary" wire:click="insertarLinea">Añadir</x-jet-button>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            $('.slModelo').select2();
            $('.slModelo').on('change', function() {
                @this.set('selectedModelo', this.value)
                $('.slTalla').select2();
            $('.slTalla').on('change', function() {
                @this.set('selectedTalla', this.value)
            });
            });
        })
    </script>

</div>
