<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.imagenes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.imagenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       //  Formulario normal funcionando perfectamente

        $request->validate([
            'imagen' => 'required|image|max:2048'
        ]);

        $imagenes = $request->file('imagen')->store('public/imagenes');
        $url = Storage::url($imagenes);

        Imagen::create([
            'url' => $url
        ]);



        // Formulario normal funcionando perfectamente

        // $request->validate([
        //     'imagen' => 'required|image|max:2048'
        // ]);

        // $imagenes = $request->file('imagen')->store('public/imagenes');
        // $url = Storage::url($imagenes);

        // Imagen::create([
        //     'url' => $url
        // ]);

//----------------------------------------------------------------------------------------

            //-- Usando Dropzone -- 

    


        // $request->validate([
        //     'file' => 'required|image'
        // ]);


        // $imagenes = $request->file('imagen')->store('public/imagenes');
        // $url = Storage::url($imagenes);

        
        //$nombre = $request->file('file')->getClientOriginalName();
        //$ruta = storage_path() . 'app\public\imagenes/' . $nombre;  
          
        // Image::make($request->file('file'))
        //             ->resize(800, null, function ($constraint) {
        //                  $constraint->aspectRatio();
        //             })
        //             ->save($ruta);  
        // Guardar registro en la bbdd
        // Imagen::create([
        //     'url' =>$url
        // ]); 



        //------------------------------------------------------------
            //Redireccionamiento funcionando con el formulario normal.
      // return redirect()->route('imagenes.index');
      // -------------------------------------------
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($imagen)
    {
        return view('admin.imagenes.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($imagen)
    {
      return view('admin.imagenes.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($imagen)
    {
        //
    }
}
