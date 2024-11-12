<?php 
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los valores recibidos para evitar inyecciones SQL
    $placas = $_POST['placas'];
    $year = $_POST['year'];
    $modelo = $_POST['modelo'];
    $marca =$_POST['marca'];
    $color = $_POST['color'];
    $cliente_id=$_POST['cliente'];

    // Estructura de la consulta SQL para insertar los datos
    $sql = "INSERT INTO carro (cliente_id ,Placas, Año, Modelo, Marca,Color) VALUES ('$cliente_id','$placas', '$year', '$modelo',
     '$marca', '$color')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "Vehículo registrado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}











