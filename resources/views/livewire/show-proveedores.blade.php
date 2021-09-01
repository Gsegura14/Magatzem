<div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-table>
     
        <div class = "px-6 py-4">
            {{-- <input type="text" wire:model="search"> --}}
            <x-jet-input wire:model="search" class="w-full" placeholder="Buscar proveedor..." type="text" />
        </div>
        @if ($proveedores->count())
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Proveedor
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Marca:
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($proveedores as $proveedor)


                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $proveedor->nombre_proveedor }}</div>
                            <div class="text-sm text-gray-500">{{ $proveedor->email }}</div>
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-500">
                            Marca :{{ $proveedor->marca->nombre_marca }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <x-jet-button wire:click="crear_pedido({{$proveedor}})" class="btn btn-primary">
                                Seleccionar
                            </x-jet-button>
                        </td>
                    </tr>
                @endforeach
                <!-- More people... -->
            </tbody>
        </table>  
        @else
           <div class="px-6 py-4">
              No existe ningún proveedor 
           </div>
        @endif
        
    </x-table>


</div>
