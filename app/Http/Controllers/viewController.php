<?php

namespace App\Http\Controllers;

use App\Models\categoriasAnime;
use App\Models\categories;
use App\Models\contents;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class viewController extends Controller
{
    public function principal()
    {
        if (Session::get('sesionidu')) {
            return view('principal');
        } else {
            Session::flash('mensaje', "Es necesario loguearse antes de continuar");
            return redirect()->route('login');
        }
    }
    public function inicio()
    {
        if (Session::get('sesionidu')) {
            return view('inicio');
        } else {
            Session::flash('mensaje', "Es necesario loguearse antes de continuar");
            return redirect()->route('login');
        }
    }

    public function encuesta()
    {
        if (Session::get('sesionidu')) {

            $categories = categories::orderby('id_categorie', 'asc')->get();
            $contents = contents::orderby('id_content', 'asc')->get();
            $lastSurvey = \DB::select("SELECT id_survey + 1 AS idsur FROM anime_survey ORDER BY id_survey DESC LIMIT 1");

            //Operador ternario para evitar que el dato salga como nulo si es que no hay registros en la BD
            $nextId = !empty($lastSurvey) && isset($lastSurvey[0]->idsur) ? $lastSurvey[0]->idsur : 1;

            return view('Solicitudes.encuestaAnime')
                ->with('nextId', $nextId)
                ->with('contents', $contents)
                ->with('categories', $categories);
        } else {
            Session::flash('mensaje', "Es necesario loguearse antes de continuar");
            return redirect()->route('login');
        }
    }

    public function addAnimeView()
    {
        if (Session::get('sesionidu')) {
            $categoria = categoriasAnime::select('id_categoria', 'name_cat')->get();
            return view('Contenido.addAnimeEncuesta')
                ->with('categoria', $categoria);
        } else {
            Session::flash('mensaje', "Es necesario loguearse antes de continuar");
            return redirect()->route('login');
        }
    }
}
