<?php
// Conexión a la base de datos
include("bd.php");
// Preparar la consulta
$sql = "SELECT * FROM personas";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay algún resultado
if (mysqli_num_rows($resultado) > 0) {

    // Recorrer los resultados
    while ($fila = mysqli_fetch_assoc($resultado)) {

        // Mostrar los resultados
        echo $fila['Nombre_Personas'] . ' es el amigo secreto de ' . $fila['Rut'] . '<br>';
    }
} else {
    echo 'No hay amigos secretos';
}

// Cerrar la conexión
mysqli_close($conexion);
