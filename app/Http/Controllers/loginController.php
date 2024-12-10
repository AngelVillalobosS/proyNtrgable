<?php

namespace App\Http\Controllers;
use App\Models\usuarios;

use Illuminate\Http\Request;
use Session;
class logincontroller extends Controller
{
    public function login()
    {
        return view ('login.login');
    }
    public function validar(request $request)
    {
        $psswrdmd5 = md5($request->psswrd);
        $consulta = usuarios::where('email','=',$request->email)
                              ->where('psswrd','=',$psswrdmd5 )
                              ->get();
        $cuantos = count($consulta);
        if ($cuantos==0)
        {
            Session::flash('mensaje', "El usuario o password no valido");
            return redirect()->route('login');
        }
        else
        {
            Session::put('sesionname',$consulta[0]->nombre);
            Session::put('sesionidu',$consulta[0]->id_usuario);
            Session::put('sesiontipo',$consulta[0]->tipo);
            return redirect()->route('inicio');
        }
    }
    public function cerrarsesion()
    {
        Session::forget('sesionname');
        Session::forget('sesionidu');
        Session::forget('sesiontipo');
        Session::flush();
        Session::flash('mensaje', 'Session Cerrada Correctamente');
        return redirect()->route('login'); 
    }
}
