@if($desc=='SI')
<input type = 'radio' value = '10' name = 'd' id= 'd1'> 10%
<input type = 'radio' value = '20' name = 'd' id= 'd2'> 20%
<input type = 'radio' value = '0' name = 'd' id= 'd3'> Otro
<input type = 'text' value = '0' name = 'otro' id = 'otro' disabled>
@else
Sin descuento
@endif
<script>
    $(document).ready(function(){
        $("input[name=des]").click(function(){
            descu = parseInt($('input:radio[name=des]:checked').val())
            if (descu==0) {
                $('#otro').removeAttr('disabled');
            }

        })
    })
</script>