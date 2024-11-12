<?php 
include "conexion.php";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar y recibir los valores del formulario
    $serviciop = $_POST['servicio']; // ID del servicio
    $cajero = $_POST['cajero']; // ID del cajero
    $fecha = $_POST['fecha']; // Fecha de la nota
    $pago = $_POST['f_p']; // ID del tipo de pago
    $total = $_POST['total']; // Total de la nota

    // Estructura de la consulta SQL para insertar los datos
    $sql = "INSERT INTO nota (servicio_id, cajero_id, fecha, forma_pago_id, total) 
            VALUES ('$serviciop', '$cajero', '$fecha', '$pago', '$total')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
