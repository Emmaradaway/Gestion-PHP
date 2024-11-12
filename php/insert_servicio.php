<?php 
include "conexion.php";
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los valores recibidos para evitar inyecciones SQL
$cliente_id=$_POST['cliente'];
$mecanico_id=$_POST['mecanico'];
$carro_id=$_POST['carro'];
$f_i=$_POST['f-i'];
$servicio=$_POST['servicio'];
$f_s=$_POST['f_s'];




    // Estructura de la consulta SQL para insertar los datos
    $sql = "INSERT INTO servicio (cliente_id, mecanico_id, carro_id , Fecha_de_ingreso,Servicio ,Fecha_de_salida) VALUES ('$cliente_id'
    , '$mecanico_id', '$carro_id', '$f_i', '$servicio','$f_s')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "Registro insertado exitosamente.";
    } else {
        echo "Error: " . $sql;
    }
}
