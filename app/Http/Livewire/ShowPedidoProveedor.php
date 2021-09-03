<?php

namespace App\Http\Livewire;

use App\Models\Cabeceraproveedores;
use Livewire\Component;
use App\Models\Producto;
use App\Models\Talla;
use App\Models\lineapedidos;

class ShowPedidoProveedor extends Component
{
    public $nombre_proveedor,
        $n_pedido,
        $f_pedido,
        $f_servicio,
        $total,
        $cabecera,
        $tallas,
        $selectedModelo = null,
        $selectedTalla = null,
        $cantidad,
        $precio,
        $subtotal,
        $lineas = [],
        $pedido_id,
        $talla;

    public function render()
    {
        $modelos = Producto::all();
        $cabecera = $this->cabecera;
        $this->lineas = lineapedidos::where('pedido_id', $cabecera->id)->get();
        $lineas = $this->lineas;
        $this->total = lineapedidos::where('pedido_id', $cabecera->id)->get()->sum('total');
        $this->nombre_proveedor = $cabecera->proveedor->nombre_proveedor;
        $this->n_pedido = $cabecera->n_pedido;
        $this->f_pedido = $cabecera->f_pedido;
        $this->f_servicio = $cabecera->f_servicio;
        $this->pedido_id = $cabecera->id;

        return view('livewire.show-pedido-proveedor', compact('modelos', 'lineas'));
    }

    public function updatedselectedModelo($modelo_id)
    {

        $this->precio = Producto::where('id', '=', $modelo_id)
            ->value('precio_coste');

        $this->tallas = Talla::join('producto_talla', 'talla_id', '=', 'tallas.id')
            ->where('producto_talla.producto_id', '=', $modelo_id)
            ->get();
    }

    public function updatedcantidad()
    {

        $cantidad = $this->cantidad;
        $precio = $this->precio;
        $this->subtotal = $cantidad * $precio;
        $this->emit('sumaTotal', $this->pedido_id);
    }

    public function addLinea()
    {
        $linea = new lineapedidos();

        $n_lineas = lineapedidos::where('pedido_id', $this->pedido_id)
            ->count();
        if ($n_lineas == 0) {
            $numero = 1;
        } elseif ($n_lineas > 0) {
            $ultima_linea = lineapedidos::where('pedido_id',$this->pedido_id)
                            ->orderBy('n_linea', 'desc')->first();
            $numero = $ultima_linea->n_linea;
            $numero = $numero + 1;
        }
        // $talla = Talla::where('talla',$this->selectedTalla)->first(); 


        $linea->n_linea = $numero;
        $linea->pedido_id = $this->pedido_id;
        $linea->producto_id = $this->selectedModelo;

        $linea->cantidad = $this->cantidad;
        $linea->precio = $this->precio;
        $linea->total = $this->subtotal;
        $linea->talla_id = $this->selectedTalla;
        $linea->save();
        //$pedido_id = $this->pedido_id;

        
       
        
        $this->emit('verAddLinea',$this->pedido_id);
        //$this->emit('sumaTotal', $this->pedido_id);



    }
  

    public function deleteLinea($linea_id)
    {

        lineapedidos::where('id', $linea_id)->delete();
    }

   
    




}
