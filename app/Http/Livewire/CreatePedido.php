<?php

namespace App\Http\Livewire;

use App\Models\Cabeceraproveedores;
use Livewire\Component;
use App\Models\lineapedidos;
use App\Models\Producto;
use App\Models\Talla;

class CreatePedido extends Component
{
    public $selectedModelo,$selectedTalla;
    protected $listeners = ['selectPedido' => 'selectPedido',
                                'listTallas' => 'listTallas'];
    public $search;
    public $modelo,$total=0;
    public $precio = 0;
    public $tallas;
    public $cantidad = 0;
    public $n_pedido;
    public $pedido_id;
    public $subtotal;

   
    
    public function render()
    {
        
            $modelos = Producto::all();
            return view('livewire.create-pedido',
                        ['modelos' => $modelos]);

    }

    public function updatedselectedModelo($modelo_id){
        // cargamos el precio de coste
         $this->precio = Producto::where('id','=',$modelo_id)
                            ->value('precio_coste');
        // Cargamos el select de las tallas con las tallas de este producto
        $this->tallas = Talla::join('producto_talla','talla_id','=','tallas.id')
        ->where('producto_talla.producto_id','=',$modelo_id)
        ->get();
      
    }

    public function updatedcantidad(){
        
        $cantidad = $this->cantidad;
        $precio = $this->precio;
        $this->subtotal = $cantidad * $precio;
        
    }

    public function addLinea(){
        $linea = new lineapedidos();
       
        $n_lineas = lineapedidos::where('pedido_id',$this->pedido_id)
                    ->count();
        $n_lineas = $n_lineas+1;   
       
        $linea->n_linea = $n_lineas;
        $linea->pedido_id = $this->pedido_id;
        $linea->producto_id = $this->selectedModelo;
        
        $linea->cantidad = $this->cantidad;
        $linea->precio = $this->precio;
        $linea->total = $this->subtotal;
        $linea->talla_id = $this->selectedTalla;
        $linea->save();
        $this->emit('sumaTotal',$this->pedido_id);
        $this->emit('verAddLinea',$this->pedido_id);

    }

    public function selectPedido($n_pedido,$pedido_id){
        $this->n_pedido = $n_pedido;
        $this->pedido_id = $pedido_id;
    }
    
   


}