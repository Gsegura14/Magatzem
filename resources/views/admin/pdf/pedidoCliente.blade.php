<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Pedido cliente</title>
</head>

<body>
    <div class="row">
        <div class="col-8">
            <h3 class="display-3">MAGATZEM</h3>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-8">
            <h5>Cliente</h5>
            <ul class="list-unstyled">
                <li class="small">Nombre : {{ $pedido->cliente->nombre }}</li>
                <li class="small">Dirección : {{ $pedido->cliente->domicilio }}</li>
                <li class="small">CP : {{ $pedido->cliente->cp }} Población :
                    {{ $pedido->cliente->poblacion }}<br>{{ $pedido->cliente->provincia }} </li>
                <li class="small">Teléfono : {{ $pedido->cliente->telefono }}</li>
                <li class="small">Email : {{ $pedido->cliente->email }}</li>
                <li class="small">CIF : {{ $pedido->cliente->DNI }}</li>
            </ul>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Confirmación de pedido</h3>
        </div>
    </div>
    <div>
        <table class="mb-4">
            <tr>
                <th>Cliente Nº:</th>
                <td class="small">{{ $pedido->cliente->id }}</td>
                <th class="ml-4">Pedido Nº:</th>
                <td class="small">{{ $pedido->n_pedido }}</td>
            </tr>
            <tr>
                <th>Fecha del pedido:</th>
                <td class="small">{{ $pedido->f_pedido }}</td>
                <th class="ml-4">Fecha de servicio:</th>
                <td class="small">{{ $pedido->f_servicio }}</td>
            </tr>
        </table>
      
    </div>


    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th>Código</th>
                    <th>Modelo</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                
                
                @foreach ($lineas as $linea)
                <tr>
                    

                        <td>{{ $linea->n_linea }}</td>
                        <td>{{ $linea->stock->producto->modelo }}</td>
                        <td>{{ $linea->stock->producto->referencia_sugerida }}</td>
                        <td>{{ $linea->stock->producto->descripcion_corta }}</td>
                        <td class="text-center">{{ $linea->cantidad }}</td>
                        <td class="text-right">{{ $linea->precio }}€</td>
                        <td class="text-right">{{ $linea->total }}€</td>

                </tr>

                @endforeach
            </tbody>


        </table>
    </div>
    <div class="row">
        <div class="col border-top border-dark text-right">
            <span>Total € </span>{{$pedido->total}} <span> Euros</span>
        </div>
    </div>
    


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


</body>

</html>
