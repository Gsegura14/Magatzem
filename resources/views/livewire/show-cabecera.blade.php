<div>
    <h1>Proveedor</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <x-jet-label for="nombre_proveedor">Proveedor :</x-jet-label>
                    <x-adminlte-input disabled class="w-full" type="text" name="nombre_proveedor" wire:model="nombre_proveedor">
                    </x-adminlte-input>

                </div>
                <div class="col-2">
                    <x-jet-label for="n_pedido">Nº pedido</x-jet-label>
                    <x-adminlte-input readonly type="text" name="n_pedido" wire:model="n_pedido"></x-adminlte-input>
                   <input wire:model="cabecera"/>
                </div>
                <div class="col-2">
                    <x-jet-label for="f_pedido">Fecha pedido</x-jet-label>
                    <x-adminlte-input readonly type="text" name="f_pedido" wire:model="f_pedido"></x-adminlte-input>

                </div>
                <div class="col-2">
                    <x-jet-label for="f_servicio">Fecha servicio</x-jet-label>
                    <x-adminlte-input readonly type="text" name="f_servicio" wire:model="f_servicio"></x-adminlte-input>

                </div>
                <div class="col-3">
                    <x-jet-label for="total">Total</x-jet-label>
                    <x-adminlte-input readonly type="text" placeholder="0.0" name="total" wire:model="total"></x-adminlte-input>

                </div>
            </div>
        </div>
    </div>


</div>
