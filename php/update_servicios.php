<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar datos del formulario
    $id = $_POST['id'];
    $cliente_id = $_POST['cliente'];
    $mecanico_id = $_POST['mecanico'];
    $carro_id = $_POST['carro'];
    $f_i = $_POST['f-i'];
    $servicio = $_POST['servicio'];
    $f_s = $_POST['f_s'];

    // Consulta preparada para evitar inyecciones SQL
    $query = "UPDATE servicio 
              SET cliente_id = ?, 
                  carro_id = ?, 
                  mecanico_id = ?, 
                  Fecha_de_ingreso = ?, 
                  Servicio = ?, 
                  Fecha_de_salida = ? 
              WHERE ID_SERVICIO = ?";

    // Preparar la consulta
    if ($stmt = $conexion->prepare($query)) {
        // Vincular parámetros a la consulta
        $stmt->bind_param("iiisssi", $cliente_id, $carro_id, $mecanico_id, $f_i, $servicio, $f_s, $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error: ' . $stmt->error; // Mostrar mensaje de error si falla la ejecución
        }

        // Cerrar la sentencia preparada
        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta: ' . $conexion->error; // Mostrar error si falla la preparación
    }
}

// Cerrar la conexión
$conexion->close();
