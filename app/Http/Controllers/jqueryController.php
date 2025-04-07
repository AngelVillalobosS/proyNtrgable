<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class jqueryController extends Controller
{
    public function ejemplo1(){
        return view('jquery.ejemplo1');
    }
    public function operacion(request $request){
        $t = $request->tipo;
        echo "Aqui va a mostrar la operacion";
        echo "<br>";
        echo "Hola wapa";
        echo "El valor de la variable t es: " . $t;
        if($t == 'A'){
            echo "<br> Producto Caro";
        } else {
            echo "<br> Producto Barato";
        }
    }

    public function calculo(request $request){
        $ti = $request->tipo;
        $cantidad = $request->cantidad;
        if ($ti == "A") {
            $total = $cantidad * 10;
        } else {
            $total = $cantidad *20;
        }
        return view('jquery.calculototal')
        ->with('ti',$ti)
        ->with('cantidad',$cantidad)
        ->with('total',$total);
    }

    public function ejercicio1(Request $request){
        return view('jquery.ejercicio1'); //Regresar la vista del ejercicio
    }

    public function datospersona(Request $request){ //Procesar datos de ejercicio 
        $nombre = $request -> nombre;
        $edad = $request -> edad;

        if ($nombre == 'Paty') {
            $archivo = 'Paty.jpeg';
        } else {
            $archivo = 'Carlos.jpg';
        }

        return view('jquery.datosalumno')
        ->with('edad', $edad)
        ->with('nombre', $nombre)
        ->with('archivo', $archivo);
    }
    
    public function ejercicio3(){
        return view("jquery.ejemplo3");
    }
    public function cargadescuentos(request $request){
        $desc = $request->descuento1;
        return view("jquery.opcionesdescuento")->with('desc',$desc);
    }
}