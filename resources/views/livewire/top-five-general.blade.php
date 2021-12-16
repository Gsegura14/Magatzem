<div>
        <div class="card bg-info">
        <h1 class="text-center mb-0">Modelos TOP</h1>
    <table class="ml-5">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($topFive as $modelo)
        <tr>
            <td>{{$modelo->modelo}}</td>
            <td>{{$modelo->suma}} uds.</td>
        </tr>
            
        @endforeach
        </tbody>
       
    </table>
    </div>
</div>
