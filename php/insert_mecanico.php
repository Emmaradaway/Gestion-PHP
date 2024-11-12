<?php 
include "conexion.php";
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los valores recibidos para evitar inyecciones SQL
    $nombre = $conexion->real_escape_string($_POST['Nombre_mecanico']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $direccion = $conexion->real_escape_string($_POST['Direccion']);
    $rfc = $conexion->real_escape_string($_POST['RFC']);
    $n_estudios = $conexion->real_escape_string($_POST['N_estudios']);
    $curp = $conexion->real_escape_string($_POST['CURP']);
    $carrera = $conexion->real_escape_string($_POST['Carrera']);

    // Estructura de la consulta SQL para insertar los datos
    $sql = "INSERT INTO mecanico (Nombre_mecanico, telefono, DIreccion, RFC, N_estudios, CURP, Carrera) 
            VALUES ('$nombre', '$telefono', '$direccion', '$rfc', '$n_estudios', '$curp', '$carrera')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
