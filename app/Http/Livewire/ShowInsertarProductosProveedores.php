<?php

namespace App\Http\Livewire;

use App\Models\lineapedidos;
use App\Models\Stock;
use Livewire\Component;

class ShowInsertarProductosProveedores extends Component
{
    public $selectedModelo;
    public $cantidad,$precio,$subtotal,$producto,$cabecera,$proveedor_id;
    protected $listeners = ['pedido' => 'pedido'];

    public function render()
    {
        
        $modelos = Stock::all();
        return view('livewire.show-insertar-productos-proveedores',compact('modelos'));
    }

    public function updatedSelectedModelo(){
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

    public function insertarLineaNueva($pedido_id){
        $n_lineas = lineapedidos::where('pedido_id',$pedido_id)
                    ->count();
                
        if($n_lineas == 0){
            $numero = 1;
        }elseif($n_lineas>0){
            $ultima_linea = lineapedidos::where('pedido_id',$pedido_id)
                ->orderBy('n_linea','desc')
                ->first();
                $numero = $ultima_linea->n_linea;
                $numero = $numero+1;
        }

        if($this->cantidad == true && $this->precio){

            $linea = new lineapedidos();
            $linea->n_linea = $numero;
            $linea->pedido_id = $pedido_id;
            $linea->stock_id = $this->selectedModelo;
            $linea->cantidad = $this->cantidad;
            $linea->precio = $this->precio;
            $linea->total =$this->subtotal;
            $linea->save();
            
            $this->emit('ModActualizaSumaTotal',$pedido_id);
            $this->emit('verAddLineaNueva',$pedido_id);
        }
        

        
        
    }
    public function pedido($pedido_id,$proveedor_id){
        $this->pedido_id = $pedido_id;
        $this->proveedor_id = $proveedor_id;
    }
}
