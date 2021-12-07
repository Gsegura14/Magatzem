<div>

<h2 class="text-center">Resumen de pedidos</h2>
<table class="table table-striped">
    <thead>
        <td class="text-center">Modelo</td>
        <td class="text-center">Color</td>
        <td class="text-center">Descripción</td>
        <td class="text-center">Cantidad</td>
        <td class="text-center">Precio vta</td>
        <td class="text-center">Total</td>
    </thead>

    @foreach ($pedidos as $pedido)
        <tr>
            <td class="text-center">{{$pedido->modelo}}</td>
            <td class="text-center">{{$pedido->color}}</td>
            <td class="text-center">{{$pedido->descripcion}}</td>
            <td class="text-center">{{$pedido->cantidad}}</td>
            <td class="text-center">{{$pedido->precio}}€</td>
            <td class="text-center">{{$pedido->total}}€</td>
        </tr>
    @endforeach
</table>


</div>
