<?php 
include "conexion.php";
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los valores recibidos para evitar inyecciones SQL
    $descripcion = $conexion->real_escape_string($_POST['pago']); // Descripción del cajero

    // Estructura de la consulta SQL para insertar los datos
    $sql = "INSERT INTO forma_pago (Descripcion) VALUES ('$descripcion')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "success"; // Mensaje de éxito
    } else {
        echo "Error: " . $conexion->error; // Mensaje de error
    }
}
?>
