<?php 
include "conexion.php";
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los valores recibidos para evitar inyecciones SQL
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $direccion = $conexion->real_escape_string($_POST['direccion']);
    $correo = $conexion->real_escape_string($_POST['correo']);

    // Estructura de la consulta SQL para insertar los datos
    $sql = "INSERT INTO cliente (Nombre, Telefono, Direccion , correo) VALUES ('$nombre', '$telefono', '$direccion', '$correo')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "Registro insertado exitosamente.";
    } else {
        echo "Error: " . $sql;
    }
}
