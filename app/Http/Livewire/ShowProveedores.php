<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cabeceraproveedores;
use App\Models\Proveedor;
use App\Models\npedidoproveedor;
use Illuminate\Support\Carbon;

class ShowProveedores extends Component
{
    
    public $proveedor;
    public $search;
    
    public function render()
    {
        $proveedores = Proveedor::where('nombre_proveedor','like','%' . $this->search . '%')->get();
        return view('livewire.show-proveedores',compact('proveedores'));
    }

    public function crear_pedido(Proveedor $proveedor){
        $this->proveedor = $proveedor->id;
        $cabecera = new Cabeceraproveedores();
        $ultimo_pedido = npedidoproveedor::where('id',1)->first();
        $numero = $ultimo_pedido->ultimo_pedido;
        // Localizamos el último pedido realizado y actualizamos
        $numero++;
        
        $cabecera->n_pedido = $numero;
        $cabecera->f_pedido =now();
        $cabecera->f_servicio = now()->addDays(15);
        $cabecera->proveedor_id = $this->proveedor;
        $cabecera->total = 0;

        $cabecera->save();

        // Actualizamos en la tabla contador de pedidos el último pedido realizado.
        // $ultimo_pedido->ultimo_pedido = $n_pedido;
        // $ultimo_pedido->save();

        $ultimo_pedido::where('id',1)->update(['ultimo_pedido' => $cabecera->n_pedido]);
        $nombre_proveedor = $cabecera->proveedor->nombre_proveedor;
        $this->emit('mostrar_cabecera',$nombre_proveedor,
                    $cabecera->n_pedido,$cabecera->f_pedido,$cabecera->f_servicio,
                    $cabecera->proveedor->id,$cabecera->total,$cabecera->id);
        

    }

    

   
}
