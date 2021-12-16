<div>
    <a href="{{ route('index.campanias') }}" class="text-center">
        <div class="card bg-success">
            <h1 class="text-center font-weight-bold">{{ $nCampanias }}</h1>
            @if ($nCampanias == 1)
                <h2 class="text-center">Campaña <br>realizada</h2>
            @else
                <h2 class="text-center">Campañas <br>realizadas</h2>
            @endif

        </div>
    </a>
</div>
