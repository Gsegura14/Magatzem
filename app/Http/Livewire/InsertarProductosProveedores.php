<?php

namespace App\Http\Livewire;

use App\Models\Cabeceraproveedores;
use App\Models\lineapedidos;
use App\Models\Stock;
use Livewire\Component;

class InsertarProductosProveedores extends Component
{
    public $selectedModelo;
    public $cantidad;
    public $precio;
    public $subtotal;
    public $producto;
    public $pedido_id;
    public $proveedor_id;

    protected $listeners = ['pedido' => 'pedido'];
    public function render()
  {

        $modelos = Stock::all();
        $pedido_id = $this->pedido_id;
    
        return view('livewire.insertar-productos-proveedores',compact('modelos','pedido_id'));
    }
    function updatedSelectedModelo(){
        // $selectedModelo = $this->selectedModelo;
        // $this->precio = Producto::where('id',$modelo_id)->first()->value('precio_vta');
        
        $producto = Stock::where('id',$this->selectedModelo)->first();
        if($producto){
            $this->precio = $producto->producto->precio_coste;
        }
        


    }

    public function updatedCantidad (){

        $cantidad = $this->cantidad;
        $precio = $this->precio;
        $this->subtotal = $cantidad * $precio;
    }

    public function insertarLinea(){
        
        $n_lineas = lineapedidos::where('pedido_id',$this->pedido_id)
                    ->count();
                
        if($n_lineas == 0){
            $numero = 1;
        }elseif($n_lineas>0){
            $ultima_linea = lineapedidos::where('pedido_id',$this->pedido_id)
                ->orderBy('n_linea','desc')
                ->first();
                $numero = $ultima_linea->n_linea;
                $numero = $numero+1;
        }

        if($this->cantidad == true && $this->precio == true && $this->pedido_id == true){

            $linea = new lineapedidos();
            $linea->n_linea = $numero;
            $linea->pedido_id = $this->pedido_id;
            $linea->stock_id = $this->selectedModelo;
            $linea->cantidad = $this->cantidad;
            $linea->precio = $this->precio;
            $linea->total =$this->subtotal;
            $linea->save();
            // redirect()->route('actualizar.stock',$linea);

            //Actualización de stock
            $this->actualizaStock($linea);
         

       //Se añade la linea 
            $this->emit('verAddLinea',$this->pedido_id);
            
        }
        

        
        
    }
    public function pedido($n_pedido,$proveedor_id){
        $pedido = Cabeceraproveedores::where('n_pedido',$n_pedido)->first();
        $this->pedido_id = $pedido->id;
        $this->proveedor_id = $proveedor_id;
    }

    // Funnción para actualizar el stock
        protected function actualizaStock($linea){
            $productoID = $linea->stock_id;
            $cantidad_actual = $linea->stock->stock;
            $cantidad_pedido = $linea->stock->pedido;
            $cantidadLinea = $linea->cantidad;
            $cantidad_actual = $cantidad_actual + $cantidadLinea;
            $cantidad_pedido = $cantidad_pedido + $cantidadLinea;
            Stock::where('id',$productoID)->update(['stock' => $cantidad_actual,
            'pedido' => $cantidad_pedido]);
        }
    
}
