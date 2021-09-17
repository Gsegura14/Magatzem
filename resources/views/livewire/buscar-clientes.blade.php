<div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <x-table>
                    <div class="px-6 py4">
                        <x-jet-input wire:model="search" class="w-full" placeholder="Buscar cliente..." type="text"></x-jet-input>            
                    </div>
                    @if($clientes->count()){
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre cliente :</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono :</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email :</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($clientes as $cliente)
                                   <tr>
                                       <td class="text-sm text-gray-500">{{$cliente->nombre}}</td>
                                       <td class="text-sm text-gray-500">{{$cliente->telefono}}</td>
                                       <td class="text-sm text-gray-500">{{$cliente->email}}</td>
                                       <td class="px-6 py-4 text-right text-sm font-medium">
                                           <x-jet-button wire:click="crear_pedido({{$cliente}})" class="btn btn-primary">Seleccionar</x-jet-button>
                                       </td>
                                   </tr> 
                                @endforeach
                            </tbody>
                        </table>
                            
                        @else
                            <div class="px-6 py-4">
                                No existe ningún cliente...
                            </div>
                        @endif
                    }
            
                </x-table>
            </div>
        </div>
        
    </div>
    
</div>
