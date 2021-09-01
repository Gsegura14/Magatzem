<div>
    <h1>Proveedor</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <x-jet-label for="nombre_proveedor">Proveedor :</x-jet-label>
                    <x-jet-input disabled class="w-full" type="text" name="nombre_proveedor"
                        wire:model="nombre_proveedor">
                    </x-jet-input>


                </div>
                <div class="col-2">
                    <x-jet-label for="n_pedido">Nº pedido</x-jet-label>
                    <x-jet-input readonly type="text" name="n_pedido" wire:model="n_pedido"></x-jet-input>

                </div>
                <div class="col-2">
                    <x-jet-label for="f_pedido">Fecha pedido</x-jet-label>
                    <x-jet-input readonly type="text" name="f_pedido" wire:model="f_pedido"></x-jet-input>

                </div>
                <div class="col-2">
                    <x-jet-label for="f_servicio">Fecha servicio</x-jet-label>
                    <x-jet-input readonly type="text" name="f_servicio" wire:model="f_servicio"></x-jet-input>

                </div>
                <div class="col-2">
                    <x-jet-label for="total">Total</x-jet-label>
                    <x-jet-input readonly type="text" placeholder="0.0" name="total" wire:model="total"></x-jet-input>

                </div>
                <div class="col-2">
                    <br>
                    <x-jet-button class="btn-primary">Modificar</x-jet-button>
                </div>
            </div>
        </div>
    </div>
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
                        <select  wire:model="selectedTalla" name="talla" id="talla" class="slTalla">
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
                    <x-jet-input class="form-group" wire:model="cantidad" type="text" name="cantidad" default=0 />
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
    <h1>Líneas pedido</h1>
    <div class="card">
        <div class="card-body">

            <x-table>

                <table wire:model='lineas' class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nº línea
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Modelo
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Color
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Descripción
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Talla
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cantidad
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precio
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                            </th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($lineas as $linea)
                            <tr>
                                
                                <td class="px-6 py-4 text-sm text-gray-900">{{$linea->n_linea}}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{$linea->producto->modelo}}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{$linea->producto->color}}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{$linea->producto->descripcion_corta}}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{$linea->talla->talla}}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{$linea->Cantidad}}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{$linea->producto->precio_coste}}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{$linea->total}}</td>
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                <td><x-adminlte-button theme="danger" icon="fas fa-trash" wire:click="deleteLinea({{$linea->id}})"/></td>
                               
                            </tr>
                        @endforeach
                            
                        <!-- More people... -->
                    </tbody>
                </table>



            </x-table>
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
</div>
