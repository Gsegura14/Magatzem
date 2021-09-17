<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CabeceraCliente;
use App\Models\lineaspedidocliente;


class ShowCabeceraClientes extends Component
{
public $pedido,$cliente,$n_pedido,$f_pedido,$f_servicio,$dias,$total;
protected $listeners = ['actualizaSumaTotal' => 'actualizaSumaTotal'];

    public function render()
    {
        
        $pedido = $this->pedido;
        $this->cliente = $pedido->cliente->nombre;
        $this->n_pedido = $pedido->n_pedido;
        $this->f_pedido = $pedido->f_pedido;
        $this->f_servicio = $pedido->f_servicio;
        $dias = (strtotime($pedido->f_servicio)-strtotime($pedido->f_pedido))/86400;
        $this->total = $pedido->total;
        $this->dias = $dias;
        return view('livewire.show-cabecera-clientes');
    }


    public function actualizaSumaTotal($pedido_id){
            $this->total = lineaspedidocliente::where('pedido_id',$pedido_id)
            ->sum('total');
        // Actualizamos registro
        CabeceraCliente::where('id',$pedido_id)
        ->update(['total' => $this->total]);
    }

}
