<div>
    <a href="{{ route('pedidosclientes.index')}}">
        <div class="card bg-secondary">
        <h1 class="text-center mb-0">Clientes</h1>
        <span class="h1 text-center font-weight-bold">{{ $nPedidosClientes }}</span>
        @if ($nPedidosClientes == 1)
            <span class="h3 text-center">pedido</span>
        @else
            <span class="h3 text-center">Pedidos</span>
        @endif

    </div></a>
    
</div>