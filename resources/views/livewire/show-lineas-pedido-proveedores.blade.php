<div>
    <!-- This example requires Tailwind CSS v2.0+ -->
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
