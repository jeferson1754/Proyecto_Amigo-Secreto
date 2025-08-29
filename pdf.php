
<?php
include("bd.php");

// Crear conexión
// Verificar conexión
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}
?>

2. Crear una consulta SQL para obtener los detalles de la factura:

<?php
$sql = "SELECT * FROM personas ";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $id_factura = $row["ID"];
        $cliente = $row["Nombre_Personas"];
        $fecha = $row["Rut"];
        $subtotal = $row["Pass"];
        $iva = $row["Deseo1"];
        $total = $row["Deseo2"];
    }
} else {
    echo "0 resultados";
}
?>

3. Generar el contenido de la factura en HTML:

<?php
$html = '
<h1>Factura</h1>
<table>
    <tr>
        <th>ID Factura</th>
        <th>Cliente</th>
        <th>Fecha</th>
        <th>Subtotal</th>
        <th>IVA</th>
        <th>Total</th>
    </tr>
    <tr>
        <td>' . $id_factura . '</td>
        <td>' . $cliente . '</td>
        <td>' . $fecha . '</td>
        <td>' . $subtotal . '</td>
        <td>' . $iva . '</td>
        <td>' . $total . '</td>
    </tr>
</table>';
?>

4. Crear una instancia de la clase TCPDF:

<?php
require_once('fpdf/fpdf.php');


?>

6. Agregar el contenido HTML al documento PDF:

<?php
$pdf->AddPage();
$pdf->writeHTML($html, true, false, true, false, '');
?>

7. Generar el archivo PDF:

<?php
$pdf->Output('factura.pdf', 'I');
?>