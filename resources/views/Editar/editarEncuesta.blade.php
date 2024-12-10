<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimeMX</title>
    @extends('principal')
    @section('contenido')
</head>

<body>
    <br>
    <h2>Editar Encuesta</h2>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <br>
    <form action="{{route('guardarEdicion')}}" method='POST' enctype='multipart/form-data'>
        @csrf
        <table class="table table-hover">
            <tr class="table-primary">
                <th>Campo</th>
                <td>Editar campo</td>
            </tr>
            <tr>
                <th>ID</th>
                <td>
                    <input type="text" name="id_survey" value="{{$encuesta->id_survey}}" class="form-control-plaintext"
                        readonly>
                </td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><input class="form-control" type="text" name="nombre" value="{{ $encuesta -> name_per}}"></td>
            </tr>
            <tr>
                <th>Apellido Paterno</th>
                <td><input class="form-control" type="text" name="ap_pa" value="{{ $encuesta -> a_pa}}"></td>
            </tr>
            <tr>
                <th>Apellido Materno</th>
                <td><input class="form-control" type="text" name="ap_ma" value="{{ $encuesta -> a_ma}}"></td>
            </tr>
            <tr>
                <th>Año</th>
                <td><input class="form-control-plaintext" type="text" name="year" value="{{ $encuesta -> year}}"
                        readonly></td>
            </tr>
            <tr>
                <th>Sexo</th>
                <td>
                    <input type="radio" class="form-check-input" name="sexo" value="M"
                        {{ $encuesta->sexo == 'M' ? 'checked' : '' }}>
                    <label for="optionsRadios1" class="form-check-label">Masculino</label>

                    <input type="radio" class="form-check-input" name="sexo" value="F"
                        {{ $encuesta->sexo == 'F' ? 'checked' : '' }}>
                    <label for="optionsRadios1" class="form-check-label">Femenino</label>

                    <input type="radio" class="form-check-input" name="sexo" value="O"
                        {{ $encuesta->sexo == 'O' ? 'checked' : '' }}>
                    <label for="optionsRadios1" class="form-check-label">Otro</label>
                </td>
            </tr>
            <tr>
                <!-- 2nd RadioButton -->
                <td>
                    <h5>¿Estas contento con la pagina?</h5>
                </td>
                <td>
                    <input type="radio" class='form-check-input' name='happiness' value='D'
                        {{ $encuesta->happiness == 'D' ? 'checked' : '' }}>
                    <label for="optionsRadios1" class='form-check-label'>Descontento</label>
                    <input type="radio" class='form-check-input' name='happiness' value='C'
                        {{ $encuesta->happiness == 'C' ? 'checked' : '' }}>
                    <label for="optionsRadios1" class='form-check-label'>Contento</label>
                    <input type="radio" class='form-check-input' name='happiness' value='M'
                        {{ $encuesta->happiness == 'M' ? 'checked' : '' }}>
                    <label for="optionsRadios1" class='form-check-label'>Muy Contento</label>
                </td>
            </tr>
            <tr>
                <!-- 3rd RadioButton -->
                <td>
                    <h5>¿Con cuántas estrellas calificas <br> el contenido de la pagina?</h5>
                </td>
                <td>
                    <input type="radio" class='form-check-input' name='stars' value='1'
                        {{ $encuesta->stars == '1' ? 'checked' : '' }}>
                    <label for="optionsRadios1" class='form-check-label'>1 </label>
                    <input type="radio" class='form-check-input' name='stars' value='2'
                        {{ $encuesta->stars == '2' ? 'checked' : '' }}>
                    <label for="optionsRadios1" class='form-check-label'>2</label>
                    <input type="radio" class='form-check-input' name='stars' value='3'
                        {{ $encuesta->stars == '3' ? 'checked' : '' }}>
                    <label for="optionsRadios1" class='form-check-label'>3</label>
                    <input type="radio" class='form-check-input' name='stars' value='4'
                        {{ $encuesta->stars == '4' ? 'checked' : '' }}>
                    <label for="optionsRadios1" class='form-check-label'>4</label>
                    <input type="radio" class='form-check-input' name='stars' value='5'
                        {{ $encuesta->stars == '5' ? 'checked' : '' }}>
                    <label for="optionsRadios1" class='form-check-label'>5</label>
                </td>
            </tr>
            <!-- Solicitude Type -->
            <tr>
                <!-- 1st CheckBox -->
                <td>
                    <h5>¿De qué estamos hablando?</h5>
                    @if($errors->first('requests'))
                    <p class="text-warning">{{$errors->first('requests')}}</p>
                    @endif
                </td>
                <td><input type="checkbox" class="form-check-input" name='requests' , value='R'
                        {{ $encuesta->requests == 'R' ? 'checked' : '' }}>
                    <label class="form-check-label" for="requests">Solicitar la baja de un contenido</label>
                    <br>
                    <input type="checkbox" name="requests" value='C' id="" class="form-check-input"
                        {{ $encuesta->requests == 'C' ? 'checked' : '' }}>
                    <label class="form-check-label" for="requests">Solicitar la adición de un contenido</label>
                    <br>
                    <input type="checkbox" class="form-check-input" name="requests" value='A' id=""
                        {{ $encuesta->requests == 'A' ? 'checked' : '' }}>
                    <label class="form-check-label" for="requests">Ofrecer una critica sobre el contenido</label>
                    </select>
                </td>
            </tr>
            <!-- Type of Content -->
            <tr>
                <!-- 1st ComboBox -->
                <td>
                    <h5>Especifica el contenido</h5>
                </td>
                <td>
                    <select class="form-select" name='id_content'>
                    <option value='{{$consulta->id_content}}'>{{$consulta->content_name}}</option>
                        @foreach($contents as $conts)
                        <option value='{{$conts->id_content}}'>{{$conts->content}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <!-- Categories -->
            <tr>
                <!-- 2nd ComboBox -->
                <th scope="row">
                    <h5>Selecciona una Categoria</h5>
                </th>
                <td>
                <select  class="form-select" name = 'categorie'>
                    <!-- Opción seleccionada actual -->
                    <option value='{{$consulta->id_categorie}}'>{{$consulta->category_name}}</option>
                    <!-- Opciones disponibles -->
                    @foreach($categories as $cats)
                    <option value = '{{$cats->id_content}}'>{{$cats->categorie}}</option>
                    @endforeach
                </select>
                </td>
            </tr>

            <!-- Genre -->
            <tr>
                <!-- 2nd CheckBox -->
                <td>
                    <h5>Seleccione el genero</h5>
                    @if($errors->first('genre'))
                    <p class="text-warning">{{$errors->first('genre')}}</p>
                    @endif
                </td>
                <td><input type="checkbox" class="form-check-input" name='genre' , value='R'
                        {{ $encuesta->genre == 'R' ? 'checked' : '' }}>
                    <label class="form-check-label" for="genre">Romance</label>
                    <input type="checkbox" name="genre" value='C' id="" class="form-check-input"
                        {{ $encuesta->genre == 'C' ? 'checked' : '' }}>
                    <label class="form-check-label" for="genre">Comedia</label>
                    <input type="checkbox" class="form-check-input" name="genre" value='A' id=""
                        {{ $encuesta->genre == 'A' ? 'checked' : '' }}>
                    <label class="form-check-label" for="genre">Accion</label>
                    </select>
                </td>
            </tr> <!-- 3rd CheckBox -->
            <td>
                <h5>Seleccione el estudio emisor</h5>
                @if($errors->first('studio'))
                <p class="text-warning">{{$errors->first('studio')}}</p>
                @endif
            </td>
            <td><input type="checkbox" class="form-check-input" name='studio' , value='G'
                    {{ $encuesta->studio == 'G' ? 'checked' : '' }}>
                <label class="form-check-label" for="gibli">Gibli</label>
                <input type="checkbox" name="studio" value='M' id="" class="form-check-input"
                    {{ $encuesta->studio == 'M' ? 'checked' : '' }}>
                <label class="form-check-label" for="mappa">Mappa</label>
                <br>
                <input type="checkbox" class="form-check-input" name="studio" value='S' id=""
                    {{ $encuesta->studio == 'S' ? 'checked' : '' }}>
                <label class="form-check-label" for="sony">Sony</label>
                <input type="checkbox" class="form-check-input" name="studio" value='P' id=""
                    {{ $encuesta->studio == 'P' ? 'checked' : '' }}>
                <label class="form-check-label" for="paramount">Paramount</label>
                <br>
                <input type="checkbox" class="form-check-input" name="studio" value='N' id=""
                    {{ $encuesta->studio == 'N' ? 'checked' : '' }}>
                <label class="form-check-label" for="netflix">Netflix</label>
                <input type="checkbox" class="form-check-input" name="studio" value='A' id=""
                    {{ $encuesta->studio == 'A' ? 'checked' : '' }}>
                <label class="form-check-label" for="amazon_prime">Amazon Prime</label>
                </select>
            </td>
            </tr>
            <tr>
                <th>Sugerencias</th>
                <td><input class="form-control" type="text" name="sugerencias" value="{{ $encuesta -> suggestions}}">
                </td>
            </tr>
            </tr>
            <tr>
                <th>Comentarios para <br> desarolladores</th>
                <td><input class="form-control" type="text" name="comentarios" value="{{ $encuesta -> dev_comments}}">
                </td>
            </tr>
            <tr class="default"></tr>
            <tr>
                <td width=100>Archivo:</td>
                <td width=200>
                    @if($errors->first('archivo'))
                    <p class="text-warning">{{$errors->first('archivo')}}</p>
                    @endif
                    imagen actual:
                    <img src="{{url('archivos/'.$encuesta->archivo)}}" height=96 width=171 alt="  Imagen no encontrada">
                    <br><br>
                    <input type='file' class="form-control" name='archivo'>
                    <br>
                </td>
            </tr>
        </table>
        <center>
            <button type="submit" class="btn btn-dark">Actualizar Datos</button>
        </center>
        <br>
        <br>
    </form>
</body>
@endsection

</html>