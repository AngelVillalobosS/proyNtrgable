<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body{
            width: 50%; 
            background-color: #303030;
            color: #fff;
        }
        table{
            border: #fff solid 3px;
            margin-top: 15%;
            margin-left: 45%;
            padding: 10px 10px;
        }
        img{
            width: 60%;
            height: 40%;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>
                <img src="archivos/{{$archivo}}" alt="" srcset="">
            </td>
            <td>
                Nombre: {{$nombre}}
                <br>
                Edad: {{$edad}}
                <br>
            </td>
        </tr>
    </table>
</body>
</html>