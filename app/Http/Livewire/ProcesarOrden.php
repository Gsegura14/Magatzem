<?php

namespace App\Http\Livewire;

use App\Models\CabeceraCampania;
use Livewire\Component;
use App\Models\PedidosCampania;
use App\Models\PoOrders;
use App\Models\StockCampania;
use App\Exports\POExport;
use Maatwebsite\Excel\Facades\Excel;

class ProcesarOrden extends Component
{
    public $campaniaId, $selectedPO = null, $pedidos, $servidos, $lineasProductos, $poId = 0, $editLinea, $editCantidad, $porcentaje = 0, $porcentajeFaltas = 0, $porcentajeCampania, $porcentajeFaltasCampania, $n_pedidos, $n_servidos, $progress, $alertEnviado = 0, $n_pedidosC = 0, $n_servidosC = 0,$stockCampania,$percentStockVendido;


    protected $rules = [
        'SelectPO'      => 'required',
        'editLinea'     => 'required',
        'editCantidad'  => 'required'
    ];


    public function render()
    {
        
        $campania = $this->getCampania($this->campaniaId);
        $this->stockCampania = $campania->cantidad_unidades;
        
        
        $ordenes = $this->getOrdenes($this->campaniaId);
        $this->updateporcentajeCampania();
        $this->updateporcentajeFaltasCampania();
        $this->updateProgress();
        $this->actualizarpercentStockVendido();
        $lineas = $this->getLineas($this->poId);
        return view('livewire.procesar-orden', compact('campania', 'ordenes', 'lineas'));
    }

    public function updatedselectedPO($poId)
    {
        if ($poId) {
            $this->pedidos = PedidosCampania::where('po_number_id', $poId)
                ->get()->sum('pedido');

            $this->servidos = PedidosCampania::where('po_number_id', $poId)
                ->get()->sum('servido');

            $this->poId = $poId;
            $this->actualizar();
        }
    }

    public function servirTodos()
    {
        $productos =  PedidosCampania::where('po_number_id', $this->poId)->get();

        foreach ($productos as $producto) {
            if ($producto->enviado != 1) {
                $pedido = $producto->pedido;
                $producto->update([
                    'servido' => $pedido
                ]);
                $this->updatedselectedPO($this->poId);
                $this->actualizar();
            }
        }
    }

    public function cancelarTodos()
    {
        $productos =  PedidosCampania::where('po_number_id', $this->poId)->get();
        foreach ($productos as $producto) {
            if ($producto->enviado != 1) {
                $producto->update([
                    'servido' => 0
                ]);
                $this->updatedselectedPO($this->poId);
                $this->actualizar();
            }
        }
    }

    public function aplicar()
    {

        $producto =  PedidosCampania::where('po_number_id', $this->poId)
            ->where('id', $this->editLinea)->first();
        if ($producto->pedido >= $this->editCantidad) {
            if ($this->selectedPO != null && $producto->enviado == 0) {
                $producto->update([
                    'servido' => $this->editCantidad
                ]);

                $this->updatedselectedPO($this->poId);
                $this->actualizar();
            }
        }
    }

    public function cerrarPO()
    {

        $productosOrden = PedidosCampania::where('po_number_id', $this->poId)
            ->where('enviado', 0)->get();
        foreach ($productosOrden as $producto) {
            $servido = $producto->servido;
            $pedido = $producto->pedido;
            $productoStock = StockCampania::where('codigo', $producto->codigo)
                ->where('campania_id', $this->campaniaId)->first();
            $stockActualProducto = $productoStock->stock;
            $nuevoStock = $stockActualProducto - $servido;

            $this->updateStock($producto->codigo, $nuevoStock, $pedido, $servido);
        }
    }

    protected function actualizarpercentStockVendido()
    {
        $campania = CabeceraCampania::find($this->campaniaId);
        $stock = $campania->cantidad_unidades;
        $this->percentStockVendido = number_format((($this->n_pedidosC) / ($stock) * 100), 2, ',', '');
    }
    protected function updateStock($codigo, $cantidad, $pedido, $servido)
    {

        $producto = StockCampania::where('codigo', $codigo)
            ->where('campania_id', $this->campaniaId)
            ->first();
        $pedidoActual = $producto->pedido;
        $servidoActual = $producto->servido;
        $pedidoActual = $pedidoActual + $pedido;
        $servidoActual = $servidoActual + $servido;
        $producto->update([
            'stock'     => $cantidad,
            'pedido'    => $pedidoActual,
            'servido'   => $servidoActual
        ]);

        $this->setEnviado($producto);
    }

    protected function setEnviado(StockCampania $producto)
    {

        $pr = PedidosCampania::where('codigo', $producto->codigo)
            ->where('po_number_id', $this->poId)
            ->first();
        if ($pr->pedido == $pr->servido) {
            $pr->update([
                'enviado' => 1
            ]);
        }
    }

    protected function updateLabel()
    {
        $this->porcentaje = number_format((($this->servidos) / ($this->pedidos) * 100), 2, ',', '');
    }

    protected function updatePorcentajeFaltas()
    {
        $this->porcentajeFaltas = 100 - doubleval(($this->porcentaje));
    }

    protected function updateporcentajeCampania()
    {


        $this->n_pedidosC = PedidosCampania::where('campania_id', $this->campaniaId)->get()->sum('pedido');
        $this->n_servidosC = PedidosCampania::where('campania_id', $this->campaniaId)->get()->sum('servido');

        $this->porcentajeCampania = number_format(($this->n_servidosC / $this->n_pedidosC * 100), 2, ',', '');
    }

    protected function updateporcentajeFaltasCampania()
    {
        $this->porcentajeFaltasCampania = 100 - doubleval(($this->porcentajeCampania));
    }

    protected function updateProgress()
    {
        $campania = CabeceraCampania::find($this->campaniaId)->first();
        $dias = $campania->duracion;
        $orden = PedidosCampania::orderBy('n_order', 'desc')
            ->where('campania_id', $this->campaniaId)
            ->first();

        $this->progress = number_format(($orden->n_order / $dias * 100), 0, '', '');
    }

    protected function getCampania($id)
    {
        $camp = CabeceraCampania::find($id);
        return $camp;
    }

    protected function getOrdenes($id)
    {
        $pos = PoOrders::where('campania_id', $id)
            ->get();

        return $pos;
    }

    protected function getLineas($poId)
    {

        $lineasPedido = PedidosCampania::select(
            'pedidos_campanias.id',
            'po_orders.po_order',
            'pedidos_campanias.sku',
            'productos.modelo',
            'productos.color',
            'tallas.talla',
            'productos.descripcion_corta',
            'pedidos_campanias.codigo',
            'pedidos_campanias.pedido',
            'pedidos_campanias.servido',
            'pedidos_campanias.precio_oferta',
            'pedidos_campanias.enviado'

        )
            ->join('po_orders', 'pedidos_campanias.po_number_id', 'po_orders.id')
            ->join('productos', 'pedidos_campanias.producto_id', 'productos.id')
            ->join('tallas', 'pedidos_campanias.talla_id', 'tallas.id')
            ->where('po_orders.id', '=', $poId)
            ->get();

        return $lineasPedido;
    }

    public function exportXls()
    {
        $hora = now();
        $po = PoOrders::find($this->poId);
        $order = $po->po_order;
        $po_id = $this->poId;
        $archivo = 'packingList_' . $order . '_' . $hora . '.xlsx';
        return Excel::download(new POExport($po_id), $archivo);
    }


    protected function actualizar()
    {
        $this->updateLabel();
        $this->updatePorcentajeFaltas();
        $this->updateporcentajeFaltasCampania();
        $this->updateporcentajeCampania();
        $this->updateProgress();
        $this->actualizarpercentStockVendido();
    }


    public function cerrarCampania()
    {
        // Guardar los POs en tabla historial POs
            // Eliminar de la tabla pedidoscampania las Pos correspondientes
        // Guardar el Stock en tabla historial Stocks
            // Eliminar el stock de la campaña de la tabla stockscampanias
        // Las cabeceras las dejamos pero tenemos que añadir una columna del estado  de la campaña.
            // sin iniciar,en progreso,cerrada. - Añadimos tabla para gestionar el estado de las campañas
        
    }
}
