<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::all();
        return view('admin.clientes.index',compact('clientes'));
    }

    public function create(){
        return view('admin.clientes.nuevo');
    }

    public function store(Request $request){

        // $request->validate([
        //     'cliente' => 'required',
        //     'direccion' => 'required',
        //     'cp' =>'required|max:5',
        //     'poblacion' =>'required|max:45',
        //     'provincia' =>'required|max:35',
        //     'telefono' =>'required|max:9',
        //     'dni' => 'required|max:9',
        //     'email' => 'required'

        // ]);

        $cliente = new Cliente();

        $cliente->nombre    = $request->cliente;
        $cliente->domicilio = $request->domicilio;
        $cliente->cp        = $request->cp;
        $cliente->poblacion = $request->poblacion;
        $cliente->provincia = $request->provincia;
        $cliente->DNI       = $request->dni;
        $cliente->email     = $request->email;
        $cliente->telefono  = $request->telefono;

        $cliente->save();

        return redirect()->route('clientes.index');

    }

    public function update(Request $request, Cliente $cliente){


        // $request->validate([
        //     'cliente' => 'required',
        //     'direccion' => 'required',
        //     'cp' =>'required|max:5',
        //     'poblacion' =>'required|max:45',
        //     'provincia' =>'required|max:35',
        //     'telefono' =>'required|max:9',
        //     'dni' => 'required|max:9',
        //     'email' => 'required'

        // ]);

        $cliente->nombre    = $request->cliente;
        $cliente->domicilio = $request->domicilio;
        $cliente->cp        = $request->cp;
        $cliente->poblacion = $request->poblacion;
        $cliente->provincia = $request->provincia;
        $cliente->DNI       = $request->dni;
        $cliente->email     = $request->email;
        $cliente->telefono  = $request->telefono;

        $cliente->save();

        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente){
        $cliente->delete();
        return redirect()->route('clientes.index');

    }

    public function show(Cliente $cliente){

        return view('admin.clientes.ver',compact('cliente'));
    }


}
