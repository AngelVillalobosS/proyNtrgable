<!DOCTYPE html>
<html lang="en">
@extends('principal')
@section('contenido')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AnimeMX | Añadir Anime</title>
</head>

<body>
    <div>
        <br>
        <h2>Añadir Anime</h2>
    </div>
    <form action="">
        <table class="table table-hover">
            <tr class="table-primary">
                <th>Campo</th>
                <th>Dato</th>
            </tr>
            <tr class="active">
                <th>ID</th>
                <td>
                    <input type="text" name="" id="" class="form-control-plaintext" placeholder="Id del anime" readonly>
                </td>
            </tr>
            <tr class="default">
                <th>Nombre del anime:</th>
                <td>
                    <input type="text" name="anime_name" id="" class="form-control" maxlength="90"
                        placeholder="Ingresa el nombre del anime">
                </td>
            </tr>
            <tr class="default">
                <th>Descripción</th>
                <td>
                    <input type="text" name="anime_description" id="" class="form-control"
                        placeholder="Ingresa la descripcion">
                </td>
            </tr>
            <tr class="default">
                <th>Categoria</th>
                <td>
                    @foreach($categoria as $cat)
                    <input type="checkbox" name="genre" value = 'C' id="" class="form-check-input">
                    <label class="form-check-label" for="genre">{{ $cat -> name_cat}}</label>
                    @endforeach
                </td>
            </tr>
            <tr class="default">
                <th>Año de emisión</th>
                <td>
                <input class="form-control" type="number" min="1900" max="2099" step="1" value="2024" />
                </td>
            </tr>
            <tr class="default">
                <th>Portada</th>
                <td>
                        @if($errors->first('archivo'))
                                <p class="text-warning">{{$errors->first('archivo')}}</p>
                                @endif
                        <input type = 'file' class="form-control" name='archivo' >
                </td>
            </tr>
        </table>
        <center>
            <input type="submit" class="btn btn-primary" value="Enviar">
        </center>
    </form>
</body>
@endsection

</html>