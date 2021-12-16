<div>
    <div>
        <a href="{{ route('pedidoProveedor.index')}}" class="text-center">
            <div class="card bg-info">
                <h1 class="text-center font-weight-bold">{{ $mercancia }}</h1>
                @if ($mercancia == 1)
                    <h2 class="text-center">pendiente</h2>
                @else
                    <span class=" h3 text-center mb-4">Unidades pendientes<br>por recibir </span>
                @endif
    
            </div>
        </a>
    </div>
</div>
