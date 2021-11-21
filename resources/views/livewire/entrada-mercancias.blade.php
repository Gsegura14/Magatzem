<div>
    <div class="container">
        @if ($errorCantidad == 1)
            <div class="alert alert-danger" role="alert">
                La cantidad no puede ser mayor que la cantidad pedida
            </div>
        @endif
        <div class="row">
            <div class="col-8">
                <h1>Entrada de mercancia</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @if ($proveedores->count())
                    <div class="container">

                        <div class="row d-flex align-items-center">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Proveedor :</label>
                                    <select class="form-control" style="width: 100%;" wire:model="selectedProveedor"
                                        name="Proveedor">
                                        <option value="">-- Buscar proveedor --</option>
                                        @foreach ($proveedores as $proveedor)
                                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre_proveedor }}
                                            </option>

                                        @endforeach

                                    </select>
                                    @error('selectedProveedor') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                @endif
                <div class="form-group col-sm-12 col-md-2">
                    @if (!is_null($pedidos))
                        <label>Pedido Nº :</label>
                        <select class="form-control" id="pedidos" wire:model="selectedPedido" name="pedido">
                            <option value="">-- Selecciona Pedido --</option>
                            @foreach ($pedidos as $p)
                                <option value="{{ $p->id }}">{{ $p->n_pedido }}</option>
                            @endforeach
                        </select>
                        @error('selectedPedido') <span class="text-danger">{{ $message }}</span> @enderror
                    @endif
                </div>

            </div>
            <div class="row d-flex align-items-center">
                <div class="form-group col-sm-12 col-md-3 mr-3">
                    <label for="fecha">Fecha de entrada:</label>
                    <x-adminlte-input class="w-full" readonly type="text" name="fecha" wire:model="fecha" />
                </div>
            </div>

            <div class="row">

                <div class="col-lg-2 col-md-12 col-sm-12 mt-2">

                    <select class="form-control" id="lines" wire:model="selectedLinea" name="linea">
                        <option value="">-- Selecciona Línea --</option>
                        @foreach ($lineas as $linea)
                            <option value="{{ $linea->id }}">{{ $linea->n_linea }}</option>
                        @endforeach
                    </select>
                    @error('selectedLinea') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                    <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad"
                        wire:model="cantidad">
                    @error('cantidad') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="hidden" wire:model="errorCantidad">

                </div>
                <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                    <x-adminlte-button label="Registrar" theme="primary" class="btn btn-block" id="btnAplicar"
                        wire:click="procesar" />
                </div>
            </div>

        </div>
    </div>

    <div class="mt-2">


        <table wire:model="lineasProductos" class="table table-striped " id="lineasProductos">


            <thead>
                <tr>
                    <th>Línea</th>
                    <th>Pedido Nº</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Talla</th>
                    <th>Descripcion</th>
                    <th>Pedido</th>
                    <th>Servido</th>
                    <th>Precio</th>
                    <th>Total</th>

                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($lineas as $linea)
                    <tr @if ($linea->cantidad == $linea->recibido) class="table-success" @endif>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->n_linea }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->n_pedido }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->modelo }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->color }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->talla }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->descripcion_corta }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->cantidad }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->recibido }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->precio }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->total }}</td>
                    </tr>
                @endforeach

        </table>
    </div>

</div>
</div>

</div>

@push('js')

@endpush


</div>
