<?php
include "conexion.php";

$sql_doctores = "SELECT * FROM servicio";


$result_doctores = $conexion->query($sql_doctores);


echo "<label for='carro'>Servicio:</label>";
echo "<select name='servicio' id='servicio'>";
if ($result_doctores->num_rows > 0) {
    while ($row = $result_doctores->fetch_assoc()) {
        
        echo "<option value='" . $row['ID_SERVICIO'] . "'>" . $row['ID_SERVICIO'] . "-" .$row['Servicio'] . "</option>";
    }
} else {
    echo "<option value=''>No hay carros disponibles</option>";
}   
echo "</select>";


