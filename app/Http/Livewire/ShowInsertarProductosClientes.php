<?php

namespace App\Http\Livewire;
use App\Models\Stock;
use App\Models\lineaspedidocliente;
use Livewire\Component;

class ShowInsertarProductosClientes extends Component
{
    public $selectedModelo;
    public $cantidad,$precio,$subtotal,$producto,$pedido,$cliente_id;
    protected $listeners = ['pedido' => 'pedido'];

    public function render()
    {
        
        $modelos = Stock::all();
        return view('livewire.show-insertar-productos-clientes',compact('modelos'));
    }

    public function updatedSelectedModelo(){
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

    public function insertarLineaNueva($pedido_id){
        $n_lineas = lineaspedidocliente::where('pedido_id',$pedido_id)
                    ->count();
                
        if($n_lineas == 0){
            $numero = 1;
        }elseif($n_lineas>0){
            $ultima_linea = lineaspedidocliente::where('pedido_id',$pedido_id)
                ->orderBy('n_linea','desc')
                ->first();
                $numero = $ultima_linea->n_linea;
                $numero = $numero+1;
        }

        if($this->cantidad == true && $this->precio){

            $linea = new lineaspedidocliente();
            $linea->n_linea = $numero;
            $linea->pedido_id = $pedido_id;
            $linea->stock_id = $this->selectedModelo;
            $linea->cantidad = $this->cantidad;
            $linea->precio = $this->precio;
            $linea->total =$this->subtotal;
            $linea->save();
            $this->actualizaStock($linea);
            $this->emit('actualizaSumaTotal',$pedido_id);
            $this->emit('verAddLineaNueva',$pedido_id);
        }
        

        
        
    }

    protected function actualizaStock($linea){
            $productoID = $linea->stock_id;
            $cantidad_actual = $linea->stock->stock;
            $cantidad_vendido = $linea->stock->vendido;
            $cantidadLinea = $linea->cantidad;
            $cantidad_actual = $cantidad_actual - $cantidadLinea;
            $cantidad_vendido = $cantidad_vendido + $cantidadLinea;
            Stock::where('id',$productoID)->update(['stock' => $cantidad_actual,
            'vendido' => $cantidad_vendido]);
    }

    public function pedido($pedido_id,$cliente_id){
        $this->pedido_id = $pedido_id;
        $this->cliente_id = $cliente_id;
    }
}
