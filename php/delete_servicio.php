<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor_id = $_GET['id'];

    // Filtra el ID para evitar inyecciones SQL
    $doctor_id = filter_var($doctor_id, filter: FILTER_SANITIZE_NUMBER_INT);

    $query = "DELETE FROM servicio WHERE ID_SERVICIO = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('i', $doctor_id);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $conexion->close();
}
?>
