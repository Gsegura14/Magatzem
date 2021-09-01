<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="proveedor">Proveedor :</label>
                    <x-jet-input class="form-control" wire:model="proveedor" name="proveedor" readonly></x-jet-input>
                </div>
                <div class="col">
                    <label for="n_pedido">Nº pedido :</label>
                    <x-jet-input class="form-control" wire:model="n_pedido" name="n_pedido" readonly></x-jet-input>
                </div>
                <div class="col">
                    <label for="f_pedido">Fecha pedido :</label>
                    <x-jet-input class="form-control" wire:model="f_pedido" name="f_pedido" readonly></x-jet-input>
                </div>
                <div class="col">
                    <label for="f_servicio">Fecha servicio :</label>
                    <x-jet-input class="form-control" wire:model="f_servicio" name="f_servicio" readonly>
                    </x-jet-input>
                </div>
                <div class="col">
                    <label for="total">Total :</label>
                    <x-jet-input class="form-control" wire:model="total" name="total" readonly default=0.0>
                    </x-jet-input>
                </div>
                
            </div>
        </div>
    </div>



</div>
