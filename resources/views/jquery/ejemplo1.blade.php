<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Ejemplo1</title>
</head>
<body>


    <h2>Ejemplo de JQuery</h2>
    <form action="" id="formulario">
        base <input type="text" name="cantidad" id="cantidad">
        <br>
        tipo <select name='tipo' id="tipo">
            <option value='A'>A</option>
            <option value='B'>B</option>
        </select>
        <br>
        <input type="button" value="Calcular" id="calcular">
    </form>
    <div id="resultado">

    </div>
    <div id="calculototal">
        <br>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tipo").click(function() {
           // $("#resultado").load('{{url('operacion')}}'+'?tipo='+this.options[this.selectedIndex].value) ;
            });
        $("#calcular").click(function() {
		    $("#calculototal").load('{{url('calculo')}}' + '?' + $(this).closest('form').serialize()) ;
	 });
    });
</script>
</html>