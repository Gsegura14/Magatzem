<?php

namespace App\Http\Livewire;

use App\Models\CabeceraCliente;
use App\Models\Cliente;
use App\Models\lineaspedidocliente;
use App\Models\nPedidoCliente;

use Livewire\Component;

class CabeceraClientes extends Component
{
    protected $listeners = [
        'completarCabecera' => 'completarCabecera',
        'sumaTotal' => 'sumaTotal',
        'actualizaSuma' => 'sumaTotal'
    ];
    public $cliente;
    public $cliente_id;
    public $n_pedido;
    public $f_pedido;
    public $dias;
    public $f_servicio;
    public $total;
    public $fecha;

    public function render()
    {


        return view('livewire.cabecera-clientes');
    }

    public function completarCabecera($cliente_id)
    {


        $cliente = Cliente::find($cliente_id);
        if ($cliente == true) {
            $this->cliente = $cliente->nombre;
            $this->cliente_id = $cliente->id;
            $ultimo_pedido = nPedidoCliente::where('id', 1)->first();
            $numero = $ultimo_pedido->n_pedido;
            // Localizamos el último pedido realizado y actualizamos
            $numero++;
            $this->n_pedido = $numero;
            $ultimo_pedido->n_pedido = $numero;
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
        $pExiste = CabeceraCliente::where('n_pedido', $this->n_pedido)->count();

        if ($pExiste == 0) {
            if ($this->n_pedido == true && $this->dias == true) {

                $pedido = new CabeceraCliente();

                $pedido->n_pedido = $this->n_pedido;
                $pedido->cliente_id = $this->cliente_id;
                $pedido->f_pedido = now();
                $pedido->f_servicio = now()->addDays($this->dias);
                $pedido->total = $this->total;
                $pedido->save();
                // Pasar al controlador de las lineas del pedido los parámetros del pedido y cliente
                $this->emit('pedido', $this->n_pedido, $this->cliente_id);
            }
        }
    }

    public function sumaTotal($pedido_id){
        
        $this->total = lineaspedidocliente::where('pedido_id',$pedido_id)
                        ->sum('total');
          CabeceraCliente::where('id',$pedido_id)
            ->update(['total' => $this->total]);
    }

    
}
