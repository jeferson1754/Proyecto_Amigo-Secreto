
<?php
// conectamos a la base de datos
include("bd.php");

// creamos una tabla para almacenar los datos
// Comprobar si la conexión se ha establecido correctamente
if (!$conexion) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

// Preparar la consulta para seleccionar los usuarios
$sql = "SELECT * FROM personas";
$result = mysqli_query($conexion, $sql);

// Comprobar si hay resultados
if (mysqli_num_rows($result) > 0) {

    // Array para guardar los usuarios
    $usuarios = array();

    // Recorrer los resultados y guardarlos en un array
    while ($row = mysqli_fetch_assoc($result)) {
        $usuarios[] = $row;
    }

    // Mezclar el array para que los usuarios no tengan el mismo amigo secreto
    shuffle($usuarios);

    // Recorrer el array mezclado y asignar el amigo secreto
    for ($i = 0; $i < count($usuarios); $i++) {
        // Si es el último usuario, asignar el primero
        if ($i == count($usuarios) - 1) {
            $amigo_secreto = $usuarios[0]['Nombre_Personas'];
        }
        // Si no, asignar el siguiente
        else {
            $amigo_secreto = $usuarios[$i + 1]['Nombre_Personas'];
        }

        // Actualizar el usuario con su amigo secreto
        $sql = "UPDATE personas SET AmigoSecreto='" . $amigo_secreto . "' WHERE ID=" . $usuarios[$i]['ID'];
        $result = mysqli_query($conexion, $sql);
    }

    echo "Amigos secretos asignados correctamente";
} else {
    echo "No hay usuarios en la base de datos";
}

// Cerrar la conexión con la base de datos
mysqli_close($conexion);

?>