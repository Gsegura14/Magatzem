<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cabeceraproveedores;
use App\Models\lineapedidos;


class ShowCabeceraProveedores extends Component
{
public $cabecera,$proveedor,$n_pedido,$f_pedido,$f_servicio,$dias,$total;
protected $listeners = ['ModActualizaSumaTotal' => 'actualizaSumaTotal'];

    public function render()
    {
        
        $pedido = $this->cabecera;
        $this->proveedor = $pedido->proveedor->nombre_proveedor;
        $this->n_pedido = $pedido->n_pedido;
        $this->f_pedido = $pedido->f_pedido;
        $this->f_servicio = $pedido->f_servicio;
        $dias = (strtotime($pedido->f_servicio)-strtotime($pedido->f_pedido))/86400;
        $this->total = lineapedidos::where('pedido_id',$pedido->id)
        ->sum('total');
        $this->dias = $dias;
        return view('livewire.show-cabecera-proveedores');
    }


    public function actualizaSumaTotal($pedido_id){
            $total = lineapedidos::where('pedido_id',$pedido_id)
            ->sum('total');
            //$this->total = $total;
        // Actualizamos registro
        Cabeceraproveedores::where('id',$pedido_id)
        ->update(['total' => $total]);
    }

    public function salir(){
        return redirect()->route('pedidoProveedor.index');
    }

}
