<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        body{width: 50%; background-color: #303030;}
        form{
            margin-top: 15%;
            margin-left: 45%;
        }
    </style>
    <title>Vistazo</title>
</head>
<body>
    <form action="" id="formu" class="form-control">
        Nombre <select name="nombre" id="nombre" class="form-control">
            <option value="Carlos">Carlos</option>
            <option value="Paty">Paty</option>
        </select><br>
        Edad <input type="text" name="edad" id="edad" class="form-control" maxlength="3">
        <br>
        <input type="button" value="Buscar" id="buscar" class="btn btn-primary" class="form-control">
        <br>
    </form>
    <div id="datos">

    </div>
</body>
<script type="text/javascript">
$(document).ready(function(){
    $("#buscar").click(function(){
        $("#datos").load('{{url("datospersona")}}' + '?' + $(this).closest('form').serialize())
    })
});    
</script>
</html>