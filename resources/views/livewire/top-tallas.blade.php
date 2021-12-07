<div>
    <h2 class="text-center font-weight-bold text-warning">Ventas x talla</h2>
        <div class="card bg-warning">
            <table class="table text-center">
        <thead class="h3 text-center">
            <td>Talla</td>
            <td>Vendidos</td>
        </thead>
        <?php $i=1?>
            @foreach ($topTallas as $venta)
                <tr>
                    <td class="h5 p-0">{{$i}}.- {{$venta->talla}}</td>
                    <td class="h5 p-0">{{$venta->suma}}</td>
                </tr>
        <?php $i++?>
            @endforeach
        
    </table>
        </div>
    
    
    
    </div>