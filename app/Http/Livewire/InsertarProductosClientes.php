<?php

namespace App\Http\Livewire;

use App\Models\lineaspedidocliente;
use App\Models\Stock;
use Livewire\Component;

class InsertarProductosClientes extends Component
{
    public $selectedModelo;
    public $cantidad;
    public $precio;
    public $subtotal;
    public $producto;
    public $pedido_id;
    public $cliente_id;

    protected $listeners = ['pedido' => 'pedido'];
    public function render()
  {

        $modelos = Stock::all();
        $pedido_id = $this->pedido_id;
    
        return view('livewire.insertar-productos-clientes',compact('modelos','pedido_id'));
    }
    function updatedSelectedModelo(){
        // $selectedModelo = $this->selectedModelo;
        // $this->precio = Producto::where('id',$modelo_id)->first()->value('precio_vta');
        
        $producto = Stock::where('id',$this->selectedModelo)->first();
        if($producto){
            $this->precio = $producto->producto->precio_vta;
        }
        


    }

    public function updatedCantidad (){

        $cantidad = $this->cantidad;
        $precio = $this->precio;
        $this->subtotal = $cantidad * $precio;
    }

    public function insertarLinea(){
        
        $n_lineas = lineaspedidocliente::where('pedido_id',$this->pedido_id)
                    ->count();
                
        if($n_lineas == 0){
            $numero = 1;
        }elseif($n_lineas>0){
            $ultima_linea = lineaspedidocliente::where('pedido_id',$this->pedido_id)
                ->orderBy('n_linea','desc')
                ->first();
                $numero = $ultima_linea->n_linea;
                $numero = $numero+1;
        }

        if($this->cantidad == true && $this->precio == true && $this->pedido_id == true){

            $linea = new lineaspedidocliente();
            $linea->n_linea = $numero;
            $linea->pedido_id = $this->pedido_id;
            $linea->stock_id = $this->selectedModelo;
            $linea->cantidad = $this->cantidad;
            $linea->precio = $this->precio;
            $linea->total =$this->subtotal;
            $linea->save();
            $this->emit('verAddLinea',$this->pedido_id);
            
        }
        

        
        
    }
    public function pedido($pedido_id,$cliente_id){
        $this->pedido_id = $pedido_id;
        $this->cliente_id = $cliente_id;
    }
}
