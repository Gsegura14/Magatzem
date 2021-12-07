<div>
    <table class="table text-center ">
        <tr>
            <td class="border-top-0">
                <table>
                    <thead>
                        <td class="border-top-0 h5">PO <br>Order</td>
                    </thead>
                    <tr>
                        @foreach ($pos as $p)
                            <td class="text-center w-100 p-0 border-top-0">
                                {{ $p->po_order }}
                            </td>
                    </tr>
                    @endforeach
                </table>
            </td>
            <td class="border-top-0">
                <table>
                    <thead class="text-center w-100">
                        <td class="border-top-0 h5">Unidades <br> Vendidas</td>
                    </thead>
                    <tr>
                        @foreach ($ventasDia as $venta)
                            <td class="text-center w-100 p-0 border-top-0">
                                <span class="bg-primary rounded">{{ $venta->suma }}</span> uds.
                            </td>
                    </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>

</div>
