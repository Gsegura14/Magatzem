<?php

namespace App\Http\Livewire;

use App\Models\Cabeceraproveedores as ModelsCabeceraproveedores;
use App\Models\lineapedidos;
use App\Models\Proveedor;
use App\Models\npedidoproveedor;
use Livewire\Component;

class CabeceraProveedores extends Component
{
    protected $listeners = [
        'completarCabecera' => 'completarCabecera',
        'sumaTotalProveedores' => 'sumaTotal',
        'actualizaSumaProveedores' => 'sumaTotal'
    ];
    public $proveedor;
    public $proveedor_id;
    public $n_pedido;
    public $f_pedido;
    public $dias;
    public $f_servicio;
    public $total;
    public $fecha;
    public $pedido_id;

    public function render()
    {


        return view('livewire.cabecera-proveedores');
    }

    public function completarCabecera($proveedor_id)
    {


        $proveedor = Proveedor::find($proveedor_id);
        if ($proveedor == true) {
            $this->proveedor = $proveedor->nombre_proveedor;
            $this->proveedor_id = $proveedor->id;
            $ultimo_pedido = npedidoproveedor::where('id', 1)->first();
            $numero = $ultimo_pedido->ultimo_pedido;
            // Localizamos el último pedido realizado y actualizamos
            $numero++;
            $this->n_pedido = $numero;
            $ultimo_pedido->ultimo_pedido = $numero;
            $ultimo_pedido->save();
            $this->fecha = now();
            $this->f_pedido = date('d-m-Y', strtotime($this->fecha));


            $this->total = 0.0;
        }
    }

    public function updatedDias()
    {
        $fecha = $this->fecha;
        $this->f_servicio = date('d-m-Y', strtotime($fecha->addDays($this->dias)));
    }




    public function guardarPedido()
    {
        $pExiste = ModelsCabeceraproveedores::where('n_pedido', $this->n_pedido)->count();

        if ($pExiste == 0) {
            if ($this->n_pedido == true && $this->dias == true) {

                $pedido = new ModelsCabeceraproveedores();
                $pedido->proveedor_id = $this->proveedor_id;
                $pedido->n_pedido = $this->n_pedido;
                $pedido->f_pedido = now();
                $pedido->f_servicio = now()->addDays($this->dias);
                $pedido->total = $this->total;
                $pedido->save();
                // Pasar al controlador de las lineas del pedido los parámetros del pedido y proveedor
                $this->emit('pedido', $this->n_pedido, $this->proveedor_id);
            }
        }
    }

    public function sumaTotal($pedido_id){
       
        $this->total = lineapedidos::where('pedido_id',$pedido_id)
                        ->sum('total');
         ModelsCabeceraproveedores::where('id',$pedido_id)
            ->update(['total' => $this->total]);
    }

    
}
