<?php 
include "conexion.php";
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los valores recibidos para evitar inyecciones SQL
 
    $id = $_POST['id']; // ID de la nota que se va a actualizar
    $serviciop = $_POST['servicio']; // ID del servicio
    $cajero = $_POST['cajero']; // ID del cajero
    $fecha = $_POST['fecha']; // Fecha de la nota
    $pago = $_POST['f_p']; // ID del tipo de pago
    $total = $_POST['total']; // Total de la nota

    // Estructura de la consulta SQL para actualizar los datos
    $sql = "UPDATE nota SET servicio_id = '$serviciop', cajero_id = '$cajero', fecha = '$fecha', forma_pago_id= '$pago', total = '$total' WHERE id_nota = $id";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
