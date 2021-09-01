<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\lineapedidos;
use App\Models\Producto;
use App\Models\Cabeceraproveedores;
use App\Models\Talla;

class InsertarProductos extends Component
{
    public $selectedModelo,$selectedTalla;
    protected $listeners = ['selectPedido' => 'selectPedido',
                                'listTallas' => 'listTallas'];
    public $search;
    public $modelo,$total;
    public $precio = 0;
    public $tallas;
    public $cantidad = 0;
    public $n_pedido;
    public $pedido_id;
    public $subtotal;
    

    protected $rules = [
        'selectedTalla' => 'required',
       
    ];

    public function render()
    {
        $modelos = Producto::all();
            return view('livewire.create-pedido',
                        ['modelos' => $modelos]);
        return view('livewire.insertar-productos');
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
        if($n_lineas==0){
            $numero = 1;
        }elseif($n_lineas>0){
            $ultima_linea = lineapedidos::where('pedido_id',$this->pedido_id)
            ->orderBy('n_linea', 'desc')->first();             
            $numero = $ultima_linea->n_linea;      
            $numero = $numero+1;
        }
        
       
        $linea->n_linea = $numero;
        $linea->pedido_id = $this->pedido_id;
        $linea->producto_id = $this->selectedModelo;
        
        $linea->cantidad = $this->cantidad;
        $linea->precio = $this->precio;
        $linea->total = $this->subtotal;
        $linea->talla_id = $this->selectedTalla;
        $linea->save();
        //$total = lineapedidos::where('pedido_id', $this->pedido_id)->get()->sum('total');
        $pedido_id = $this->pedido_id;
        $this->emit('sumaTotal');
        $this->emit('verAddLinea',$pedido_id);
        

    }

    public function selectPedido($n_pedido,$pedido_id){
        $this->n_pedido = $n_pedido;
        $this->pedido_id = $pedido_id;
    }


    
   


}
