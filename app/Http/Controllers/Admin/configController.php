<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CabeceraCliente;
use App\Models\Cabeceraproveedores;
use App\Models\lineapedidos;
use App\Models\lineaspedidocliente;
use App\Models\nPedidoCliente;
use App\Models\npedidoproveedor;
use App\Models\Producto;
use App\Models\Stock;

use Illuminate\Http\Request;

class configController extends Controller
{
    public function resetearBD(){

        


        Stock::get()->each->delete();
        Producto::get()->each->delete();
        lineaspedidocliente::get()->each->delete();
        lineapedidos::get()->each->delete();
        CabeceraCliente::get()->each->delete();
        Cabeceraproveedores::get()->each->delete();
        
        $nProveedor = new npedidoproveedor();
        $nProveedor::where('id',1)->update(['ultimo_pedido' => 1]);

        $nCliente = new nPedidoCliente();
        $nCliente::where('id',1)->update(['n_pedido' => 1]);

        return redirect()->route('admin');
    }
}
