<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anime_survey;
use App\Models\categories;
use App\Models\contents;
use Illuminate\Container\Attributes\Storage;

class encuestaAnimeController extends Controller
{
    

    public function enviarEncuesta(Request $request)
    {
        $validatedData = $request->validate([
            'name_per' => 'required|regex:/^[A-Z][A-Z,a-z, ,ó,é,ü,ñ,Ñ]+$/',
            'a_pa' => 'required|regex:/^[A-Z][A-Z,a-z, ,ó,é,ü,ñ,Ñ]+$/',
            'a_ma' => 'required|regex:/^[A-Z][A-Z,a-z, ,ó,é,ü,ñ,Ñ]+$/',
            'stars' => 'required',
            'requests' => 'required',
            'genre' => 'required',
            'studio' => 'required',
            'archivo' => 'mimes:jpg,png,jpeg,gif,PNG',
        ]);

        // Manejo del archivo
        $file = $request->file('archivo');
        if ($file != '') {
        $fecha = date_create();
        $img = date_timestamp_get($fecha) . $file->getClientOriginalName();
        \Storage::disk('local')->put($img, \File::get($file));
        } else {
        $img = 'sinarchivo.jpg';
        }

        $anime_survey = new anime_survey;
        $anime_survey -> name_per = $request -> name_per;
        $anime_survey -> a_pa = $request -> a_pa;
        $anime_survey -> a_ma = $request -> a_ma;
        $anime_survey -> year = 2024;
        $anime_survey -> sexo = $request -> sexo;
        $anime_survey -> happiness = $request -> happiness;
        $anime_survey -> stars = $request -> stars;
        $anime_survey -> requests = $request -> requests;
        $anime_survey -> id_content = $request -> id_content;
        $anime_survey -> id_categorie = $request -> id_categorie;
        $anime_survey -> genre = $request -> genre;
        $anime_survey -> studio = $request -> studio;
        $anime_survey -> suggestions = $request -> suggestions;
        $anime_survey -> dev_comments = $request -> dev_comments;
        $anime_survey -> archivo = $img;
        $anime_survey -> activo = 'si';
        $anime_survey -> save();
        
        return redirect(route('reporteEA'));
    }
    
}
