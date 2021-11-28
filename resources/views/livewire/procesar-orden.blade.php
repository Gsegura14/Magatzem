<div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>Procesar Orden Campaña:</h1>
            </div>
        </div>
        <div class="row mt-2 h-50">
            <div class="col-md-2">
                <div @if ($porcentajeFaltas > $campania->percent)
                    class="alert alert-warning h-100 w-100  d-inline-block"
                @else
                    class="alert alert-success h-100 w-100  d-inline-block"
                    @endif
                    role="alert">
                    <p>Pedidos Servidos PO</p>
                    <input type="hidden" wire:model="porcentajeFaltas">
                    <h2 class="font-weight-bold text-center">{{ $pedidos }}/{{ $servidos }}</h2>

                </div>

            </div>

            <div class="col-md-2">
                <div @if ($porcentajeFaltas > $campania->percent)
                    class="alert alert-warning h-100 w-100  d-inline-block"
                @else
                    class="alert alert-success h-100 w-100  d-inline-block"
                    @endif
                    role="alert">
                    <p>% de faltas PO</p>
                    <input type="hidden" wire:model="porcentajeFaltas">
                    <h2 class="font-weight-bold text-center">{{ $porcentajeFaltas }} %</h2>

                </div>

            </div>

            <div class="col-md-2">
                <div @if ($porcentajeFaltasCampania > $campania->percent)
                    class="alert alert-warning h-100 w-100  d-inline-block"
                @else
                    class="alert alert-success h-100 w-100  d-inline-block"
                    @endif
                    role="alert">
                    <p>Pedidos Servidos Totales</p>
                    <input type="hidden" wire:model="porcentajeFaltas">
                    <h2 class="font-weight-bold text-center">{{ $n_pedidosC }}/{{ $n_servidosC }}</h2>

                </div>

            </div>

            <div class="col-md-2 ">
                <div @if ($porcentajeFaltasCampania > $campania->percent)
                    class="alert alert-warning h-100 w-100  d-inline-block"
                @else
                    class="alert alert-success h-100 w-100  d-inline-block"
                    @endif
                    role="alert">
                    <p>% de faltas Campaña</p>
                    <input type="hidden" wire:model="porcentajeFaltasCampania">
                    <h2 class="font-weight-bold text-center">{{ $porcentajeFaltasCampania }} %</h2>

                </div>

            </div>
            <div class="col-md-2 ">
                <div class="alert alert-warning h-100 w-100  d-inline-block" role="alert">
                    <h2 class="font-weight-bold text-center">{{$n_pedidosC}}/{{ $stockCampania }}</h2>
                    <p class="text-center"><small>% Vendido</small></p>
                    <input type="hidden" wire:model="percentStockVendido">
                    <h2 class="font-weight-bold text-center">{{ $percentStockVendido }} %</h2> 

                </div>

            </div>
            {{-- <div class="col-md-2">
                <div>
                    <input type="hidden" wire:model="progress">
                    <x-adminlte-progress theme="navy" value="{{ $progress }}" vertical  with-label/>

                </div>

            </div> --}}
            <div class="col-md-2">
                <div class="row">
                    <div class="col">
                        <x-adminlte-button label="Packing-List" class="btn-block mt-1 text-center" theme="success"
                            wire:click="exportXls()" />
                        <x-adminlte-button label="Cerrar PO" class="btn-block mt-1 text-center" theme="primary"
                            wire:click="cerrarPO()" />
                        <x-adminlte-button label="Terminar Campaña" class="btn-block mt-1 text-center" theme="primary"
                            wire:click="estadisticas" />



                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <div class="row ">
                    <div class="col-sm-12 col-md-2">
                        <x-jet-label for="clienteId">ID :</x-jet-label>
                        <x-adminlte-input class="w-full" type="text" name="clienteId"
                            value="{{ $campania->id }}" readonly id="clienteId" />

                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-jet-label for="cliente">Cliente :</x-jet-label>
                        <x-adminlte-input class="w-full" type="text" name="cliente"
                            value="{{ $campania->cliente->nombre }}" readonly id="cliente" />
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <x-jet-label for="fecha">Fecha Inicio :</x-jet-label>
                        <x-adminlte-input class="w-full" type="text" name="fecha"
                            value="{{ $campania->fecha_inicio }}" readonly id="fecha" />
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-jet-label for="fecha">Nombre Campaña :</x-jet-label>
                        <x-adminlte-input class="w-full" type="text" name="nombreCampaña"
                            value="{{ $campania->nombre_campania }}" readonly id="nombreCampaña" />
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                        <label>PO Orden :</label>
                        <select class="form-control" style="width: 100%;" wire:model="selectedPO" name="SelectPO">
                            <option value="">-- Selecciona una PO --</option>
                            @foreach ($ordenes as $orden)
                                <option value="{{ $orden->id }}">{{ $orden->po_order }}
                                </option>

                            @endforeach

                        </select>
                        @error('selectedPO') <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <x-jet-label for="cantidadPedida">Nº Pedidos :</x-jet-label>
                        <x-adminlte-input class="w-full" type="text" name="cantidadPedida" readonly
                            id="CantidadPedida" wire:model="pedidos" />
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <x-jet-label for="cantidadPedida">Nº Servidos :</x-jet-label>
                        <x-adminlte-input class="w-full" type="text" name="cantidadServida" readonly
                            id="CantidadServida" wire:model="servidos" />
                    </div>
                    <div class="col ">
                        <div class="row ">
                            <div class="col float-right">
                                <ul>
                                    <li class="bg-light text-center">Pendiente</li>
                                    <li class="bg-primary text-center">Preparado</li>
                                    <li class="bg-success text-center">Enviado</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <x-adminlte-button label="Servir Todos" theme="primary" wire:click="servirTodos()" />
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <x-adminlte-button label="Cancelar Todos" theme="danger" wire:click="cancelarTodos()" />
                    </div>
                    <div class="col-sm-6 col-md-1">
                        <x-adminlte-input class="w-full" type="text" name="editLinea" id="editLinea"
                            placeholder="Línea" wire:model="editLinea" />
                    </div>
                    <div class="col-sm-6 col-md-1">
                        <x-adminlte-input class="w-full text-right" type="text" name="editCantidad" id="editCantidad"
                            default=0 wire:model="editCantidad" />
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <x-adminlte-button label="Aplicar" theme="danger" wire:click="aplicar()" />


                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <table wire:model="lineasProductos" class="table table-striped " id="lineasProductos">
                <thead>
                    <tr>
                        <th>Línea ID</th>
                        <th>PO number</th>
                        <th>SKU</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Talla</th>
                        <th>Descripción</th>
                        <th>EAN</th>
                        <th>Pedido</th>
                        <th>Servido</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($lineas as $linea)
                        <tr @if ($linea->pedido == $linea->servido && $linea->enviado == 1)
                            class="table-success"
                    @endif
                    @if ($linea->pedido == $linea->servido && $linea->enviado == 0)
                        class="table-primary"
                    @endif
                    >
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->po_order }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->sku }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->modelo }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->color }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->talla }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->descripcion_corta }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->codigo }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->pedido }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->servido }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $linea->precio_oferta }}</td>
                    </tr>
                    @endforeach

            </table>
        </div>

    </div>
</div>

</div>

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script>
        function accion() {
            Swal.fire({
                title: 'Vas a cerrar la campaña',
                text: "¡Ya no podrás realizar cambios!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, quiero cerrarla.'
            }).then((result) => {
                if (result.isConfirmed) {
                    $emit('cerrarCampania');

                    Swal.fire(
                        'Hecho!',
                        'Campaña finalizada y guardada en historial',
                        'Ya puedes ver las estadísticas.'
                    )
                }
            })
        }
    </script> --}}


@endpush


</div>
