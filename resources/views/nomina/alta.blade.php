@extends('principal')

@section('contenido')

<table>
    <tr>
        <td>Nomina</td>
        <td>
            <input type="text" name="idn" id="idn">
        </td>
    </tr>
    <tr>
        <td>Fecha</td>
        <td>
            <input type="text" name="fecha">
        </td>
    </tr>
    <tr>
        <td>Periodo</td>
        <td>
            <input type="text" name="periodoabarca" id="periodoabarca">
        </td>
    </tr>
    <tr>
        <td>Usuario</td>
        <td>
            <input type="text" name="idu" id="idu">
        </td>
    </tr>
</table>

@stop