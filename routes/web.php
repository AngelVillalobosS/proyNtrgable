<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\encuestaAnimeController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EpisodioController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\modifyController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\viewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('principal',[viewController::class,'principal'])->name('principal');
Route::get('inicio',[viewController::class,'inicio'])->name('inicio');

Route::get('encuesta', [viewController::class, 'encuesta']) -> name('encuesta');
Route::get('reporteEA',[reportController::class,'reporteEA'])->name('reporteEA');
Route::get('/editaEncuesta/{id_survey}', [modifyController::class, 'editSurvey'])-> name('editSurvey');
Route::get('/', [AnimeController::class, 'index'])->name('home');
Route::get('/buscar', [AnimeController::class, 'buscar'])->name('buscarAnime');
Route::get('/anime/{id}', [AnimeController::class, 'verAnime'])->name('verAnime');
Route::get('/episodio/{id}', [EpisodioController::class, 'verEpisodio'])->name('verEpisodio');
Route::get('/categoria/{id}', [CategoriaController::class, 'verCategoria'])->name('verCategoria');
Route::get('/animes', [viewController::class, 'addAnimeView']) -> name('addAnimeView');
Route::get('inactiveSurvey/{id_survey}',[modifyController::class,'inactiveSurvey'])->name('inactiveSurvey');
Route::get('activeSurvey/{id_survey}',[modifyController::class,'activeSurvey'])->name('activeSurvey');
Route::get('deleteSurvey/{id_survey}',[modifyController::class,'deleteSurvey'])->name('deleteSurvey');
    // Login
Route::get('login',[logincontroller::class,'login'])->name('login');
Route::get('cerrarsesion',[logincontroller::class,'cerrarsesion'])->name('cerrarsesion');

// Metodos Post
Route::post('enviarEncuesta', [encuestaAnimeController::class, 'enviarEncuesta']) -> name('enviarEncuesta');
Route::POST('guardandoDatos', [modifyController::class, 'saveEditedSurvey'])->name('guardarEdicion');
    // Loging
Route::POST('validar',[logincontroller::class,'validar'])->name('validar');