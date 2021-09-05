<div>
    <h1>Cliente</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col">
                <x-jet-label for="cliente">Cliente :</x-jet-label>
                <x-adminlte-input class="w-full" type="text" name="cliente" readonly wire:model="cliente">Cliente</x-adminlte-input>
            </div>
            <div class="col">
                <x-jet-label for="n_pedido">Nº Pedido :</x-jet-label>
                <x-adminlte-input class="w-full" readonly type="text" name="n_pedido" wire:model="n_pedido"></x-adminlte-input>
            </div>
            <div class="col">
                <x-jet-label for="f_pedido">Fecha pedido :</x-jet-label>
                <x-adminlte-input class="w-full" readonly type="text" name="f_pedido" wire:model="f_pedido"></x-adminlte-input>
                
            </div>
            <div class="col">
                <x-jet-label for="dias">Días de servicio :</x-jet-label>
                <x-adminlte-input type="text" name="dias" wire:model="dias"></x-adminlte-input>
            </div>
            
            <div class="col">
                <x-jet-label for="f_servicio">Fecha Servicio :</x-jet-label>
                <x-adminlte-input class="w-full" readonly type="text" name="f_servicio" wire:model="f_servicio"></x-adminlte-input>
            </div>
            <div class="col">
                <x-jet-label for="total">Total :</x-jet-label>
                <x-adminlte-input class="w-full" readonly type="text" placeholder=0 name="total" wire:model="toral"></x-adminlte-input>
            </div>
            <div class="col">
                <x-jet-button wire:click="guardarPedido" class="btn btn-primary">Seleccionar</x-jet-button>
            </div>
        </div>
        </div>
    </div>
</div>
