<div>
    <a href="{{ route('pedidoProveedor.index')}}">
        <div class="card bg-danger">
        <h1 class="text-center mb-0">Proveedores</h1>
        <span class="h1 text-center font-weight-bold">{{ $pedidosProveedores }}</span>
        @if ($pedidosProveedores == 1)
            <span class="h3 text-center mb-2">pedido</span>
        @else
            <span class="h3 text-center mb-2">Pedidos</span>
        @endif

    </div></a>
    
</div>
