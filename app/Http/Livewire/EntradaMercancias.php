<?php

namespace App\Http\Livewire;

use App\Models\Cabeceraproveedores;
use App\Models\EntradaMercancia;
use App\Models\Proveedor;
use Livewire\Component;
use App\Models\lineapedidos;

class EntradaMercancias extends Component
{
    public $selectedProveedor = null, $selectedPedido = null, $selectedLinea = null;
    public $pedidos, $proveedor_id, $fecha, $modelo, $color, $talla, $pedidoId, $lineasProductos = [], $cantidad;
    public $errorCantidad = 0;

    protected $rules = [
        'selectedProveedor' => 'required',
        'selectedPedido'    => 'required',
        'selectedLinea'     => 'required',
        'cantidad'          => 'required'
    ];

    public function render()
    {
        $proveedores = Proveedor::all();
        $this->lineasProductos = $this->getLineas($this->selectedPedido);
        $pedidos = $this->pedidos;
        $lineas = $this->lineasProductos;
        $this->fecha = date("Y-m-d");

        return view('livewire.entrada-mercancias', compact('proveedores', 'pedidos', 'lineas'));
    }


    public function updatedselectedProveedor($proveedor_id)
    {
        $this->pedidos = Cabeceraproveedores::where('proveedor_id', $proveedor_id)->get();
    }

    protected function getLineas($pedidoId)
    {

        $lineasPedido = lineapedidos::select(
            'lineapedidos.id',
            'lineapedidos.n_linea',
            'cabeceraproveedores.n_pedido',
            'productos.modelo',
            'productos.color',
            'tallas.talla',
            'productos.descripcion_corta',
            'lineapedidos.cantidad',
            'lineapedidos.recibido',
            'lineapedidos.precio',
            'lineapedidos.total'
        )
            ->join('cabeceraproveedores', 'lineapedidos.pedido_id', 'cabeceraproveedores.id')
            ->join('stocks', 'lineapedidos.stock_id', 'stocks.id')
            ->join('productos', 'stocks.producto_id', 'productos.id')
            ->join('tallas', 'stocks.talla_id', 'tallas.id')
            ->where('cabeceraproveedores.id', '=', $pedidoId)
            ->get();

        return $lineasPedido;
    }

    public function procesar()
    {
        $this->validate();

        $registro = new EntradaMercancia();
        $registro->lineaId = $this->selectedLinea;
        $registro->fecha = $this->fecha;
        $registro->pedidoId = $this->selectedPedido;
        $registro->proveedorId = $this->selectedProveedor;
        $registro->cantidad = $this->cantidad;

        $registro->save();

        $this->updatePedido($registro);
    }

    protected function updatePedido($registro)
    {
        $lineaProveedor = lineapedidos::where('id', $this->selectedLinea)->first();
        $stockActual = $lineaProveedor->recibido;
        $entrada = $registro->cantidad;
        $nuevoStock = $stockActual + $entrada;

        if ($nuevoStock <= $lineaProveedor->cantidad) {
            $lineaProveedor->update([
                'recibido' => $nuevoStock
            ]);
            $this->errorCantidad = 0;
        } else {
            $this->errorCantidad = 1;
        }
    }
}
