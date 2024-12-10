<?php

namespace App\Http\Controllers;

use App\Models\anime_survey;
use App\Models\categories;
use App\Models\contents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class modifyController extends Controller
{
    public function editSurvey($id_survey)
    {
        // Busca una encuesta específica
        $encuesta = anime_survey::where('id_survey', $id_survey)->first();
        $contents = contents::orderby('id_content', 'asc')->get();
        $consulta = \DB::select(" SELECT a.id_survey, a.name_per, a.a_pa, a.a_ma, a.year, a.sexo, a.happiness, 
           a.stars, a.requests, c.content AS content_name, 
           cat.categorie AS category_name, a.genre, a.studio, a.suggestions, 
           a.dev_comments, a.archivo, a.activo,
           a.id_content, -- Agregado
           a.id_categorie -- Agregado
            FROM anime_survey AS a
            INNER JOIN contents AS c ON c.id_content = a.id_content
            INNER JOIN categories AS cat ON cat.id_categorie = a.id_categorie
            WHERE a.stars > 0
        ");

        $categories = categories::orderby('id_categorie', 'asc')->get();

        // Verifica si la encuesta existe
        if (!$encuesta) {
            return redirect()->back()->with('error', 'Encuesta no encontrada.');
        }

        $selectedCategoryId = $encuesta->id_categorie;

        // Retorna la vista con la encuesta
        return view('Editar.editarEncuesta')
        ->with('encuesta', $encuesta)
        ->with('contents', $contents)
        ->with('categories', $categories)
        ->with('consulta', $consulta[0]);
    }

    public function saveEditedSurvey(Request $request)
{
    
    $file = $request->file('archivo');
    if ($file != '') {
        $fecha = date_create();
        $img = date_timestamp_get($fecha) . $file->getClientOriginalName();
        \Storage::disk('local')->put($img, \File::get($file));
    } else {
        $img = 'sinarchivo.jpg';
    }

    $survey = anime_survey::find($request->id_survey);
    $survey->name_per = $request->nombre;
    $survey->a_pa = $request->ap_pa;
    $survey->a_ma = $request->ap_ma;
    $survey->sexo = $request->sexo;
    $survey->happiness = $request->happiness;
    $survey->stars = $request->stars;
    $survey->requests = $request->requests;
    $survey->id_content = $request->id_content;
    
    // Verificar si id_categorie está presente
    if ($request->has('categorie') && $request->categorie !== null) {
        $survey->categorie = $request->categorie;
    } else {
        // Maneja el caso en que id_categorie no esté presente
        // O asigna un valor predeterminado si es necesario
        return redirect()->back()->with(Session::flash('error', 'El campo id_categorie es obligatorio.'));
    }

    $survey->genre = $request->genre;
    $survey->studio = $request->studio;
    $survey->suggestions = $request->suggestions;
    $survey->dev_comments = $request->dev_comments;
    $survey->archivo = $img;
    $survey->save();

    return redirect(route('reporteEA'));
}

    public function inactiveSurvey($id_survey)
    {

        if (Session::get('sesionidu')) {
            $desactiva = \DB::update("UPDATE anime_survey
                            SET activo  = 'No' WHERE id_survey = $id_survey ");

            Session::flash('mensaje', "La encuesta con ID $id_survey  ha sido desactivado");
            return redirect()->route('reporteEA');
        } else {
            Session::flash('mensaje', "Es necesario loguearse antes de continuar");
            return redirect()->route('login');
        }
    }
    public function activeSurvey($id_survey)
    {
        $activa = \DB::update("UPDATE anime_survey
                            SET activo  = 'Si' WHERE id_survey = $id_survey ");
        Session::flash('mensaje', "La encuesta con ID $id_survey  ha sido activado");
        return redirect()->route('reporteEA');
    }

    public function deleteSurvey($id_survey)
    {
        $desactiva = \DB::delete("DELETE FROM anime_survey WHERE id_survey =$id_survey  ");
        Session::flash('mensaje', "La encuesta con ID $id_survey  ha sido eliminado");
        return redirect()->route('reporteEA');
    }
}
