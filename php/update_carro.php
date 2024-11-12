<?php 
include "conexion.php";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los valores recibidos para evitar inyecciones SQL
    $id = $_POST['id']; // ID del carro que se va a actualizar
    $placas = $conexion->real_escape_string($_POST['placas']);
    $year = $conexion->real_escape_string($_POST['year']);
    $modelo = $conexion->real_escape_string($_POST['modelo']);
    $marca = $conexion->real_escape_string($_POST['marca']);
    $color = $conexion->real_escape_string($_POST['color']);
    $cliente_id = $conexion->real_escape_string($_POST['cliente']); // ID del cliente

    // Estructura de la consulta SQL para actualizar los datos en la tabla carro
    $sql = "UPDATE carro SET 
                Placas = '$placas', 
                Año = '$year', 
                Modelo = '$modelo', 
                Marca = '$marca', 
                Color = '$color', 
                cliente_id = '$cliente_id' 
            WHERE id_carro = $id"; // Asegúrate de usar el ID correcto

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente.";
    } else {
        echo "Error: " . $conexion->error;
    }
}

// Cerrar la conexión (opcional)
$conexion->close();
?>
