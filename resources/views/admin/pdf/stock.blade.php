<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Stock</title>
</head>
<body>
<div class="row">
    <div class="col-8">
        <h2 class="text-center">Stock</h2>
    </div>
    <div class="col-12">
        <span class="float-right">Fecha :  {{date("d-m-Y")}}</span>
    </div>
   
</div>
<div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Modelo</th>
                <th>Color</th>
                <th>Talla</th>
                <th>SKU</th>
                <th>Código</th>
                <th>Pedido</th>
                <th>Vendido</th>
                <th>Stock</th>
            </tr>
        </thead>

        <tbody>
            
            
            @foreach ($stocks as $stock)
            <tr>
                

                <td class="small">{{$stock->producto->modelo}}</td>
                <td class="small">{{$stock->producto->color}}</td>
                <td class="small">{{$stock->talla->talla}}</td>
                <td class="small">{{$stock->sku}}</td>
                <td class="small">{{$stock->codigo}}</td>
                <td class="text-center small">{{$stock->pedido}}</td>
                <td class="text-center small">{{$stock->vendido}}</td>
                <td class="text-center small">{{$stock->stock}}</td>

            </tr>

            @endforeach
        </tbody>


    </table>
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