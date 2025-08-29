<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body class="login" style="width:auto !important; height:auto !important">
    <form action="_functions.php" method="POST">
        <div id="login">

            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <br>

                            <h3 class="text-center" style="font-weight:bold;font-size: 50px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Bienvenidos al Sorteo de Amigo Secreto</h3>
                            <br>
                            <div class="row justify-content-center">
                                <img src="Imagenes/Regalo.png" alt="" margin="20px" width="120px">
                                </a>
                            </div>
                            <div class="form-group">
                                <label for="correo" class="lbl">Nombre:</label><br>
                                <input type="text" name="nombre" id="nombre" class="form-control ipt" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="lbl">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control ipt" required>
                                <input type="hidden" name="accion" value="acceso_user">
                            </div>
                            <button type="button" class="btn btn-warning " onclick="alerta()">
                                No se sabe su contraseña
                            </button>
                            <div class="form-group">
                                <br>
                                <center>
                                    <input type="submit" class="btn btn-success boton4" value="Ingresar">
                                </center>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>

<script>
    function alerta() {
        Swal.fire({
            icon: 'info',
            title: 'Su contraseña son los primeros 4 digitos de su rut',
            confirmButtonText: 'OK'

        })

    }
</script>

</html>