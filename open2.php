

<?php

//Conexión a la base de datos
include("bd.php");

//Comprobamos si hay una conexión
if (!$conexion) {
    echo "Error al conectar con la base de datos";
    exit();
}

//Obtenemos los datos de los participantes del juego
$query = "SELECT * FROM amigosecreto";
$resultado = mysqli_query($conexion, $query);

//Creamos un array con los participantes
$participantes = array();

while ($fila = mysqli_fetch_assoc($resultado)) {
    $participantes[] = $fila;
}

//Mezclamos el array
shuffle($participantes);

//Los primeros dos elementos del array serán los amigos secretos
$amigo1 = $participantes[0];
$amigo2 = $participantes[1];

//Actualizamos la base de datos con los amigos secretos
$query = "UPDATE personas SET amigo_secreto_id = '$amigo2[id]' WHERE id = '$amigo1[id]'";
echo $query;
$resultado = mysqli_query($conexion, $query);

$query = "UPDATE participantes SET amigo_secreto_id = '$amigo1[id]' WHERE id = '$amigo2[id]'";
echo $query;
$resultado = mysqli_query($conexion, $query);

//Cerramos la conexión con la base de datos
mysqli_close($conexion);

//Actualizamos