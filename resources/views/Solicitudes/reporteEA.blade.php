@extends('principal')
@section('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="/ProyEntregable01/resources/css/vapor/bootstrap.css">
    <link rel="stylesheet" href="/ProyEntregable01/resources/css/vapor/bootstrap.min.css">
    <link rel="stylesheet" href="/ProyEntregable01/resources/css/disenio.css">
    @vite(['../resources/css/textFormater.css'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimeMX | ReporteEA</title>
</head>
<body>
    
</body>
</html>
<h1>Reporte de Encuestas de Anime</h1>
@if (Session::has('mensaje'))
<br>
<div>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Felicidades</strong> {{ Session::get('mensaje') }}
    </div>
</div>
@endif
<br>
<table border="1" class='table table-hover'>
    <tr class='table-dark'>
        <th scope='row'>ID</th scope='row'>
        <th scope='row'>Nombre</th scope='row'>
        <th scope='row'>Apellido Paterno</th scope='row'>
        <th scope='row'>Apellido Materno</th scope='row'>
        <th scope='row'>Año</th scope='row'>
        <th scope='row'>Género</th scope='row'>
        <th scope='row'>Felicidad</th scope='row'>
        <th scope='row'>Estrellas</th scope='row'>
        <th scope='row'>Solicitudes</th scope='row'>
        <th scope='row'>Contenido</th scope='row'>
        <th scope='row'>Categoría</th scope='row'>
        <th scope='row'>Género de Anime</th scope='row'>
        <th scope='row'>Estudio</th scope='row'>
        <th scope='row'>Sugerencias</th scope='row'>
        <th scope='row'>Comentarios del Desarrollador</th scope='row'>
        <th scope="row">Captura de pantalla</th>
        <th scope="row">Acciones</th>
    </tr>
    @foreach($surveys as $s)
    <tr class='table-default'>
        <td class="one-char">{{$s->id_survey}}</td>
        <td >{{$s->name_per}}</td>
        <td >{{$s->a_pa}}</td>
        <td >{{$s->a_ma}}</td>
        <td class="one-char">{{$s->year}}</td>
        <td class="one-char">{{$s->sexo}}</td>
        <td class="one-char">{{$s->happiness}}</td>
        <td class="one-char">{{$s->stars}}</td>
        <td class="one-char">{{$s->requests}}</td>
        <td class="one-char">{{$s->content_name ?? 'N/A'}}</td>
        <td class="one-char">{{$s->category_name ?? 'N/A'}}</td>
        <td class="one-char">{{$s->genre}}</td>
        <td class="one-char">{{$s->studio}}</td>
        <td class="wrap-text">{{$s->suggestions}}</td>
        <td class="wrap-text">{{$s->dev_comments}}</td>
        <td><img src = "{{url('archivos/'.$s->archivo)}}" height =96 width=171 alt="Imagen no encontrada"></td>
        <td>
        @if(strtolower($s->activo) == 'si')
            <a href="{{ route('editSurvey', ['id_survey' => $s->id_survey])  }}">
                <button type="button" class="btn btn-info">Editar</button>
            </a>
            @if(Session::get('sesiontipo')=="administrador")
            <a href="{{ route('inactiveSurvey', ['id_survey' => $s->id_survey])  }}">
                <button type="button" class="btn btn-warning">Desactivar</button>
            </a>
            @endif
            @else
            <a href="{{ route('activeSurvey', ['id_survey' => $s->id_survey])  }}">
                <button type="button" class="btn btn-primary">Activar</button>
            </a>
            <a href="{{ route('deleteSurvey', ['id_survey' => $s->id_survey])  }}">
                <button type="button" class="btn btn-danger">Eliminar</button>
            </a>
        @endif
        </td>
    </tr>
    @endforeach
</table>
@stop

