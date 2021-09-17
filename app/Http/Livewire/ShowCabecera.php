<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cabeceraproveedores;
use App\Models\lineapedidos;




class ShowCabecera extends Component
{
    protected $listeners =['mostrar_cabecera' => 'mostrar_cabecera',
                            'sumaTotal' => 'sumaTotal'];

    public $nombre_proveedor,$n_pedido,$f_pedido,$f_servicio,$total,$pedido_id;

    public function render()
    {
        return view('livewire.show-cabecera');
    }

    public function mostrar_cabecera($nombre_proveedor,
    $n_pedido,$f_pedido,$f_servicio,$total,$pedido_id){
        $f_pedido = date('d-m-Y', strtotime($f_pedido));
        $f_servicio = date('d-m-Y', strtotime($f_servicio));
        $this->nombre_proveedor = $nombre_proveedor;
        $this->n_pedido = $n_pedido;
        $this->f_pedido = $f_pedido;
        $this->f_servicio = $f_servicio;
        $this->total = $total;
        $this->pedido_id = $pedido_id;
        $this->emit('selectPedido',$this->n_pedido,$this->pedido_id);
        
    }

    // public function sumaTotal($pedido_id,$total){
               
    //     Cabeceraproveedores::where('id',$pedido_id)
    //         ->update(['total' => $total]);
    //  }

    public function sumaTotal($pedido_id){
        $this->total = lineapedidos::where('pedido_id', $this->pedido_id)->get()->sum('total');
        Cabeceraproveedores::where('id',$pedido_id)
        ->update(['total' => $this->total]);

    }

    // public function actualizaTotal($pedido_id){
    //     $this->total = lineapedidos::where('pedido_id', $this->pedido_id)->get()->sum('total');
    //     Cabeceraproveedores::where('id',$pedido_id)
    //     ->update(['total' => $this->total]);
    // }
     


}
