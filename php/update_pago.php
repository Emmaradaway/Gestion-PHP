<?php 
include "conexion.php";
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los valores recibidos para evitar inyecciones SQL
    $id = $_POST['id']; // ID del cajero que se va a actualizar
    $nombre = $conexion->real_escape_string($_POST['pago']); // Nombre del cajero

    // Estructura de la consulta SQL para actualizar los datos
    $sql = "UPDATE forma_pago SET Descripcion = '$nombre'  WHERE forma_de_pago_id= $id";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conexion->error;
    }
}

