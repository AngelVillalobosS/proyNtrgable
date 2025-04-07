<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    cantidad <input type="number" name="cantidad" id="cantidad">
    <br>
    costo <input type="number" name="costo" id="costo">
    <br>
    descuento <input type='radio' name='descuento' id='descuento1' value='SI'> SI
    <input type='radio' name='descuento' id='descuento2' value='NO'>NO
    <br>
    <div id="descuentos">
    </div>
    <br>
    <input type='button' value='calcular' id='calcular'>
    <br><br>
    total <input type="text" name="total" id="total">

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $("#calcular").click(function() {
            var d, cantidad, costo
            cantidad = parseInt($("#cantidad").val())
            costo = parseInt($("#costo").val())
            d = $('input:radio[name=descuento]:checked').val()
            if (d == 'NO') {
                total2 = cantidad * costo;
            }else{
                descu = parseInt($('input:radio[name=desc]:checked').val());
                total2 = cantidad *costo;
                total2 = total2 - total2*descu/100;
            }
            $("#total").val(total2)
        });

        $("input[name=descuento]").click(function() {
            d = $('input:radio[name=descuento]:checked').val()

            if (d == "NO") {
                $("#descuentos").load(document.write());
            } if (d == "SI") {
                $("#descuentos").load("{{url('cargadescuentos')}}" + '?' + $(this).closest('form').serialize());
            }

        });
    });
</script>

</html>