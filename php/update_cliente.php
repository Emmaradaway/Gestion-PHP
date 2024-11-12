<?php 
include "conexion.php";
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los valores recibidos para evitar inyecciones SQL
    $id = $_POST['id']; // ID del cliente que se va a actualizar
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $direccion = $conexion->real_escape_string($_POST['direccion']);
    $correo = $conexion->real_escape_string($_POST['correo']);

    // Estructura de la consulta SQL para actualizar los datos
    $sql = "UPDATE cliente SET Nombre = '$nombre', Telefono = '$telefono', Direccion = '$direccion', correo = '$correo' WHERE ID_CLIENTE = $id";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
