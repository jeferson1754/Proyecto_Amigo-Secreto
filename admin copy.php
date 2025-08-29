<?php
include("bd.php");

session_start();
error_reporting(0);

$validar = $_SESSION['Nombre'];

//echo $validar;

if ($validar == null || $validar = '') {

    header("Location: login.php");
    die();
}

$nombre = $_SESSION['Nombre'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.semanticui.min.css">
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <title>Amigo Secreto Admin</title>
</head>
<style>
    .div1 {
        text-align: center;
    }

    .main-container {
        margin: 30px 20px auto !important;
    }

    a{
        text-decoration: none;
        color: white;
    }
</style>

<body>
    <div class="col-sm">
        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#Crear">
            Nuevo Integrante
        </button>
        <button type="button" class="btn btn-success " >
            <a href="index.php">Ir a User</a>
        </button>
    </div>
    <?php include('ModalCrear.php');  ?>
    <div class="div1">

        <h2>Sorteo de Amigo Secreto </h2>


    </div>
    <div class="main-container">

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rut</th>
                    <th>Pass</th>
                    <th>Opcion1</th>
                    <th>Opcion2</th>
                    <th>Opcion3</th>
                    <th>AmigoSecreto</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * from personas";
            $result = mysqli_query($conexion, $sql);
            //echo $sql;

            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['ID'] ?></td>
                    <td><?php echo $mostrar['Nombre_Personas'] ?></td>
                    <td><?php echo $mostrar['Rut'] ?></td>
                    <td><?php echo $mostrar['Pass'] ?></td>
                    <td><?php echo $mostrar['Deseo1'] ?></td>
                    <td><?php echo $mostrar['Deseo2'] ?></td>
                    <td><?php echo $mostrar['Deseo3'] ?></td>
                    <td><?php echo $mostrar['AmigoSecreto'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editAdmin<?php echo $mostrar['ID']; ?>">
                            Editar
                        </button>
                    </td>
                </tr>
                <!--Ventana Modal para Actualizar--->
                <?php include('ModalEditar copy.php'); ?>

                <!--Ventana Modal para la Alerta de Eliminar--->
            <?php
            }
            ?>
        </table>
    </div>
    <br>
    <br>
    <br>
    <div class="div1">
        <form method="POST" action="_functions.php">
            <button type="submit" class="btn btn-primary btn-lg">
                Hacer la Ruleta
            </button>
            <input type="hidden" name="accion" value="ruleta">
        </form>
    </div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

</html>