<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use App\Models\Marca;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();
     
        return view('admin.proveedores.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function create()
    {
        $proveedores = Proveedor::all();
        $marcas = Marca::all();
        
        return view('admin.proveedores.nuevo',compact('proveedores','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'proveedor' => 'required',
            'direccion' => 'required',
            'cp' =>'required|max:5',
            'poblacion' =>'required|max:45',
            'provincia' =>'required|max:35',
            'telefono_1' =>'required|max:9',
            'telefono_2' => 'max:9',
            'contacto' => 'max:255',
            'cif' => 'required|max:9',
            'selMarca' => 'required',
            'email' => 'required'

        ]);

        $proveedor = new Proveedor();

        $proveedor->nombre_proveedor = $request->proveedor;
        $proveedor->direccion = $request->direccion;
        $proveedor->cp = $request->cp;
        $proveedor->poblacion = $request->poblacion;
        $proveedor->provincia = $request->provincia;
        $proveedor->telefono = $request->telefono_1;
        $proveedor->telefono_movil = $request->telefono_2;
        $proveedor->contacto = $request->contacto;
        $proveedor->email = $request->email;
        $proveedor->cif = $request->cif;
        $proveedor->observaciones = $request->observaciones;
        $proveedor->marca_id = $request->get('selMarca');

        $proveedor->save();

        return redirect()->route('proveedor.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        $marcas = Marca::all();
        return view('admin.proveedores.verProveedor',compact('proveedor','marcas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'proveedor' => 'required',
            'direccion' => 'required',
            'cp' =>'required|max:5',
            'poblacion' =>'required|max:45',
            'provincia' =>'required|max:35',
            'telefono_1' =>'required|max:9',
            'telefono_2' => 'max:9',
            'contacto' => 'max:255',
            'cif' => 'required|max:9',
            'selMarca' => 'required',
            'observaciones' => 'max:255',
            'email' => 'required'

        ]);

        $proveedor->nombre_proveedor = $request->proveedor;
        $proveedor->direccion = $request->direccion;
        $proveedor->cp = $request->cp;
        $proveedor->poblacion = $request->poblacion;
        $proveedor->provincia = $request->provincia;
        $proveedor->telefono = $request->telefono_1;
        $proveedor->telefono_movil = $request->telefono_2;
        $proveedor->contacto = $request->contacto;
        $proveedor->email = $request->email;
        $proveedor->cif = $request->cif;
        $proveedor->observaciones = $request->observaciones;
        $proveedor->marca_id = $request->get('selMarca');

        $proveedor->save();

        return redirect()->route('proveedor.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedor.index');
    }
}
