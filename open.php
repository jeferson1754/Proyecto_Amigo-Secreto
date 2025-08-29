<?php
include("bd.php");

// Función para mezclar los nombres en un array
function mezclar($participantes)
{
    $n = count($participantes);
    for ($i = 0; $i < $n; $i++) {
        $r = rand(0, $n - 1);
        $temp = $participantes[$i];
        $participantes[$i] = $participantes[$r];
        $participantes[$r] = $temp;
    }
    return $participantes;
}

// Inicializando el array de los nombres

$query = "SELECT * FROM amigosecreto";
$resultado = mysqli_query($conexion, $query);

//Creamos un array con los participantes
$participantes = array();

while ($fila = mysqli_fetch_assoc($resultado)) {
    $participantes[] = $fila;
}

// Mezclamos los nombres
$participantes = mezclar($participantes);

// Imprimimos los nombres mezclados
echo '<p>';
foreach ($participantes as $participante) {
    echo "&raquo; $participante<br />";
}
echo '</p>';

// Agregamos los nombres a un array asociativo para asociar cada uno
// con su respectivo amigo secreto
$amigosSecretos = array();
for ($i = 0; $i < count($participantes); $i++) {
    $amigosSecretos[$participantes[$i]] = $participantes[($i + 1) % count($participantes)];
}

// Imprimimos el resultado
echo '<p>';
foreach ($amigosSecretos as $participante => $amigoSecreto) {
    echo "$participante tiene como amigo secreto a $amigoSecreto<br />";
}
echo '</p>';
