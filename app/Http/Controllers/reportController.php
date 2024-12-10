<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class reportController extends Controller
{
    public function reporteEA()
    {
        if (Session::get('sesionidu')) {

            $surveys = \DB::select("SELECT a.id_survey, a.name_per, a.a_pa, a.a_ma, a.year, a.sexo, a.happiness, 
                a.stars, a.requests, c.content AS content_name, cat.categorie AS category_name, 
                a.genre, a.studio, a.suggestions, a.dev_comments, a.archivo, a.activo
                FROM anime_survey AS a
                INNER JOIN contents AS c ON c.id_content = a.id_content
                INNER JOIN categories AS cat ON cat.id_categorie = a.id_categorie
                WHERE a.stars > 0");

            return view('solicitudes.reporteEA')
                ->with('surveys', $surveys);
        } else {
            Session::flash('mensaje', "Es necesario loguearse antes de continuar");
            return redirect()->route('login');
        }
    }
}