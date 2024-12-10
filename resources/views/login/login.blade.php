<html>

<head>
    @vite('../resources/css/Vapor/bootstrap.css', '../resources/css/Vapor/bootstrap.min.css')
</head>

<body>
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">
        <div
            style="width: 400px; padding: 20px; border: 2px solid #ccc; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <h1 style="font-size: 36px;">Iniciar sesión</h1>
            <form action="{{ route('validar') }}" method="POST">
                {{ csrf_field() }}
                <table style="width: 100%; margin-top: 20px;">
                    <tr>
                        <th><label for="correo" style="font-size: 18px;">Teclea correo</label></td>
                        <td><input type="text" name="email" class="form-control"
                                style="font-size: 18px; width: 100%; padding: 10px;  border-radius: 4px;"></td>
                    </tr>
                    <tr>
                        <th><br><label for="pasw" style="font-size: 18px;">Teclea password</label></td>
                        <td><br><input type="password" name="psswrd" class="form-control"
                                style="font-size: 18px; width: 100%; padding: 10px;  border-radius: 4px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; margin-top: 20px;">
                            <input type="submit" value="Iniciar"
                                style="font-size: 20px; padding: 10px 20px; border: none; border-radius: 5px; background-color: #28a745; color: white; cursor: pointer;">
                        </td>
                    </tr>
                </table>
            </form>
            @if (Session::has('mensaje'))
            <div>
                <div class="alert alert-dismissible alert-warning" style="font-size: 18px; margin-top: 20px;"
                    id="alert">
                    <br><br>
                    <button type="button" class="btn-close" id="close-alert"></button>
                    <strong>Alerta: </strong> {{ Session::get('mensaje') }}
                </div>

                <script>
                document.getElementById('close-alert').addEventListener('click', function() {
                    document.getElementById('alert').style.display = 'none';
                });
                </script>

            </div>
            @endif
        </div>
    </div>
</body>

</html>