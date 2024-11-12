<?php
include "conexion.php";

$sql_doctores = "SELECT * FROM option_mecanico";


$result_doctores = $conexion->query($sql_doctores);


echo "<label for='mecanico'>Mecanico:</label>";
echo "<select name='mecanico' id='mecanico'>";
if ($result_doctores->num_rows > 0) {
    while ($row = $result_doctores->fetch_assoc()) {
        
        echo "<option value='" . $row['id_mecanico'] . "'>" . $row['Nombre_mecanico'] . "</option>";
    }
} else {
    echo "<option value=''>No hay clientes disponibles</option>";
}   
echo "</select>";


