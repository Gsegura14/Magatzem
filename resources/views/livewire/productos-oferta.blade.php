<div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="productos" wire:model='productos'>
                <thead>
                    <tr>
                        <th>Sku</th>
                        <th>Descripción</th>
                        <th>Tipo</th>
                        <th>Talla</th>
                        <th>Código de barras</th>
                        <th>Pedido</th>
                        <th>Vendido</th>
                        <th>Stock</th>
                        <th>Bloquear</th>
                        <th>Precio Coste</th>
                        <th>Precio Venta</th>
                        <th>Precio Oferta</th>
                        <th>%DTO</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($productos as $producto)
                    
                        <input type="hidden" name="producto" wire="stockId" value="{{ $producto->id }}">
                        <tr>
                            <td>{{ $producto->sku }}</td>
                            <td>{{ $producto->producto->descripcion_corta }}</td>
                            <td>{{ $producto->producto->tipo->tipo_producto }}</td>
                            <td>{{ $producto->talla->talla }}</td>
                            <td>{{ $producto->codigo }}</td>
                            <td>{{ $producto->pedido }}</td>
                            <td>{{ $producto->vendido }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td><input type="text" name="bloquear" id="bloquear" value={{ $producto->stock }}></td>
                            <td>{{ $producto->producto->precio_coste }}€</td>
                            <td id="prventa">{{ $producto->producto->precio_vta }}€</td>
                            <td><input type="text" id="prOferta" default=0
                                    value={{ $producto->producto->precio_vta }}€ /></td>
                            <td><input type="text" id="descuento" class="text-right" default=0 value=0.0 /></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
