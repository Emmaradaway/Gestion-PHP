<?php 
include "conexion.php";
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los valores recibidos para evitar inyecciones SQL
    $id = $_POST['id']; // ID del cajero que se va a actualizar
    $nombre = $conexion->real_escape_string($_POST['Nombre_cajero']); // Nombre del cajero
    $telefono = $conexion->real_escape_string($_POST['Telefono_cajero']); // Teléfono del cajero
    $correo = $conexion->real_escape_string($_POST['Correo_cajero']); // Correo del cajero

    // Estructura de la consulta SQL para actualizar los datos
    $sql = "UPDATE cajero SET Nombre = '$nombre', Telefono = '$telefono', Correo = '$correo' WHERE id_cajero = $id";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
