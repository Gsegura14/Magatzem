<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Stock;
use App\Models\Talla;
use JeroenNoten\LaravelAdminLte\Components\Widget\Alert;
use Barryvdh\DomPDF\Facade as PDF;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('admin.stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Producto $producto, $tallas, $stock)
    {

        // var_dump($tallas);
        $arrTallas = explode(',', $tallas);
        //var_dump($arrTallas);
        foreach ($arrTallas as $talla) {
            $numeroTalla = Talla::where('id', $talla)->first();
            //var_dump($numeroTalla->talla);
            $combinacion = new Stock();
            $combinacion->producto_id   = $producto->id;
            $combinacion->talla_id      = $talla;
            $combinacion->sku           = $producto->modelo . '-' . $producto->color . '-' . $numeroTalla->talla;
            $combinacion->stock         = $stock;
            $combinacion->codigo        = null;
            $combinacion->pedido        = 0;
            $combinacion->vendido       = 0;

            $combinacion->save();

           
        }
        return redirect()->route('productos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Producto $producto, $tallas)
    {
        
       //Array con las tallas actuales
       $tallasActuales = Stock::where('producto_id',$producto->id)->get('talla_id')
                            ->toArray();
       $nuevasTallas=explode(',',$tallas);
       $todasTallas = Talla::all('id')->toArray();
            foreach($nuevasTallas as $nuevaTalla){
                if(stock::where('talla_id',$nuevaTalla)->where('producto_id',$producto->id)->exists()){
                    break;
            }else{
                $numeroTalla = Talla::where('id',$nuevaTalla)->first();
                        $comprobarFila = Stock::where('talla_id',$numeroTalla->id)
                                            ->where('producto_id',$producto->id)
                                            ->first();
                        if($comprobarFila==null){
                            $combinacion                = new Stock();
                            $combinacion->producto_id   = $producto->id;
                            $combinacion->talla_id      = $nuevaTalla;
                            $combinacion->sku           = $producto->modelo . '-' . $producto->color . '-' . $numeroTalla->talla;
                            $combinacion->codigo        = null;
                            $combinacion->stock         = 0;
                            $combinacion->pedido        = 0;
                            $combinacion->vendido       = 0;
                            $combinacion->save();
                        }
            }
        }

        foreach($tallasActuales as $talla){
                $comprobar = stock::where('talla_id',$talla)->where('producto_id',$producto->id)->first();
                if($comprobar->count()>0){

                 $comprobar->delete();
                }
            }

            return redirect()->route('productos.index');
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    }

    public function exportPDF(){
        $stocks = Stock::all();
        $pdf = PDF::loadView('admin.pdf.stock',compact('stocks'));
        return $pdf->download('stock.pdf');

    }
}
