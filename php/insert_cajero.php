<?php 
include "conexion.php";
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los valores recibidos para evitar inyecciones SQL
    $nombre = $conexion->real_escape_string($_POST['Nombre_cajero']); // Nombre del cajero
    $telefono = $conexion->real_escape_string($_POST['Telefono_cajero']); // Teléfono del cajero
    $correo = $conexion->real_escape_string($_POST['Correo_cajero']); // Correo del cajero

    // Estructura de la consulta SQL para insertar los datos
    $sql = "INSERT INTO cajero (Nombre, Telefono, Correo) VALUES ('$nombre', '$telefono', '$correo')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
