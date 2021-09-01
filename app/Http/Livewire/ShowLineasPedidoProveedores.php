<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Admin\CabeceraproveedoresController;
use App\Models\Cabeceraproveedores;
use Livewire\Component;
use App\Models\lineapedidos;


class ShowLineasPedidoProveedores extends Component
{
    protected $listeners =['verAddLinea'=>'verAddLinea'];
    public $lineas=[];
    
    
    public function render()
    {
        return view('livewire.show-lineas-pedido-proveedores');
    }

    public function verAddLinea($pedido_id){
        $this->lineas = lineapedidos::where('pedido_id',$pedido_id)
                ->get();
     }

    
     public function deleteLinea($linea_id){
        
      lineapedidos::where('id',$linea_id)->delete();

        

     }

     

}