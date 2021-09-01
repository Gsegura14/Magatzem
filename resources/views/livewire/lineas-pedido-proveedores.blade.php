<div>
    <h1>Productos</h1>
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
            {{-- @foreach () --}}
                <tr>
                    
                    <td class="px-6 py-4 text-sm text-gray-900"></td>
                    <td class="px-6 py-4 text-sm text-gray-900"></td>
                    <td class="px-6 py-4 text-sm text-gray-900"></td>
                    <td class="px-6 py-4 text-sm text-gray-900"></td>
                    <td class="px-6 py-4 text-sm text-gray-900"></td>
                    <td class="px-6 py-4 text-sm text-gray-900"></td>
                    <td class="px-6 py-4 text-sm text-gray-900"></td>
                    <td class="px-6 py-4 text-sm text-gray-900"></td>
                    <td class="px-6 py-4 text-right text-sm font-medium">
                    <td><x-adminlte-button theme="danger" icon="fas fa-trash" wire:click="deleteLinea()"/></td>
                   
                </tr>
            {{-- @endforeach --}}
                
            <!-- More people... -->
        </tbody>

</x-table>
</div>
