<div>
    <div>
        <a href="{{ route('pedidosclientes.index')}}" class="text-center">
            <div class="card bg-success">
                <h1 class="text-center font-weight-bold">{{ $pendiente }}</h1>
                @if ($pendiente == 1)
                    <span class=" h3 text-center">pendiente por servir</span>
                @else
                    <span class=" h3 text-center mb-4">Unidades pendientes<br>por servir </span>
                @endif
    
            </div>
        </a>
    </div>
</div>