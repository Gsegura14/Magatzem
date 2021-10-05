<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Pedido Proveedor</title>
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
            <h5>Proveedor</h5>
            <ul class="list-unstyled">
                <li class="small">Nombre : {{ $cabecera->proveedor->nombre_proveedor }}</li>
                <li class="small">Dirección : {{ $cabecera->proveedor->direccion }}</li>
                <li class="small">CP : {{ $cabecera->proveedor->cp }} Población :
                    {{ $cabecera->proveedor->poblacion }}<br>{{ $cabecera->proveedor->provincia }} </li>
                <li class="small">Teléfono : {{ $cabecera->proveedor->telefono }}</li>
                <li class="small">Email : {{ $cabecera->proveedor->email }}</li>
                <li class="small">CIF : {{ $cabecera->proveedor->cif }}</li>
            </ul>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Pedido proveedor</h3>
        </div>
    </div>
    <div>
        <table class="mb-4">
            <tr>
                <th>Proveedor Nº:</th>
                <td class="small">{{ $cabecera->proveedor->id }}</td>
                <th class="ml-4">Pedido Nº:</th>
                <td class="small">{{ $cabecera->n_pedido }}</td>
            </tr>
            <tr>
                <th>Fecha del pedido:</th>
                <td class="small">{{ $cabecera->f_pedido }}</td>
                <th class="ml-4">Fecha de servicio:</th>
                <td class="small">{{ $cabecera->f_servicio }}</td>
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
                    

                        <td class="small">{{ $linea->n_linea }}</td>
                        <td class="small">{{ $linea->stock->producto->modelo }}</td>
                        <td class="small">{{ $linea->stock->sku }}</td>
                        <td class="small">{{ $linea->stock->producto->descripcion_corta }}<br>Talla : {{$linea->stock->talla->talla}}</td>
                        <td class="small text-center">{{ $linea->cantidad }}</td>
                        <td class="small text-right">{{ $linea->precio }}€</td>
                        <td class="small text-right">{{ $linea->total }}€</td>

                </tr>

                @endforeach
            </tbody>


        </table>
    </div>
    <div class="row">
        <div class="col border-top border-dark text-right">
            <span>Total € </span>{{$cabecera->total}} <span> Euros</span>
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
