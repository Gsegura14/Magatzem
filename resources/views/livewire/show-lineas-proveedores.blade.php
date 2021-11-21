<div>
    <div>
        <h1>Líneas pedido</h1>
        <div class="card">
            <div class="card-body">
                <x-table>
                    <div class="table-responsive-xs">
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
                                        Servido
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
                                <tr @if ($linea->cantidad == $linea->recibido) class="table-success" @endif>

                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->n_linea }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->stock->sku }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            {{ $linea->stock->producto->color }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            {{ $linea->stock->producto->descripcion_corta }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->stock->talla->talla }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->cantidad }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->recibido }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            {{ $linea->stock->producto->precio_vta }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->total }}</td>
                                        <td class="px-6 py-4 text-right text-sm font-medium">
                                        <td>
                                            <x-adminlte-button theme="danger" icon="fas fa-trash"
                                                wire:click="deleteLinea({{ $linea->id }})" />
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </x-table>
            </div>
        </div>
    </div>
</div>
