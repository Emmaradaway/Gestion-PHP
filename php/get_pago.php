<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $doctorId = $_GET['id'];
    $query = "SELECT * FROM forma_pago  WHERE forma_de_pago_id  = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('i', $doctorId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $doctor = $result->fetch_assoc();
        echo json_encode($doctor);
    } else {
        echo json_encode(['error' => 'Doctor no encontrado']);
    }   

    $stmt->close();
}
$conexion->close();
?>