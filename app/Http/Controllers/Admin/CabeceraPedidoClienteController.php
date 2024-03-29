<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CabeceraCliente;
use Barryvdh\DomPDF\Facade as PDF;

class CabeceraPedidoClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidosclientes = CabeceraCliente::all();
        return view('admin.pedidosClientes.index',compact('pedidosclientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pedidosClientes.nuevo');
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
    public function show(CabeceraCliente $pedido)
    {
        
        return view('admin.pedidosClientes.verPedido',compact('pedido'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CabeceraCliente $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidosclientes.index');
    }

    public function exportPDF(){

        $pedidos = CabeceraCliente::all();
        $pdf = PDF::loadView('admin.pdf.pedidosclientes',compact('pedidos'));
        return $pdf->download('pedidosClientes.pdf');
    }

    

}
