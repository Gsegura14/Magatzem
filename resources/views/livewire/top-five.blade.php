<div>
<h2 class="text-center font-weight-bold text-info">TOP 5</h2>
    <div class="card bg-info">
        <table class="table text-center">
    <thead class="h3 text-center">
        <td>Modelo</td>
        <td>Vendidos</td>
    </thead>
    <?php $i=1?>
        @foreach ($ventasTop as $venta)
            <tr>
                <td class="h5 p-0">{{$i}}.- {{$venta->modelo}}</td>
                <td class="h5 p-0">{{$venta->suma}}</td>
            </tr>
    <?php $i++?>
        @endforeach
    
</table>
    </div>



</div>
