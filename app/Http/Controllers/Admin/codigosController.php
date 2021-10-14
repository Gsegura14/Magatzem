<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Codigosproducto;

class codigosController extends Controller
{
   public function config(){
       return view('admin.codigosdebarras.nuevoConfig');
   } 

   public function generar(){

        $productos = Stock::where('codigo',null)->get();
        
        foreach($productos as $producto){
            echo $producto->sku;
            $ok = false;
            while($ok==false){

                $codProducto = $this->crearCodProducto();
                $existe = Codigosproducto::where('Codigo',$codProducto)->get();
                echo count($existe);
                if(count($existe)==0){
                    $this->guardarCodigo($codProducto);
                    $ok = true;

                }else{
                    $ok=false;
                }
            }
        

        $Codempresa = '84';
        $Codmarca   = '35541';
        $codigo = $Codempresa.$Codmarca.$codProducto;
        $par = $this->numeroPar($codigo);
        $impar = $this->numeroImpar($codigo);
        
        // Dígito de control
        $dc = $this->digitoControl($par,$impar);
        $codigo = $codigo.strval($dc);
        $this->actualizarProducto($producto,$codigo);
        }

        return redirect()->route('stock.index');

   }

   protected function crearCodProducto(){
        $min = 0;
        $max = 99999;
        $cod = rand($min,$max);
        $cod = str_pad($cod, 5, "0", STR_PAD_LEFT);

        return $cod;

        }
protected function numeroPar($codigo){
    $num = 0;
    for($i=0;$i<strlen($codigo);$i++){
        if(!$i%2==0){
            $num = $num+intval($codigo[$i]);
        }
    }
    
    return $num;

}

protected function numeroImpar($codigo){
    $num = 0;
    for($i=0;$i<strlen($codigo);$i++){
        if($i%2==0){
            $num = $num+intval($codigo[$i]);
        }
    }
    $num = $num*3;
    return $num;
}
    protected function digitocontrol($par,$impar){

        $digito = ($par + $impar);
        $decena = ceil($digito / 10) * 10;
        $digito = $decena - $digito;

        return $digito;
    }

    protected function actualizarProducto(Stock $producto,$codigo){

        $producto->update(['codigo' => $codigo]);

    }

    //Función para guardar el nuevo código

    protected function guardarCodigo($codProducto){
        $nuevo = new Codigosproducto();
        $nuevo->Codigo = $codProducto;
        $nuevo->save();

    }

    
}
