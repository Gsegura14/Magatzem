<div>
    <a href="{{ route('index.campanias') }}" class="text-center">
        <div class="card bg-info">
            <h1 class="text-center font-weight-bold">{{ $campanias }}</h1>
            @if ($campanias == 1)
                <h2 class="text-center"> Campaña <br>en curso</h2>
            @else
                <h2 class="text-center"> Campañas <br>en curso</h2>
            @endif
    </a>
</div>


</div>
